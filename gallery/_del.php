<?php
require_once '../db_connect.php';
$id=$_POST['id'];
$name=$_POST['name'];
if ($show=='true') $show=1; else $show=0;
$query="DELETE FROM `gallery` WHERE `id` = $id";
$result=mysql_query($query);        
//echo $query;

$big="images/big/".$name;
if (unlink($big))
{ echo "Файл удален"; }
else
{ echo "Ошибка при удалении файла $big"; }
$small="images/small/".$name;
if (unlink($small))
{ echo "Файл удален"; }
else
{ echo "Ошибка при удалении файла $small"; }

mysql_close($link); 
?>
