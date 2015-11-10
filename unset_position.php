<?php
session_start();
$index=$_GET['index'];
$price=$_GET['price'];
$quantity=$_GET['quantity'];
//echo "товар с индексом ".$index." на удаление";

//перечислить все свойства заказанного товара
unset($_SESSION['name'][$index]);
unset($_SESSION['price'][$index]);
unset($_SESSION['size'][$index]);
unset($_SESSION['quantity'][$index]);
//echo "countbuy-was:".$_SESSION['count_buy'];


//if ($quantity!=1){
//    $_SESSION['count_buy']=$_SESSION['count_buy']-$quantity;
//}else{
//$_SESSION['count_buy']=$_SESSION['count_buy']-1;}
////echo "<br>countbuy-HAS:".$_SESSION['count_buy'];
//$_SESSION['summ_buy']=$_SESSION['summ_buy']-$price;
if ($quantity!=1){
    $_SESSION['count_buy']=$_SESSION['count_buy']-1;
}else{
$_SESSION['count_buy']=$_SESSION['count_buy']-1;}
//echo "<br>countbuy-HAS:".$_SESSION['count_buy'];
//$delthis=$_SESSION['summ_buy']-($price*$quantity);
//$_SESSION['summ_buy']=$_SESSION['summ_buy']-($price*$quantity);
//echo "<br>countbuy-HAS:".$delthis;


///пересчет суммы в корзине
$tttt=0;
foreach (array_keys($_SESSION['price']) as $tempkey)
{  $tttt=$tttt+($_SESSION['price'][$tempkey]*$_SESSION['quantity'][$tempkey]);
    }
$_SESSION['summ_buy']=$tttt;
?>