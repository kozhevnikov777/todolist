<?php

$sererName = 'localhost';
$userName = 'root';
$password = '';
$dataBaseName = 'to_do_list';

try {
    $conn = new PDO("mysql:host=$sererName;dbname=$dataBaseName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
    $result = $todos->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $item) {
        echo "ID " . $item['id'] . "<br>";
        echo $item['title'] . "<br>";
        echo $item['date_time'] . "<br>";
    }
} catch (PDOException $PDOException) {
    echo "Connection failed " . $PDOException->getMessage();
}
