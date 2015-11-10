<?php
error_reporting(0);
session_start();
//print_r($_SESSION);
//echo "<script>alert('>".$_COOKIE['hash1']."--".$_COOKIE['user_uniq1']."<');</script>";
//print_r($_COOKIE);
include $_SERVER['DOCUMENT_ROOT'].'/db_class.php';
if (isset($_SESSION['hash']) && isset($_SESSION['user_uniq'])){
	$check = new users;
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

if (isset($_COOKIE['hash1']) && isset($_COOKIE['user_uniq1'])){
	$check = new users;
    $check->get_user_info($_COOKIE['user_uniq1']);    
    $user_uniq_constructor = md5($check->li.$check->reg_date.$check->reg_time);
    if (($user_uniq_constructor==$_COOKIE['user_uniq1'])&&($_COOKIE['hash1']==$check->pw)){
        $check->accepted=1;		
	//	echo "<script>alert('cookies auth');</script>";
	$_SESSION['hash']=$_COOKIE['hash1'];
	$_SESSION['user_uniq']=$_COOKIE['user_uniq1'];
    } else {
		//echo "Authorization failed";
        unset($check);
    $check->accepted=0;
	
    }
	
}

    //echo "Authorization failed";
    
  //  $check->accepted=0;
	//unset($check);
    //stop;
}
?>
