<?php
require_once '../db_connect.php';
$id=$_POST['id'];
$query="UPDATE users SET level='66' WHERE id='$id';";
$result=mysql_query($query);        
//echo $query;



$query="SELECT * FROM users WHERE id='$id' LIMIT 1;"; 
$result = mysql_query($query);
                while ($r = mysql_fetch_array($result)) {
                    if ($r[8]=='66') {
                  /*���������� ������ �� ����� �*/
				$email=$r[7];
				$theme="ladystyle.su: в активации отказано";
				$headers = "Content-type: text/html; charset=utf-8 \r\n";
				$headers .= "From: info@ladystyle.su\r\n";
				$message = '<h5>К сожалению, ваша учетная запись не была активирована. Подробности можете узнать по телефону: +7(909)410-74-00</h5>';
				mail ("$email","$theme", "$message",$headers);
				/*���������� ������ �� ����� �*/
					}
					
					}
?>