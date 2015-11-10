<?php
error_reporting(0);
session_start();
define ("PAGE_IDENTIFY", "opt");
define ("TITLE_WORDS","Lady Style - оптовое сотрудничество, как начать работать с нами?");
define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>
<?php
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




//echo $user_uniq;


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
  


//include $_SERVER['DOCUMENT_ROOT'].'/template/header.php';


?>

<div class="row">
<div class="span2">
    
    

    
    
    
    
    
    

    
</div>
<div class="span10">
<?php
$lev = $_GET['lev'];
echo "<h1>Вы успешно зарегистрированы!</h1>";
echo "<h3>Теперь можете <a href='http://www.ladystyle.su'>войти на сайт</a>, используя свои логин и пароль.
</h3>Параметры учетной записи отправлены на указанный адрес электронной почты.";
if ($lev == 1) echo "<p>Цены и корзина заказа станут доступны после подтверждения вашей регистрации сотрудниками отдела продаж. Вы будете об этом уведомлены по смс</p>";
if ($lev == 2) echo "<p>Цены и корзина теперь доступны.</p>
<script>
	alert('Добро пожаловать на ladystyle.su');
	window.location = \"http://www.ladystyle.su/im/summer/platya/1\";
</script>";
?>

</div>
</div>
<script>
yaCounter18269641.reachGoal('opt_send'); return true;
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
var yaParams = {/*Здесь параметры визита*/};
</script>

<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter18269641 = new Ya.Metrika({id:18269641,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,params:window.yaParams||{ }});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/18269641" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php



//include $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';


}else {
    
    echo "Access denied";
    
}
?>

