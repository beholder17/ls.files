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
  <li><a href="<?php echo PATH_TO_ROOT.'_check_images.php';?>"> Проверить фотографии</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'gallery/_backend.php';?>"> Добавить фото в галерею</a></li>
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

<br>Фотографии<br>

<table class="table table-bordered table-stripped">
            <thead>
            <th>80 х 180</th>
            <th>250 х 562</th>
            <th>600 х 1350</th>
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
    



<?php 
 include "../db_connect.php";
      

        $query = "SELECT * FROM im_catalog WHERE `show`=1 ORDER BY nomer_mod desc;"; 
                $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
                    { 
                    echo "$r[8]";
                    $exst=file_exists ("../im/image/$r[8].jpg");
                    if (!$exst) {$exst="<b>нет</b>";}
                    echo "- $exst; ";
                    $exst1=file_exists ("../im/image/80/$r[8].jpg");
                    if (!$exst1) {$exst1="<b>нет</b>";}
                    echo "- $exst1; ";
                    
                     $exst2=file_exists ("../im/image/600/$r[8].jpg");
                     if (!$exst2) {$exst2="<b>нет</b>";}
                    echo "- $exst2; <br>";
                    }    


    
    
?>

    

</div>

</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
