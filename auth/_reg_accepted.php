<?php
//error_reporting(0);
session_start();
define ("PAGE_IDENTIFY", "opt");
define ("TITLE_WORDS","Lady Style - оптовое сотрудничество, как начать работать с нами?");
define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
 
function sanitize_string($var)
{
    $var = stripslashes($var);
    //$var = htmlentities($var, ENT_COMPAT, 1251);
    $var = strip_tags($var);
    return $var;
}

function sanitize_mysql($var)
{
    $var = mysql_real_escape_string($var);
    $var = sanitize_string($var);
    return $var;
}

if (isset($_GET['user_uniq'])) {$user_uniq = sanitize_string($_GET['user_uniq']); 



//if ($_SESSION[user_uniq]==$_COOKIE[user_id]){
if ($_COOKIE[user_id]!=NULL)
{
    $_SESSION[user_uniq]=$user_uniq;
    //print_r($_SESSION);
    //$seenmassive=$_COOKIE[CookieArt]."|".$art;
    include "../db_class.php";
    $newbe=new users;
    $newbe->get_user_info($user_uniq);
    //$newbe->
    $check = md5($newbe->li.$newbe->reg_date.$newbe->reg_time);
    if ($check==$user_uniq) {
      //  echo "<script>alert('доверяем! :)');</script>";
    
    } else echo "<script>alert('User not identificate, access denied!');</script>";
} else {
  setcookie (user_id, $user_uniq);
  }
//}
//else {
//  setcookie (user_id, $user_uniq);
//}
  

include "http://www.ladystyle.su/template/header.php";



/*
<div class="row">
<div class="span2">
    
    

    
    
    
    
    
    
    
<ul class="nav nav-list">
  <li class="nav-header">О КОМПАНИИ</li>
  <li class="active"><a href="#">На главную</a></li>
  <li><a href="#">О компании</a></li>
  <li><a href="#">Наши награды</a></li>
  <li><a href="#">Сфера присутствия</a></li>
  <li><a href="#">Видео</a></li>
</ul>
    
</div>
<div class="span10">

</div>
</div>*/

echo "<h1>Вы успешно зарегистрированы!</h1>";
echo "<h3>Теперь Вы можете войти на сайт, используя свои логин и пароль.</h3>";




include_once "http://127.0.0.1/ls2013/template/footer.php";

}else {
    
    echo "Access denied";
    
}
?>

<?php include "http://127.0.0.1/ls2013/template/header.php";