<?php
error_reporting(0);
$kill=$_GET['unsend'];
$uniq=$_GET['uniq'];
include "../db_connect.php";
/*проверка*/
$query = "SELECT * FROM sender WHERE id = ".$kill.";";
$result=mysql_query($query);
while($r=mysql_fetch_array($result))
{if ($r[3]==$uniq && $r[0]==$kill)
 {
 	$query = "DELETE FROM send WHERE id = ".$kill." AND uniq = ".$uniq.";";
    $result=mysql_query($query);
    echo "<br /><div align=\"center\" style = \"background-color: #FCDFFD; width: auto; height: auto; padding: 20px; color: #AC0BB0; font-family: arial; font-size: 14pt; \">Ваш e-mail снят со списка автомaтической рассылки обновлений Lady Style</div>";
 }
 else
  {
  	echo "<br /><div align=\"center\" style = \"background-color: #FFB0B3; width: auto; height: auto; padding: 20px; color: #8A0003; font-family: arial; font-size: 14pt; \">Ошибка идентификации e-mail!</div>";
  }
 }

?>