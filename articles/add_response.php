
    <script>
 //   alert('asd');
    </script>
<?php
function sanitize_string($var)
{
    $var = stripslashes($var);
    //$var = htmlentities($var, ENT_COMPAT, 1251);
    $var = strip_tags($var);
    return $var;
}

$response=sanitize_string($_POST['elm3']);
$user_name=sanitize_string($_POST['user_name']);
$user_email=sanitize_string($_POST['user_email']);
$user_ip=$_SERVER['REMOTE_ADDR'];
$response_date=date("Y-m-d");
$response_time=date("H:i:s");
$alias=$_POST['alias'];









//$response=iconv("UTF-8", "windows-1251//IGNORE", $response);
//$user_email=iconv("UTF-8//IGNORE", "windows-1251//IGNORE", $user_email);
//$user_name=iconv("UTF-8//IGNORE", "windows-1251//IGNORE", $user_name);
//
//echo "1 отзыв ".$response."<br>";
//echo "2 мэйл ".$user_email."<br>";
//echo "3 юзер ".$user_name."<br>";
//echo "4 айпи ".$user_ip."<br>";
//echo "5 дата ".$response_date."<br>";
//echo "6 время ".$response_time."<br>";
//echo "7 алиас ".$alias."<br>";

include "../db_connect.php";
$query = "INSERT INTO `u0095203_ls`.`responses` (`id` ,`user_name` ,`mail` ,`ip` ,`date` ,`time` ,`response` ,`alias` ,`show`) VALUES (NULL,'".$user_name."','".$user_email."','".$user_ip."','".$response_date."','".$response_time."','".$response."','".$alias."','1');";
 echo $query;
 mysql_query($query);
 mysql_close($link);
?>
<!--<meta http-equiv="refresh" content="10">-->