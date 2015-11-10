<?php 
 session_start();
 define ("PAGE_IDENTIFY", "bags");
 define ("TITLE_WORDS","Женские сумки оптом");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "женские сумки оптом, сумки из Беларуссии, оптовый интернет магазин, женские сумки, купить женские сумки");
 define ("DESCRIPTION", "Оптовый каталог женских сумок из Беларуссии. В нашем оптовом интернет-магазине сможете выбрать и заказать женские сумки от беларусского производителя");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>
<script type='text/javascript' src='http://www.ladystyle.su/js/colorbox-master/jquery.colorbox-min.js'></script>
<link rel="stylesheet" type="text/css" href="http://www.ladystyle.su/js/colorbox-master/example1/colorbox.css"> 



<div class="row">
    <div class="span2"><?php include "../im/category.php"; ?>
    <?php include "../articles/_bar_category.php"; ?>
    </div>
    <div class="span10">
	<div style='text-align: center; padding-bottom: 15px;'>
				
	</div>

	<?php
	include "../db_connect.php";
	//$sky = $_GET['sku'];
	$sku = strip_tags($_GET['sku']);
	$sku = htmlspecialchars($sku);
	$sku = mysql_escape_string($sku);
	$query = "SELECT * FROM `bags` WHERE `art` = '$sku'";
	$result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            {
			$bag_id = $r[0];
			$bag_title = $r[1];
			$bag_price = $r[2];
			$bag_img = $r[3];
			$bag_art = $r[4];
			$bag_show = $r[5];
			$bag_description = $r[6];			
			include "bag_display.php";
			}
	
?>

				

<div class="remark">* Обращаем Ваше внимание, что цветопередача товаров, представленных на сайте, может несколько искажать реальные цвета, поскольку это зависит от настроек Вашего монитора.</div>
<div class="magenta-strip"></div>



</div>
    
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
