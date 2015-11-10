<?php
/*header('HTTP/1.1 404 Not Found');
echo "404";
echo "<br><br>";
echo "Уважаемый посетитель сайта www.ladystyle.su, если Вы видите эту страницу - значит Вы ошиблись ссылкой, или пытались перейти к обзору страницы, которой на сайте больше нет.<br>Чтобы продолжить работу с сайтом нажмите на следующую ссылку: <a href='http://www.ladystyle.su/im/'>Каталог одежды ladystyle.su</a>";

*/
?>
<?php header('HTTP/1.1 404 Not Found'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Страница не найдена</title>
	<meta name="robots" content="noindex, nofollow">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='container'>
	<div class='nf'>Страница не найдена</div>
	<div class='dgt'>404</div>
	<div class='dnf'>Уважаемый посетитель сайта www.ladystyle.su, если Вы видите эту страницу - значит Вы ошиблись ссылкой, или пытались перейти к обзору страницы, которой на сайте больше нет!<br>Чтобы продолжить работу с сайтом нажмите на следующую ссылку: <a href='http://www.ladystyle.su/im/'>Каталог одежды ladystyle.su</a></div>
<?php //	<div class='dnf'>На сайте ведутся технические работы. Возможны перебои в работе. Просим прощения за возможные неудобства</a></div> ?>
	<div class='bck' onClick="history.back()">Вернуться назад...</div>
	<div class='bckmain' onClick="document.location.href = 'http://www.ladystyle.su'"> ...или перейти на главную страницу</div>
</div>
</body>
</html>

<style>
body{
background-image: url('osen.jpg');
}

.container{
height: 100%;
width: 100%;
}

.nf{
color: #BBBBBB;
font-size: 50px;
font-family: 'Open Sans Condensed', sans-serif;
font-weight: bold;
margin: 0 auto;
margin-top: 10%;
width: 100%;
height: 85px;
text-align: center;
background-color: black;
}

.dnf{
color: lightgray;
font-size: 20px;
font-family: 'Open Sans Condensed', sans-serif;
font-weight: bold;
margin: 0 auto;
padding-top: 50px;
margin-top: 220px;
width: 100%;
height: 110px;
text-align: center;
background-color: black;
}

.dgt{
position: absolute;
color: white;
font-size: 150px;
font-family: 'Open Sans Condensed', sans-serif;
font-weight: bolder;
width: 100%;
text-align: center;
}

.bck{
position: absolute;
color: white;
font-size: 30px;
font-family: 'Open Sans Condensed', sans-serif;
font-weight: bolder;
width: 100%;
text-align: center;
cursor: pointer;
}
.bck:hover{
text-decoration: underline;
}

.bckmain{
position: relative;
color: white;
font-size: 30px;
font-family: 'Open Sans Condensed', sans-serif;
font-weight: bolder;
width: 100%;
text-align: center;
cursor: pointer;
top: 60px;
}
.bckmain:hover{
text-decoration: underline;
}
</style>
