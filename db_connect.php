<?php
$link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("Не могу подключиться");
mysql_select_db("u0095203_ls", $link) or die ('Не могу выбрать БД');
mysql_query("SET NAMES utf8");
?>