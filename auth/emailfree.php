<?php
//$li = $_GET['li'];
//require '../db_connect.php';
//$query = "SELECT COUNT(*) FROM users WHERE li = '$li'";
//$result = mysql_query($query);
//$count=mysql_fetch_assoc($result);
//mysql_close($link);
//
//if ($count['COUNT(*)']==0) echo "free";
//if ($count['COUNT(*)']>0) echo "busy";
//




$email=$_GET['email'];
require '../db_connect.php';
$query = "SELECT COUNT(*) FROM users WHERE `e-mail` = '$email'";
$result = mysql_query($query);
$count=mysql_fetch_array($result);
mysql_close($link);
//echo $query;
if ($count['COUNT(*)']==0) echo "free";
if ($count['COUNT(*)']==1) echo "busy";
if ($count['COUNT(*)']>1) echo "more";
//print_r ($count);

//$exist="yv001@yandex.ru info@ladystyle.su com@ladystyle.su";
//$massive=explode(" ", $exist);
//$tmp='0';
//foreach ($massive as $pochta)
//{
//    if ($pochta == $email){
//        $tmp=2;
//        break;
//    } else {
//        $tmp=1;
//    }
//}
//if ($tmp=='1') echo 'free';
//if ($tmp=='2') echo 'busy';
?>
