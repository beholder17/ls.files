<?php
session_start();
$totalsumm=$_GET['temp'];
$totalquantity=$_GET['temp2'];
$index=$_GET['index'];
$quantity=$_GET['quantity'];
$_SESSION['summ_buy']=$totalsumm;
$_SESSION['quantity'][$index]=$quantity;
?>

