<?php

/*
* Обработчик запросов
*/

abstract class Db
{
    protected $data;

    public static function getAssocResult($sql)
    {
        try {
            $dbh = new PDO('mysql:dbname=' . DB . ';host=' . HOST, USER, PASS);
        } catch (PDOException $e) {
            echo "Error: Could not connect. " . $e->getMessage();
        }

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbh->query($sql);
        $data = array();
        while ($row = $sth->fetchObject()) {
            $data[] = $row;
        }
        unset($dbh);
        return $data;
    }

    public static function executeQuery($sql)
    {
        try {
            $dbh = new PDO('mysql:dbname=' . DB . ';host=' . HOST, USER, PASS);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: Could not connect. " . $e->getMessage();
        }

        $data = $dbh->exec($sql);
        return $data;
    }

    public static function getRowResult($sql, $dbh = null)
    {
        $array_result = getAssocResult($sql, $dbh);

        if (isset($array_result[0])) {
            $data = $array_result[0];
        } else {
            $data = [];
        }

        return $data;
    }
}