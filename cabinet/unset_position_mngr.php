<?php
include "../auth/_check.php";
if ($check->accepted==1 && $check->level==50){
include "../im/_class.informator.php";
$order_id=$_GET['order_id'];
echo $order_id."<br>";
       $ord = new orders();
       $ord->get_order_by_id($order_id);
       $order_overview=array();
       $order_overview=$ord->items;    
    
    
require_once '../db_connect.php';
$id=$_GET['id'];
//$order_id=$_GET[$order_id];
$order_overview['count_buy']=$order_overview['count_buy']-$order_overview['quantity'][$id];
$order_overview['summ_buy']=$order_overview['summ_buy']-($order_overview['price'][$id]*$order_overview['quantity'][$id]);
$order_overview['price'][$id]=0;
$order_overview['quantity'][$id]=0;
$order_overview['name'][$id]='na';
//echo "<br>";
$order_overview=serialize($order_overview);
$query="UPDATE `im_orders` SET `items`='$order_overview' WHERE id=".$order_id.";";
//echo $query;
$result=mysql_query($query);
echo "<script>
                    window.history.back()
                    </script>";
} else echo "error";
?>