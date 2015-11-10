<?php
require_once 'db_connect.php';
$photo= iconv('UTF-8', 'windows-1251', $_POST['photo']);
$text = iconv('UTF-8', 'windows-1251', $_POST['text']);
$show=$_POST['show'];
$date=$_POST['date'];
$query = "INSERT INTO `gallery` (`id`, `photo`, `text`, `data`, `show`) VALUES (NULL, '".$photo."', '".$text."', '".$date."', '".$show."');";
mysql_query($query);
?>
