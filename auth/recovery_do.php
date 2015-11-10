<?php
error_reporting(0);
session_start();
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

$salt="1believe-in-yourself9";
if (isset($_POST['email'])) $email = sanitize_string($_POST['email']);
if (isset($_POST['pw'])) $pw = md5($_POST['pw'].$salt);
if (isset($_POST['captcha'])) $captcha = sanitize_string($_POST['captcha']);
//echo "капча ".$captcha."<br>";
if (isset($_POST['pw']) && isset($_POST['email']) && isset($_POST['captcha']))
    {
        if (!empty($_SESSION[keystring]) && $_SESSION[keystring] == $captcha) 
            {
                include "../db_connect.php";
                $query = "UPDATE users SET `pw`='".$pw."' WHERE `e-mail`='".$email."';";
				$result=mysql_query($query);
               
				
				
				
				
				/*отправляем пароль на почту Н*/
				
				$query = "SELECT li FROM users WHERE `e-mail`='".$email."';";
				$result=mysql_query($query);
				if ($result!=NULL){       
				while($r=mysql_fetch_array($result))
					{ 
						$li=$r[0];
					}
					}
				mysql_close($link);
				$theme="Восстановление пароля на www.ladystyle.su";
				$headers = "Content-type: text/html; charset=utf-8 \r\n";
				$headers .= "From: info@ladystyle.su\r\n";
				$message = '<h1>Новый пароль на www.ladystyle.su установлен!</h1><h4>Параметры учетной записи:</h4>Логин: '.$li."<br>Пароль: ".$_POST['pw']."<br><br><br>";				
				mail ("$email","$theme", "$message",$headers);
				
				/*отправляем пароль на почту К*/
				 echo "<script>alert('Новый пароль установлен и выслан на указанную почту');</script>";
        
                
                
                
                unset($_POST['pw']);                
                unset($_POST['email']);
                unset($_POST['captcha']);
                //if (!$result) die ("<hr>Сбой при доступе к базе данных: <br>".mysql_error());
                echo "<script>
                    window.location = \"http://www.ladystyle.su\"
                    </script>
                    "; 
            }
             else 
                 {echo "<h2>Что-то пошло не так :(<br> Возможно, не верно введены цифры с картинки?</h2><br>	<a href=\"javascript:history.back()\" onMouseOver=\"window.status='Назад';return true\"><h3>Повторить ввод</h3></a>";}
                
            
    }
    else 
   {
      echo "<h1>Access denied</h1>";
   }

?>