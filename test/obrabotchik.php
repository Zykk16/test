<?php
//require_once 'config/config.php';
//try {
//    $dbh = new PDO('mysql:dbname=' . DB . ';host=' . HOST, USER, PASS);
//} catch (PDOException $e) {
//    echo "Error: Could not connect. " . $e->getMessage();
//}
//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// C какой статьи будет осуществляться вывод
//$startFrom = $_POST['startFrom'];
//$sql = "SELECT * FROM contact ORDER BY id DESC LIMIT {$startFrom}, 4";
//$sth = $dbh->query($sql);
//$data = array();
//while ($row = $sth->fetchObject()) {
//    $data[] = $row;
//}

//обработка в JSON-объект, для реализации load more
//echo json_encode($data);

