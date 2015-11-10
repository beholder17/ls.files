<?php
error_reporting(0);
session_start();
$_SESSION=array();
session_destroy();
unset($check->accepted);
//setcookie ('hash1', " ","/"); 
//setcookie ('user_uniq1', " ","/");
//setcookie ('hash1'); 
//setcookie ('user_uniq1');
setcookie('hash1', '', time() - (60*60*24*7), '/');
setcookie('user_uniq1', '', time() - (60*60*24*7), '/');
//echo "<script>alert('>".$_COOKIE['hash1']."--".$_COOKIE['user_uniq1']."<');</script>";
//print_r($_SESSION);
?>
<script>
window.location = "http://www.ladystyle.su/";
</script>