<?php

/*
* Главный класс для обработки фото и вывод информации.
*/

class Engine extends Db
{
    private static $instance;
    private $picture;
    private $path;

    public static function getInstance()
    {

        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    //запрос на вывод из БД
    public function views()
    {
        $sql = "SELECT * FROM contact ORDER BY id DESC";
        $data = parent::getAssocResult($sql);
        return $data;
    }

    public function info($id = null)
    {
        $sql = "SELECT * FROM contact WHERE id = '$id';";
        $foto = parent::getAssocResult($sql);

        if ($foto) {
            $sql = "UPDATE contact SET views = views + 1 WHERE id = '$id'";
            parent::executeQuery($sql);
            return $foto;
        } else {
            $sql = "SELECT * FROM contact ORDER BY id DESC";
            $data = parent::getAssocResult($sql);
            return $data;
        }
    }

    public function connection($picture, $path)
    {
        $this->picture = $picture;
        $this->path = $path;

//        $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
        $size = 102400000;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//            // Проверяем тип файла
//            if (!in_array($_FILES[$this->picture]['type'], $types)) {
//                die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
//            }

            // Проверяем размер файла
//            if ($_FILES[$this->picture]['size'] > $size) {
//                die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
//            }

            //Вернемся на текущую страницу после отправки
            function getUrl()
            {
                $url = @($_SERVER["HTTPS"] != 'on') ? 'http://' . $_SERVER["SERVER_NAME"] : 'https://' . $_SERVER["SERVER_NAME"];
                $url .= ($_SERVER["SERVER_PORT"] != 80) ? ":" . $_SERVER["SERVER_PORT"] : "";
                $url .= $_SERVER["REQUEST_URI"];
                return $url;
            }

            $uploaddir = $this->path;
            $Pole1 = $_FILES[$this->picture]['name'];
            $Pole2 = $_FILES[$this->picture]['size'];
            $Pole3 = $_FILES[$this->picture]['type'];
            $Pole4 = $_FILES[$this->picture]['tmp_name'];
            $error = $_FILES[$this->picture]['error'];

            $date = date("Y-m-d");
            if ($Pole3 === 'image/png') {
                $Pole3 = 'png';
            } elseif ($Pole3 === 'image/jpeg') {
                $Pole3 = 'jpg';
            } elseif ($Pole3 === 'image/jpg') {
                $Pole3 = 'jpg';
            }
            if ($error == UPLOAD_ERR_OK) {
                header("Location: " . getUrl());
                $name = basename($_FILES[$this->picture]["name"]);
                move_uploaded_file($Pole4, "$uploaddir/$name");
                $sql = "INSERT INTO contact VALUES (NULL, '{$_POST['name_author']}', '{$_POST['email']}', '{$Pole1}','{$Pole2}','{$Pole3}','$uploaddir/$name','0','{$_POST['comment']}', '$date')";
                $data = parent::executeQuery($sql);
                echo "Файл успешно загружен <br>";
            }
        }

        if (!empty($data)) {
            return $data;
        } else {
            return 'Данных нет';
        }
    }
}