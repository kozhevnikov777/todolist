<?php

$sererName = 'localhost';
$userName = 'root';
$password = '';
$dataBaseName = 'to_do_list';


$conn = new PDO("mysql:host=$sererName;dbname=$dataBaseName", $userName, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'];

if (!empty($id)) {
    $add = $conn->prepare("DELETE FROM todos WHERE id=?");
    $res = $add->execute([$id]);
    header("Location: ../index.php ");
    $conn = null;
    exit();
}
?>