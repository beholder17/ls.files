<?php
require_once '../db_connect.php';
$id=$_POST['id'];
$query="UPDATE im_catalog SET `show`='1' WHERE id='$id';";
//$query = "SELECT * FROM im_catalog WHERE `date`='$date' AND `category`='$rr[0]' ORDER BY `nomer_mod` DESC;";
$result=mysql_query($query);        
echo "Модель скрыта";
?>