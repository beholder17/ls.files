<?php
$salt="1believe-in-yourself9";
$pw="don12n";
$pw = md5($pw.$salt);
echo $pw."<br>---";
?>