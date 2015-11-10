<?php
session_start();
error_reporting(0);


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

include "../db_connect.php";
$email = sanitizeMySQL(sanitizeString($_POST['email']));
$question = sanitizeMySQL(sanitizeString($_POST['question']));

$query = "INSERT INTO `u0095203_ls`.`questions` (`id`, `email`, `question`) VALUES (NULL, '$email', '$question');";
//echo $query;
$result=mysql_query($query);
	/*отправляем на почту Н*/
				
				$theme="Новый вопрос на www.ladystyle.su";
				$headers = "Content-type: text/html; charset=utf-8 \r\n";
				$headers .= "From: info@ladystyle.su\r\n";
				$message = $question.'<br>'.$email."<br><br><br>";
				mail ("yv001@yandex.ru","$theme", "$message",$headers);
				//mail ("$email","$theme", "$message",$headers);
				
				/*отправляем на почту К*/

?>
Ваш вопрос будет обработан в ближайшее время. Спасибо!