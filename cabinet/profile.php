<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","Анкета пользователя Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 ) {
    ?>




<div class="row">
<div class="span2">
    
<?php include "sidebar_opt.php";?>
    
</div>
<div class="span10">
<h1>Анкета пользователя</h1>
<br>
<!--<h2>Анкета</h2>-->
<?php 
$anketa = new users();
$anketa->get_user_info($_SESSION['user_uniq']);
echo $anketa->name."<br>";
echo $anketa->famil."<br>";
echo $anketa->otch."<br>";
echo $anketa->email."<br>";
?> 
<br>
<?php 
include "../im/_class.informator.php";
       $tyty = new orders();
       $tyty->get_order($_SESSION['user_uniq']);
?>
<br><h3>Активные заказы</h3><br>
<table class="table table-bordered table-stripped">
            <thead>
            <th>Код заказа</th>
            <th>Заказ на сумму</th>
            <th>Дата</th>
            <th style="width: 100px;">Просмотреть</th>
            <th>Статус</th>
            </thead>
</table>
</div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
