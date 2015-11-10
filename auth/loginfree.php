<?php
$li = $_GET['li'];
require '../db_connect.php';
$query = "SELECT COUNT(*) FROM users WHERE li = '$li'";
$result = mysql_query($query);
$count=mysql_fetch_assoc($result);
mysql_close($link);

if ($count['COUNT(*)']==0) echo "free";
if ($count['COUNT(*)']>0) echo "busy";
?>
