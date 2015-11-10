<?php
require_once '../db_connect.php';
$id=$_POST['id'];

$query="DELETE FROM `users` WHERE `id` = '$id';";
//$query = "SELECT * FROM im_catalog WHERE `date`='$date' AND `category`='$rr[0]' ORDER BY `nomer_mod` DESC;";
$result=mysql_query($query);        
echo "Пользователь удален";
?>