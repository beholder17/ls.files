<?php 
 define ("PAGE_IDENTIFY", "im");
 define ("TITLE_WORDS","Леди Стайл - Интернет-магазин женской одежды оптом и в розницу, категории товаров");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "оптовый интернет-магазин, интернет-магазин леди стайл, леди стайл, интернет магазин, купить одежду, купить одежду оптом");
 define ("DESCRIPTION","Поиск женской одежды на оптовом интернет магазине ladystyle.su");
 define ("DOINDEX","NO");
 
?>
<?php
/*Проверка на наличие для обработки 404*/
      $art=$_GET['mod'];            
            if ($art!=NULL){
                 $temp=substr_count($art, "-");
                 if ($temp>0){
                       $artparts=explode("-",$art);
                       $art=$artparts[0];
                 }


include_once "../db_connect.php";
$query = "SELECT COUNT(*) FROM `im_catalog` WHERE `show`='1' AND nomer_mod LIKE '%$art%'";
$result=mysql_query($query);
while($r=mysql_fetch_array($result))
{
//echo ">>>>>>>>".$r[0]."<<<<<<<<<<";
if ($r[0]>0) {
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>
<div class="row">
    <div class="span2"><?php include "category.php"; ?></div>
    <div class="span10">
    <a href="<?php echo PATH_TO_ROOT.'im/'; ?>"><h2><< Назад</h2></a></div>
<!--<div style="position: relative; left: 230px; top: 50px;">
    <img src="http://www.ladystyle.su/im/notfound.jpg"/>
</div>-->

<?php
echo "<table cl4ass=\"table\" wi77dth=\"200\">";
          $query = "SELECT * FROM im_catalog WHERE `show`='1' AND nomer_mod LIKE '%$art%'"; 
		 
                $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
                    {
                        echo "<tr><td>$r[8]</td><td><a href='http://www.ladystyle.su/im/details/any/usual/$r[8]'><img src='http://www.ladystyle.su/im/image/80/$r[6]' alt='$r[2]'></a></td></tr>";
                    }
                    echo "</table></div>";
					include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';

} else {

		/*header('HTTP/1.1 404 Not Found');*/
		header('Location:http://www.ladystyle.su/im/model_not_found.php');
					/*exit();
					//echo "<script>alert('такой модели нет, её вариаций тоже');</script>";*/
					}
}
} else {header('HTTP/1.1 404 Not Found');
		header('Location:http://www.ladystyle.su/template/404.php');
					exit();
					}
?>


