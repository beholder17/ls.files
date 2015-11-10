<?php
require_once '../db_connect.php';
$pic=$_POST['img'];
$text=$_POST['text'];
$alias=$_POST['alias'];
$date=$_POST['date'];
$show=$_POST['show'];
if ($show=='true') $show=1; else $show=0;
$query="INSERT INTO gallery VALUES(NULL, '$pic', '$text', '$date', '$alias', '$show')";
$result=mysql_query($query);        
//echo $query;
?>
