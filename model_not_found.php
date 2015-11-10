<?php header('HTTP/1.1 404 Not Found'); ?>
<?php
session_start();
error_reporting(0);
define("PAGE_IDENTIFY", "im");
define("TITLE_WORDS", "Модель не найдена");
define("PATH_TO_ROOT", "http://www.ladystyle.su/");
define("KEY_WORDS", "Модель не найдена");
define("DESCRIPTION", "Модель не найдена");
define("DOINDEX", "NO");
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php'; ?>
<div class="row">
<div class="span2"><?php include "category.php";?></div>
<div class="span10">
<img src='notfound.jpg'>

</div>

</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php'; ?>


