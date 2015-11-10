<?php
require_once '../db_connect.php';
$id=$_POST['id'];
$query="UPDATE users SET level='2' WHERE id='$id';";
$result=mysql_query($query);        
//echo $query;



/*include "../im/_class.informator.php";
$anketa = new users();
$anketa->get_user_info($_SESSION['user_uniq']);*/
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

$query="SELECT * FROM users WHERE id='$id' LIMIT 1;"; 
$result = mysql_query($query);
                while ($r = mysql_fetch_array($result)) {
                    if ($r[8]=='2') {
					
                  /*отправляем пароль на почту Н*/
				$email=$r[7];
				$theme="Ваша учетная запись на ladystyle.su активирована";
				$headers = "Content-type: text/html; charset=utf-8 \r\n";
				$headers .= "From: info@ladystyle.su\r\n";
				$message = '<h1>Ваша учетная запись активирована!</h1><h4>Вы зарегистрированы на сайте LADYSTYLE.SU.</h4><h5> Используйте ваши логин и пароль для входа на сайт.</h5>';				
				mail ("$email","$theme", "$message",$headers);				
				/*отправляем пароль на почту К*/
				
				//отправка смс. http://lcab.smsprofi.ru     
				$tel_buy=$r[15];
			    $tel_mngr=array("$tel_buy");
				//$tel_mngr=array('+79094107400','+79198976353','+79287589546');
				//$tel_mngr=array('+79043498227');
                require_once("../auth/sms/transport.php");
                $api = new Transport();
				//$mesg=translit("Учетная запись АКТИВИРОВАНА! ladystyle.su");
				$mesg="Учетная запись АКТИВИРОВАНА! ladystyle.su";
                $params = array("text" => $mesg,
                                "source" =>"lady style");
				$send = $api->send($params,$tel_mngr);				
					}
					
					}
?>							