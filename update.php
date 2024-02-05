<?php

$sererName = 'localhost';
$userName = 'root';
$password = '';
$dataBaseName = 'to_do_list';


$conn = new PDO("mysql:host=$sererName;dbname=$dataBaseName", $userName, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'];
$title = $_POST['title'];
$date_time = $_POST['date_time'];

if (isset($_POST['title']) && isset($_POST['date_time']) && isset($_POST['id'])) {
    $add = $conn->prepare("UPDATE todos SET title = ?, date_time = ? WHERE id = ?");
    $res = $add->execute([$title, $date_time, $id]);
    header("Location: ../index.php ");
    $conn = null;
    exit();
}

?>
