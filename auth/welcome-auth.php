<?php

session_start();
error_reporting(0);
//echo "<script>alert('33');</script>";

function sanitizeString($var)
{
    $var = stripcslashes($var);
    $var = htmlentities($var,ENT_NOQUOTES,'utf-8');
    
    $var = strip_tags($var);
    return $var;
}
function sanitizeMySQL($var)
{
    $var = mysql_real_escape_string($var);
    $var = sanitizeString($var);
    return $var;
}
function auth_is_fail()
{
    echo "<h3>Не верная пара логин/пароль!</h3><br><div style=\"cursor: pointer;\"><u>Обновите страницу и попробуйте снова</u></div>";
}
function auth_is_win()
{
    echo "<span class='label label-success'>Добро пожаловать!</span>";
    echo "<script>
setTimeout(function () {
location.reload();
}, 1600);  

        </script>";
}
//echo "<script>alert('33".$pw."');</script>";

 //echo "<script>alert('33');</script>";

$salt="1believe-in-yourself9";
$li=sanitizeString($_POST['li']);
//$li=$_POST['li'];
//echo "li post: ".$li;
//$li2=iconv("windows-1251", "utf-8//IGNORE", $li);
//$li= win2utf($li);
//echo "li: ".$li;
$pw=sanitizeString($_POST['pw']);


$checkbox=sanitizeString($_POST['checkbox']);







$pw=md5($pw.$salt);
include_once '../db_class.php';
$user = new users();
$user->get_user_info_by_login($li);
//echo "<i><br>--$li ; $user->li</i>";
//echo "fuck! $pw ; $user->pw fuck";
if ($pw==$user->pw){
   
    $_SESSION['hash']=$pw;
    $_SESSION['user_uniq']=$user->user_uniq;
	if ($checkbox==1){
	setcookie ('hash1', $pw, time()+31536000,"/"); 
	setcookie ('user_uniq1', $user->user_uniq, time()+31536000,"/");
	//echo "<script>alert('>".$_COOKIE['hash1']."--".$_COOKIE['user_uniq1']."<');</script>";
	}
	auth_is_win();
} else {
        auth_is_fail();
                }
            //    print_r($_SESSION);
?>
