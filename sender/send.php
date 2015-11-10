<?php
$theme = "Новогодняя коллекция Lady Style!";
include "../db_connect.php";

$query = "SELECT DISTINCT * FROM sender WHERE send = '1';";
$result = mysql_query($query);


while ($r = mysql_fetch_array($result)) {
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: info@ladystyle.su\r\n";
    $message = '<h1>Рады представить Вам новогоднюю коллекцию!</h1><br>Ознакомиться можно здесь: <a href="http://www.ladystyle.su/im/newyear2014.php">www.ladystyle.su/im/newyear2014.php</a> Приглашаем оптовиков к сотрудничеству!';


   /* $message.="Чтобы отписаться от рассылки, перейдите по ссылке: <a href='http://www.ladystyle.su/sender/unsend.php?unsend=" . $r[0] . "&uniq=" . $r[3] . "'>http://www.ladystyle.su/catalog/index.php</a>";
*/


    mail ("$r[1]","$theme", "$message",$headers);
}
//mail("yv001@yandex.ru", "$theme", "$message", $headers);
echo "Отправлено";
?>




