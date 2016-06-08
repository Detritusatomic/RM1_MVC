<?php
require_once '../config/config.php';
require_once '../class/Database.class.php';
$database=Database::getInstance();

$logs=$_POST['logs'];

$sql='select * from `users` where mail="'.$logs.'";';
$req=$database->prepare($sql);
$req->execute();
$result=$req->rowCount();

echo $result.$logs;
?>
