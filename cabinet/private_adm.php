<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private_admin");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 && $check->level==80) {
    ?>




<div class="row">
<div class="span2">
    
<ul class="nav nav-list">
  <li class="nav-header">О КОМПАНИИ</li>
  <li class="active"><a href="#">На главную</a></li>
  <li><a href="#">О компании</a></li>
  <li><a href="#">Наши награды</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'cabinet/_check_images.php';?>"> Проверить фотографии</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'gallery/_backend.php';?>"> Добавить фото в галерею</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'im/_add_model.php';?>"> + модель</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'articles/add_artic.php';?>"> + статью</a></li>
</ul>
    
</div>
<div class="span10">
<h1>Управление</h1>


<?php 
include "../im/_class.informator.php";
$anketa = new users();
$anketa->get_user_info($_SESSION['user_uniq']);
//echo $anketa->name."<br>";
//echo $anketa->famil."<br>";
//echo $anketa->otch."<br>";
//echo $anketa->email."<br>";


$recent_order=$_GET['recent_order'];
if ($recent_order=='1') echo '<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Уважаемая(ый) '.$anketa->name.'!</strong><br> Ваш заказ принят и в самом скором времени будет обработан. Вы можете следить за исполнением заказа из своего личного кабинета.
</div>
';

//Проверка на наличие наобработанных заказов
$unprocessed_orders=new orders();
$unprocessed_orders->get_unprocessed_orders();
if ($unprocessed_orders->num_rows>0){
    echo "<p>Кажется у нас есть необработанные заказы! И их целых<span class=\"badge badge-important\">$unprocessed_orders->num_rows</span>шт.! <a href='unprocessed_orders.php'>Просмотреть</a></p>";
}
?> 
    
    
    
<br>
<?php 

       $tyty = new orders();
       $tyty->get_order($_SESSION['user_uniq']);
?>

<br>Активные заказы<br>

<table class="table table-bordered table-stripped">
            <thead>
            <th>Код заказа</th>
            <th>Вы заказали</th>
            <th>Дата</th>
            <th>Статус</th>
            </thead>

    <tr>
        <td>
        
    </td>
        <td>
       <?php 
       
       print_r ($tyty->items);
       ?>
        </td>
        <td>
        <?php echo $tyty->date; ?>
        </td>
        <td>
        <?php echo "<span class=\"label label-info\">".$tyty->status."</span>"; ?>
        </td>
    </tr>
</table>
    <?php echo $tyty->num_rows;?>
    

<hr>
<?php
//$date="2014-10-23";
$date_sec="2014-12-15";
/*$date_sec="2014-04-24";
$date2="2014-07-13";
$date3="2014-08-11";*/
echo "<h3>Невыставленные модели фотосессий: февраль, апрель, июль, август</h3><br>";

 if (!include '../db_connect.php') include 'db_connect.php';

        $query = "SELECT * FROM im_catalog WHERE `date`='$date_sec' ORDER BY `nomer_mod` DESC;";
        
        $result=mysql_query($query);
        //define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
        while($r=mysql_fetch_array($result))
            {
            echo "<a style='float: left;' alt='$r[2] $r[8]' href='http://www.ladystyle.su/im/edit_shell.php?id=$r[0]'><img alt='$r[2] $r[8]' src='../im/image/80/$r[6]'></a>$r[2], $r[8]<br>";
            }    

?>

    

</div>

</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
