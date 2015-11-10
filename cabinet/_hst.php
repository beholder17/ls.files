<?php
require_once '../db_connect.php';
$id=$_POST['id'];
$query="UPDATE im_orders SET status='5' WHERE id='$id';";
$result=mysql_query($query);        
//echo $query;
?>
