<?php 
 session_start();
 error_reporting(0);
 define ("PAGE_IDENTIFY", "shops");
 define ("TITLE_WORDS","Фирменные магазины Lady Style - продажа женской одежды, сумок и бижутерии и аксессуаров");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "фирменный магазин, официальный магазин, розничная сеть, женская одежда, москва, ростов-на-Дону, новочеркасск");
 define ("DESCRIPTION", "Сеть фирменных магазинов розничной торговли женской одеждой торговой марки \"Lady Style\". Режим работы, адреса, телефоны");
?>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>




<div class="row">
<div class="span2">
    
    

    
    
    
    
    
    
    
<?php include "../articles/_bar_category.php"; ?>
    
</div>
<div class="span10">
    <?php
include_once 'breadcrumb.php';
?>
    <h1>Магазины Lady Style</h1>
    <br>


<p>Компания 'Леди стайл' имеет собственную сеть розничных фирменных магазинов, где Вы можете приобрести все наши новинки! Ассортимент обновляется регулярно, над этим трудится наш специальный отдел! В этом разделе вы можете ознакомиться с адресами магазинов и режимами работы.<p>
<br>
<?php /*<h3>Москва</h3>
<ul>
<li>шоу-рум Lady Style в Москве </li>
<li>ул. Днепропетровская , дом 18-Б, оф.2.1.8</li> 
<li>Тел.: +7 (495) 796-02-83,</li>
<li>Тел.: +7 (495) 314-40-70</li>
</ul>*/
?>
<?php
include_once "../db_connect.php";
		function get_shop_pic($alias)
		{
			$query = "SELECT * FROM gallery WHERE `alias` = '$alias' limit 1";
			$result=mysql_query($query);
			while($r=mysql_fetch_array($result))
			{
				$img = $r[1];
			}
			return $img;
		}
		
        $query = "SELECT * FROM shops WHERE `show` = '1'";
        $result=mysql_query($query);		
        if ($result!=NULL){
        while($r=mysql_fetch_array($result))
            {
            
			
			//ladystyle-nov-moscow.jpg
			echo "
			<div class='shop_container'>";
			if ($r[3]!=NULL) echo "<a class='shop_thumbnail' href='http://www.ladystyle.su/shops/details.php?shop=$r[0]'><img alt='$r[1]' class='thumbnail' src='http://www.ladystyle.su/gallery/images/small/".get_shop_pic($r[3])."'></a>";
			if ($r[3]==NULL) echo "<a class='shop_thumbnail' href='http://www.ladystyle.su/shops/details.php?shop=$r[0]'><img alt='$r[1]' class='thumbnail' src='http://www.ladystyle.su/shops/title_pict/$r[9]'></a>";
			echo "<div class='shop_text_container'>
				<h3>$r[1]</h3>
				<p>$r[2]</p>
				<div class='go_to_show'>
				<a href='http://www.ladystyle.su/shops/details.php?shop=$r[0]'>Подробнее...</a>
				</div>
			</div>
			</div>
			<hr style='width: 90%;'>
			";
			
			
            }
        }
        
?>

<br><br><br>
<p>Благодарим Вас за интерес, проявленный к продукции Компании Lady Style!</p>

  
</div>
<br><br>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
