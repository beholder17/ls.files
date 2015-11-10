<?php
error_reporting(0);
session_start();
//print_r($_SESSION);
//
//if (!include '../db_class.php') include 'db_class.php';
include $_SERVER['DOCUMENT_ROOT'].'/db_class.php';
$check = new users;
if (isset($_SESSION['hash']) && isset($_SESSION['user_uniq'])){
//echo __FILE__;
   // if (!include '../db_class.php') include 'db_class.php';
	//include '../db_class.php'
	//include $_SERVER['DOCUMENT_ROOT'].'/index.php';
	
	
  // $check = new users;
    $check->get_user_info($_SESSION['user_uniq']);
    
    $user_uniq_constructor = md5($check->li.$check->reg_date.$check->reg_time);
    if (($user_uniq_constructor==$_SESSION['user_uniq'])&&($_SESSION[hash]==$check->pw)){
        $check->accepted=1;		
    } else {
	
	//echo "Authorization failed";
        unset($check);
    $check->accepted=0;
	
    }
	
} else {
    //echo "Authorization failed";
    
    $check->accepted=0;
	unset($check);
    //stop;
}
?>
