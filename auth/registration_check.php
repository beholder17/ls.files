<?php
error_reporting(0);
session_start();


function city_in_bl($city_to_check)
{	
	$text = file_get_contents('citycut-blacklist.txt');
	$text = mb_strtolower($text, "utf-8");			
	$text = str_replace(' ','',$text);
	$text = str_replace('-','',$text);
	//echo $text;
	$text_array = explode(',',$text);	
	$city_to_check = mb_strtolower($city_to_check, "utf-8");
	$city_to_check = str_replace(' ','',$city_to_check);
	$city_to_check = str_replace('-','',$city_to_check);
	$city_to_check = str_replace('город','',$city_to_check);
	$city_to_check = str_replace('г.','',$city_to_check);
	$city_to_check = str_replace('гор.','',$city_to_check);
	//$city_to_check = str_replace('г.','',$city_to_check);
	
	if (strrpos($text, $city_to_check) == NULL) {return "нет";} else {return "есть";}	
}

function translit($string){
$converter = array(
 'а' => 'a', 'б' => 'b', 'в' => 'v',
 'г' => 'g', 'д' => 'd', 'е' => 'e',
 'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
 'и' => 'i', 'й' => 'y', 'к' => 'k',
 'л' => 'l', 'м' => 'm', 'н' => 'n',
 'о' => 'o', 'п' => 'p', 'р' => 'r',
 'с' => 's', 'т' => 't', 'у' => 'u',
 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
 'ь' => "", 'ы' => 'y', 'ъ' => "",
 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
 ',' => '_', ' ' => '_', ':' => '_',
 
 'А' => 'A', 'Б' => 'B', 'В' => 'V',
 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
 'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
 'И' => 'I', 'Й' => 'Y', 'К' => 'K',
 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
 'О' => 'O', 'П' => 'P', 'Р' => 'R',
 'С' => 'S', 'Т' => 'T', 'У' => 'U',
 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
 'Ь' => "", 'Ы' => 'Y', 'Ъ' => "",
 'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
 );
 return strtr($string, $converter);
}

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
//echo date("Сегодня d.m.Y H:i:s"); Сегодня 22.08.2013 19:04:24
$date_reg=date("Y-m-d");
$time_reg=date("H:i");

//echo date;
$salt="1believe-in-yourself9";
if (isset($_POST['li'])) $li = sanitize_string($_POST['li']);
if (isset($_POST['name'])) $name = sanitize_string($_POST['name']);
//$name = '';
//if (isset($_POST['famil'])) $famil = sanitize_string($_POST['famil']);
$famil = '';
if (isset($_POST['email'])) $email = sanitize_string($_POST['email']);
//if (isset($_POST['otch'])) $otch = sanitize_string($_POST['otch']);
$otch = '';
//if (isset($_POST['inn'])) $inn = sanitize_string($_POST['inn']);
$inn = '';
//if (isset($_POST['ogrn'])) $ogrn = sanitize_string($_POST['ogrn']);
$ogrn = '';
if (isset($_POST['tel'])) $tel = sanitize_string($_POST['tel']);
if (isset($_POST['address'])) $address = sanitize_string($_POST['address']);
if (isset($_POST['pw'])) $pw = md5($_POST['pw'].$salt);
//if (isset($_POST['pw'])) $pw = $_POST['pw'].$salt;
if (isset($_POST['captcha'])) $captcha = sanitize_string($_POST['captcha']);


if (isset($_POST['li']) && isset($_POST['pw']) && isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['captcha']))
    {
        if (!empty($_SESSION[keystring]) && $_SESSION[keystring] == $captcha) 
            {
                include "../db_connect.php";
                $user_uniq = md5($li.$date_reg.$time_reg);
				
				if (city_in_bl($address) == "есть") $level=1;  //требует одобрения
				if (city_in_bl($address) == "нет") $level=2; //не требует одобрения
				
				//echo "<script>alert('address=$address,".city_in_bl($address)."');</script>";
				
                $query="INSERT INTO users VALUES(NULL, '$li', '$pw', NULL, '$name', '$famil', '$otch', '$email', '$level', '$date_reg','$time_reg','$user_uniq','$address','$inn','$ogrn','$tel')";
                //echo $query;
                $result = mysql_query($query);
                //echo $result;
		/*		
		[user_uniq] =&gt; 07eebd5eba49bd2a8ca6a4dfa6bd0239
		[keystring] =&gt; 37651
		[hash] =&gt; 3d9fee46ea6128d07704dfc7f7c8a60e
		*/
				//$_COOKIE['user_uniq'] = $user_uniq;
				//$_COOKIE['hash'] = $pw;
				//SetCookie("user_uniq",$user_uniq,time()+36000000);
				//SetCookie("hash",$pw,time()+36000000);
				
				
				setcookie ('hash1', $pw, time()+31536000,"/"); 
				setcookie ('user_uniq1', $user_uniq, time()+31536000,"/");
				
				
				//echo "<script>alert('pause');</script>";
				//$_COOKIE[$_COOK]
				
				
                echo "<h1>Вы зарегистрированы</h1>";
				
				/*отправляем пароль на почту Н*/
				
				$theme="Регистрация на www.ladystyle.su";
				$headers = "Content-type: text/html; charset=utf-8 \r\n";
				$headers .= "From: info@ladystyle.su\r\n";
				if ($level == 1){
				$message = '<h1>Вы зарегистрировались на сайте www.ladystyle.su!</h1><br><h4>Параметры учетной записи:</h4>Логин: '.$li."<br>Пароль: ".$_POST['pw']."<br>Ваша учетная запись требует ручной активации. Это проделают наши менеджеры в ближайшие минуты!<br><br>";}
				if ($level == 2){
				$message = '<h1>Вы зарегистрировались на сайте www.ladystyle.su!</h1><br><h4>Параметры учетной записи:</h4>Логин: '.$li."<br>Пароль: ".$_POST['pw']."<br>Ваша учетная запись не требует ручной активации. Для просмотра полной версии каталога одежды Lady Style перейдите по следующей ссылке: <a href='http://www.ladystyle.su/im/'>http://www.ladystyle.su/im/</a><br><br>";}
				//mail ("yv001@yandex.ru","$theme", "$message",$headers);
				if (isset($message)) {mail ("$email","$theme", "$message",$headers);}
				
				/*отправляем пароль на почту К*/				
                //отправка смс. http://lcab.smsprofi.ru              
			    $tel_mngr=array('+79094107400','+79287589546');
				//$tel_mngr=array('+79043496688');
				
                require_once("sms/transport.php");
                $api = new Transport();
				if ($level == 1) {$mesg=translit("$famil $name($tel) $address");}
				if ($level == 2) {$mesg=translit("ODOBREN! $famil $name($tel) $address");}
				
                $params = array("text" => $mesg,
                                "source" =>"lady style",
								"use_alfasource " =>"1"
								);
				$send = $api->send($params,$tel_mngr);
                
                
                unset ($name);
                $name=NULL;
                unset($_POST['pw']);
                unset($_POST['name']);
                unset($_POST['famil']);
                unset($_POST['email']);
                unset($_POST['captcha']);
                if (!$result) die ("<hr>Сбой при доступе к базе данных: <br>".mysql_error());
                echo "<script>
                    window.location = \"http://www.ladystyle.su/auth/reg_accepted.php?user_uniq=$user_uniq&lev=$level\"
                    </script>
                    }"; 
            }
             else 
                 {echo "<h2>Что-то пошло не так :(<br> Возможно, не верно введены цифры с картинки?</h2><br>	<a href=\"javascript:history.back()\" onMouseOver=\"window.status='Назад';return true\"><h3>Повторить ввод<h3></a>";}
                
            
    }
    else 
   {
      echo "<h1>Access denied</h1>";
   }
    
   
?>
