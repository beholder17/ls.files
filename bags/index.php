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
<style>
	.bag_img img{
		/*width: 185px;
		height: 250px;*/
		width: 222px;
		height: 306px;
	}
	.bag_item{
	float: left;
  padding: 5px;
  /*box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.4);*/
  overflow: hidden;
  margin: 8px;
  cursor: default;
  font-size: 12px;
  }
  
    .bag_item:hover {box-shadow: 0px 0px 85px 0px rgba(0,0,0,0.4);}
</style>
<div class="row">
    <div class="span2"><?php include "../im/category.php"; ?>
    <?php include "../articles/_bar_category.php"; ?>
    </div>
    <div class="span10">
	<div style='text-align: center; padding-bottom: 15px;'>
				
	</div>
<h1>Оптовый каталог женских сумок</h1><br>

<h3>Уважаемые покупатели!</h3>
<p>
Спешим сообщить, что в нашем интернет-магазине Вы сможете купить женские сумки торговой марки <strong>"Галантэя"</strong>!
</p>
<h3> Заявки принимаем на почту opt@ladystyle.su, sklad@ladystyle.su или по телефону: 8-800-707-03-55</h3>
<p>
"Галантея" - торговая марка ведущего белорусского производителя женских молодежных сумок из натуральной и искусственной кожи.
ОАО "Галантэя" г. Минск. Товары Белорусских производителей всегда отличало  высокое качество изготовления и используемых в производстве материалов. Изделия торговой марки Galanteya имеют свой неповторимый стиль и интересные дизайнерские решения. В нашем интернет-магазине всегда имеются товары для широкого круга потребителей.
</p>

        <ul class="thumbnails">







<?php
include "../db_connect.php";
/*include "db_bags.php";
$info = new informator_bags();*/
//$info->getBagDescriptionByID($category);
//Теперь данные категории доступны через свойства класса _class.informator.php :)

$query = "SELECT * FROM bags WHERE `show` = 1";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            {
				?>
<div class='bag_item' style='float: left;'>
	<div class='bag_caption'><?php echo "Артикул: ".$r[4];?></div>
	
	
	<?php
	if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) {?>
	

	<div class='bag_price'><?php echo "Цена: ".$r[2]." руб."; ?></div>
	<?php }
	?>
	
	<div class='bag_img'><a href='http://www.ladystyle.su/bags/details.php?sku=<?php echo $r[4]; ?>'><img src='img/<?php echo $r[3]; ?>'></a></div>
</div>
  <?php
            }
?>	



</ul>
<div class="remark">* Обращаем Ваше внимание, что цветопередача товаров, представленных на сайте, может несколько искажать реальные цвета, поскольку это зависит от настроек Вашего монитора.</div>
<div class="magenta-strip"></div>



</div>
    
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
