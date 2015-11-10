<?php
session_start();
$id=$_GET['id'];
$size=$_GET['size'];

if ($_SESSION['count_buy']==NULL) {$_SESSION['count_buy']=0;}
$_SESSION['count_buy']=$_SESSION['count_buy']+1;

if ($_SESSION['firstable_buy_limits']==NULL) {$_SESSION['firstable_buy_limits']=0;}
$_SESSION['firstable_buy_limits']=$_SESSION['firstable_buy_limits']+1;


$count_buy=$_SESSION['count_buy'];


$current_summ=$_GET['summbuy'];
$_SESSION['summ_buy']=$current_summ+$_SESSION['summ_buy'];




//затирает старую модель при добавлении новой после удаления ранее купленной
$firstable_buy_limits=$_SESSION['firstable_buy_limits'];
$_SESSION['name'][$firstable_buy_limits] = $id;
$_SESSION['size'][$firstable_buy_limits] = $size;
$_SESSION['price'][$firstable_buy_limits] = $current_summ;
$_SESSION['quantity'][$firstable_buy_limits] = 1;

?>

