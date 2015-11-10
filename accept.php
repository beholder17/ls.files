<?php
error_reporting(0);
session_start();
//define ("PATH_TO_ROOT", "http://127.0.0.1/ls2013/");
//include_once $_SERVER['DOCUMENT_ROOT'].'/ls2013/template/header.php';
require_once '../auth/_check.php';


if ($check->accepted>0 ) {
include '../db_connect.php';    
$date_reg=date("Y-m-d");
$time_reg=date("H:i");


$user_uniq=$_SESSION['user_uniq'];
$items=';fd';

//$items=array_merge_recursive($_SESSION['name'], $_SESSION['quantity']);
$items=serialize($_SESSION);
//$items = implode(",", $_SESSION[]);
$items = str_replace($_SESSION['user_uniq'], '00000000000000000000000000000000', $items);
$items = str_replace($_SESSION['hash'], '00000000000000000000000000000000', $items);
//echo $items."<br><br><br><br><br>";
//$items2 = unserialize($items);
//print_r($items2);
$query="INSERT INTO im_orders VALUES(NULL, '$user_uniq', NULL, '$items', '0')";
  //              echo $query;
$result = mysql_query($query);
//echo "<br>DONE";

//include_once $_SERVER['DOCUMENT_ROOT'].'/ls2013/template/footer.php';
                    echo "<script>
                    window.location = \"http://www.ladystyle.su/cabinet/index.php?recent_order=1\";
                    </script>";
} else echo "access denied";
 ?>
