<?php
session_start();
//$name=$_GET['name'];
$str=$_GET['str'];
if (!empty($_SESSION[keystring]) && $_SESSION[keystring] == $str) {echo "true";} else {echo "false";}
//print_r($_SESSION);
?>
