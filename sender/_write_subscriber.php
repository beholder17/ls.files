<?php
$e_mail=$_POST['email'];
if (isset($e_mail)) {
include "../db_connect.php";




$e_mail=mb_strtolower($e_mail);
$e_mail=trim($e_mail);



function exist($var){
$query = "SELECT * FROM sender WHERE email='$var';";
$result=mysql_query($query);
while($r=mysql_fetch_array($result)){
    if ($r[1]==$var) {return(1); break;}
}    
return(0);
}



//echo exist($e_mail);

if (exist($e_mail)==0){
$uniq=rand(10000,99999);
$date=date("Y.m.d");
$query = "INSERT INTO sender (email, send, uniq, date) VALUES ('$e_mail', '1', '$uniq', '$date')";
$result=mysql_query($query);
mysql_close($link);
echo "<br><br><br><br><h3>Вы подписаны на рассылку</h3>";
} else echo "<br><br><br><h3>Вы уже подписаны на рассылку</h3>";} else {
echo "Произошел сбой :(";}
?>



