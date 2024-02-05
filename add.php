<?php

$sererName = 'localhost';
$userName = 'root';
$password = '';
$dataBaseName = 'to_do_list';


$conn = new PDO("mysql:host=$sererName;dbname=$dataBaseName", $userName, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$title = $_POST['title'];
$date_time = $_POST['date_time'];

if (isset($_POST['title']) && isset($_POST['date_time'])) {
    $add = $conn->prepare("INSERT INTO todos(title, date_time) VALUES (?, ?)");
    $res = $add->execute([$title, $date_time]);
    header("Location: ../index.php ");
    $conn = null;
    exit();
}

?>