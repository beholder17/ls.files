<?php
session_start(); 
error_reporting(0);


function category_translate($var)
{
switch ($var) {
case 'Комбинезоны': $tr_var="combineson"; break;
case 'Комплекты': $tr_var="complect"; break;
case 'Топы': $tr_var="top"; break;
case 'Болеро': $tr_var="bolero"; break;
case 'Шорты': $tr_var="shorts"; break;
case 'Сарафаны': $tr_var="sarafan"; break;
case 'Шарфы': $tr_var="sharf"; break;
case 'Бриджи': $tr_var="bridges"; break;
case 'Жакеты': $tr_var="jacket"; break;
case 'Жилеты': $tr_var="jilet"; break;
case 'Брюки': $tr_var="bruki"; break;
case 'Юбки': $tr_var="yubki"; break;
case 'Блузки': $tr_var="bluzki"; break;
case 'Платья': $tr_var="platya"; break;
case 'Пальто': $tr_var="palto"; break;
default: $tr_var=$var;
}; 
return $tr_var;
}



function category_detranslator($var)
{
switch ($var) {
case 'combineson': $tr_var="Комбинезоны"; break;
case 'complect': $tr_var="Комплекты"; break;
case 'top': $tr_var="Топы"; break;
case 'bolero': $tr_var="Болеро"; break;
case 'shorts': $tr_var="Шорты"; break;
case 'sarafan': $tr_var="Сарафаны"; break;
case 'sharf': $tr_var="Шарфы"; break;
case 'bridges': $tr_var="Бриджи"; break;
case 'jacket': $tr_var="Жакеты"; break;
case 'jilet': $tr_var="Жилеты"; break;
case 'bruki': $tr_var="Брюки"; break;
case 'yubki': $tr_var="Юбки"; break;
case 'bluzki': $tr_var="Блузки"; break;
case 'platya': $tr_var="Платья"; break;
case 'palto': $tr_var="Пальто"; break;
default: $tr_var=$var;
}; 
return $tr_var;
}




function season_translator($var)
{
switch ($var) {
case 'Весна-лето': $tr_var="summer"; break;
case 'Осень-зима': $tr_var="winter"; break;
default: $tr_var=$var;
}; 
return $tr_var;
}


if (isset($_GET['category'])) 
{
$category=$_GET['category'];
$category = category_detranslator($category);
$_GLOBALS['param']=$category;

}
//echo "<script>alert('".$_GET['season']."');</script>";
if (isset($_GET['season'])) {
//echo "<script>alert('".$_GLOBALS['param3']."');</script>";
	
	$tmp_season = $_GET['season'];		
	//echo "<script>alert('".$tmp_season."');</script>";
	if (($tmp_season=="summer") OR ($tmp_season=="Весна-лето")) {$season = 'Весна-лето';} 
	if (($tmp_season=="winter") OR ($tmp_season=="Осень-зима")) {$season = 'Осень-зима';}
	

	/*switch ($_GET['season']) {
	case 'summer': $season="Весна-лето"; break;
	case "winter: $season="Осень-зима"; break;
	}; 
	*/
	
	$_GLOBALS['param3']=$season;
} else $_GLOBALS['param3']='%';
//echo "<script>alert('".$_GLOBALS['param3']."');</script>";
//echo "<script>alert('".$season."');</script>";
if (isset($_GET['big']))
{
	if ($_GET['big']==1)
	 {
	  $_GLOBALS['big']=1;
	  $_SESSION['big']=1;
	  //echo "<script>alert('".$_SESSION['big']."');</script>";
	 }
	 else 
	 {
	 $_GLOBALS['big']=NULL;
	 $_SESSION['big']=NULL;
	 }
}
//сделать безопасное получение
?>
<?php 
/*проверка на наличие для 404*/
$_GLOBALS['param']=$category;
$_GLOBALS['param3']=$season;
$_GLOBALS['param2']="catalog"; //значение постоянное
include "../db_connect.php";
$query = "SELECT * FROM im_catalog WHERE category='".$_GLOBALS['param']."' and `season` like '".$_GLOBALS['param3']."' and `show`=1;"; 
        //echo "<script>alert(\"".$query."\");</script>";
                $result=mysql_query($query);
				
				if ( mysql_num_rows($result)==0 ) {
				header('HTTP/1.1 404 Not Found');
				header('Location:http://www.ladystyle.su/template/404.php');
				exit();
				}



//session_start(); 
//error_reporting(0);



 //получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект - начало
function request_url()
{
  $result = ''; // Пока результат пуст
  $default_port = 80; // Порт по-умолчанию
  // А не в защищенном-ли мы соединении?
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    // В защищенном! Добавим протокол...
    $result .= 'https://';
    // ...и переназначим значение порта по-умолчанию
    $default_port = 443;
  } else {
    // Обычное соединение, обычный протокол
    $result .= 'http://';
  }
  // Имя сервера, напр. site.com или www.site.com
  $result .= $_SERVER['SERVER_NAME']; 
  // А порт у нас по-умолчанию?
  if ($_SERVER['SERVER_PORT'] != $default_port) {
    // Если нет, то добавим порт в URL
    $result .= ':'.$_SERVER['SERVER_PORT'];
  }
  // Последняя часть запроса (путь и GET-параметры).
  $result .= $_SERVER['REQUEST_URI'];
  // Уфф, вроде получилось!
  return $result;
}

	$summer_txt = "%D0%92%D0%B5%D1%81%D0%BD%D0%B0-%D0%BB%D0%B5%D1%82%D0%BE"; //Весна-лето
	$winter_txt = "%D0%9E%D1%81%D0%B5%D0%BD%D1%8C-%D0%B7%D0%B8%D0%BC%D0%B0"; //Осень-зима

	$foo = request_url();
	if ((strrpos($foo, 'page=', 0)!=FALSE) OR (strrpos($foo, 'category=', 0)!=FALSE) OR (strrpos($foo, 'season=', 0)!=FALSE) OR (strrpos($foo, $summer_txt, 0)!=FALSE) OR (strrpos($foo, $winter_txt, 0)!=FALSE))
	{
		$tmp_s2 = category_translate($category);
		$tmp_s1 = season_translator($season);
		header("HTTP/1.1 301 Moved Permanently"); 
		//header("Location: http://www.ladystyle.su/im/$season/$category/1"); 
		header("Location: http://www.ladystyle.su/im/$tmp_s1/$tmp_s2/1"); 
		exit();		
	//echo "<script>alert('mod-rewrite flag:   $page');</script>";
	}
 //получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект - конец



?>
<?php
include "_class.informator.php";
$info = new informator();
$info->getCategoryDescription($category);
//Теперь данные категории доступны через свойства класса _class.informator.php :)
?>
<?php
if ($season == "Осень-зима") $season_for_meta = "Женская одежда сезона весна лето ".date('Y');
if ($season == "Весна-лето") $season_for_meta = "Женская одежда сезона осень зима ".date('Y');
 define ("PAGE_IDENTIFY", "im");
 define ("TITLE_WORDS","$info->meta_title, $season_for_meta");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "$info->meta_keywords, $season_for_meta");
 define ("DESCRIPTION", "$info->meta_description $season_for_meta");
 $CAT_TYPE="general";
?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>
<div class="row">
    <div class="span2"><?php include "category.php"; ?>
    <?php include "../articles/_bar_category.php"; ?>
    </div>
    <div class="span10" >
        
        <?php include "breadcrumb.php"; ?>


        <h1>
		<?php if ($_GLOBALS['big']==1) echo "Большие размеры - ";?>
		<?php echo $info->category_name; ?> от производителя оптом</h1>
        <h2><?php echo $info->category_description; ?><?php if ($_GLOBALS['big']==1) echo " больших размеров";?></h2>
		
		<?php
		$tmp333=category_translate($category);
		if ($season=="Осень-зима") $season_for_meta = "<h3>Cезон 'Осень-зима'</h3><p>Обратите также внимание и на коллекцию <a href=\"http://www.ladystyle.su/im/summer/$tmp333/1\">'Весна-Лето'</a></p>";
		if ($season=="Весна-лето") $season_for_meta = "<h3>Сезон 'Весна-лето'</h3><p>Обратите также внимание и на коллекцию <a href=\"http://www.ladystyle.su/im/winter/$tmp333/1\">'Осень-Зима'</a></p>";
		if ($season=="Осень-зима") $tmp_season_for_img_alt = "Осенне-зимний сезон";
		if ($season=="Весна-лето") $tmp_season_for_img_alt = "Весенне-летний сезон";
		echo $season_for_meta;
		?>
		
		<?php
		 $_GLOBALS['param']=$category;
            $_GLOBALS['param3']=$season;
            $_GLOBALS['param2']="catalog"; //значение постоянное
			
			$_GLOBALS['param_categ_eng']=category_translate($category);
            
        include "../db_connect.php";
		?>
		<div style="margin-right: 45px;"><?php include_once 'api_pages.php';?></div>
        <ul class="thumbnails">
		 <?php
			//echo "<script>alert('".$category."');</script>";
           
      
        //$query = "SELECT * FROM im_catalog WHERE category='".$_GLOBALS['param']."' and `season`='".$_GLOBALS['param3']."' and `show`=1 ORDER BY date desc limit ".$from.",".$on_page.";"; 
        $query = "SELECT * FROM im_catalog WHERE category='".$_GLOBALS['param']."' and `season` like '".$_GLOBALS['param3']."' and `show`=1 and `promo`=999 ORDER BY nomer_mod desc limit ".$from.",".$on_page.";"; 
		//echo $query;
		if ($_GLOBALS['big']==1) $query = "SELECT * FROM im_catalog 
										WHERE category='".$_GLOBALS['param']."' 
										AND `season` like '".$_GLOBALS['param3']."' 
										AND `show`=1 
										AND (`size` like '%50%' OR  `size` like '52%' OR  `size` like '54%' OR  `size` like '56%' OR `size` like '58%' OR  `size` like '60%')
										ORDER BY nomer_mod desc limit ".$from.",".$on_page.";"; 
        
                $result=mysql_query($query);
				
				if ( mysql_num_rows($result)>0 ) {
                while($r=mysql_fetch_array($result))
                    {?>
					
					<li>				
				<div class='capsule'>
				<div class='item_stuff_v2'>	
					
					<?php $tmp_season = season_translator($r[10]);?>				
					<a href='http://www.ladystyle.su/im/details/<?php echo $tmp_season;?>/<?php echo $CAT_TYPE."/".$r[8];?>'><img class='lazy' data-original='http://www.ladystyle.su/im/image/<?php echo $r[8];?>.jpg' title="<?php echo "купить $r[2] от производителя оптом, Артикул $r[8], $tmp_season_for_img_alt"?>" alt="<?php echo "$r[2], Артикул $r[8], $tmp_season_for_img_alt"?>"></a>
					
					<?php if ($r[15]=='999') echo "<div class='soon'></div>";?>
					<div class='descriptor_block'>
					
					<?php 
						        if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) {
								echo "<strong>Цена: </strong>";
								 //Проверка актуальности акции -н
								 //echo $info_art->item_promo."<br>";
								 $query_promo = "SELECT * FROM promo WHERE `id`='".$r[15]."'";
								 //echo $query_promo;
								 $result_promo=mysql_query($query_promo);     
								 while($r_promo=mysql_fetch_array($result_promo))
								  {
								  $promo_active=$r_promo[3];
								  }
								  //echo $promo_active;
								 //Проверка актуальности акции -к
								 
								 
								 
									if (($r[5]>0) && ($r[15]>0)&& ($promo_active=='1')) {
										echo "<del>".$r[4]."руб</del> <div class='skidka_red'>Со скидкой: ".$r[5]." руб.</div>";
												} else {
													 echo $r[4]." руб.<br>";
												} //echo "<br>"; 
												}
					?>					
						<strong>Размеры:</strong> <?php echo $r[12]; ?><br>
						<strong>Артикул:</strong> <?php echo $r[8]; ?><br>
						<strong>Рост:</strong> <?php echo $r[11]; ?><br>
						<strong>Длина:</strong> <?php echo $r[16]; ?><br>
						<strong>Состав ткани: </strong><br><?php echo $r[9]; ?><br>
						
						
						<!-- <div><a href='http://www.ladystyle.su/im/details/<?php // echo $tmp_season;?>/<?php //echo $CAT_TYPE."/".$r[8];?>'>Обзор модели</a></div>-->
					</div>
				</div>
				</div>
			</li>
		<?php

                    }    
					} else { header('Location:http://www.ladystyle.su/template/404.php');}
        ?>
		
		
            <?php
			//echo "<script>alert('".$category."');</script>";
           
      
        //$query = "SELECT * FROM im_catalog WHERE category='".$_GLOBALS['param']."' and `season`='".$_GLOBALS['param3']."' and `show`=1 ORDER BY date desc limit ".$from.",".$on_page.";"; 
        $query = "SELECT * FROM im_catalog WHERE category='".$_GLOBALS['param']."' and `season` like '".$_GLOBALS['param3']."' and `show`=1 and `promo`!=999 ORDER BY nomer_mod desc limit ".$from.",".$on_page.";"; 
		//echo $query;
		if ($_GLOBALS['big']==1) $query = "SELECT * FROM im_catalog 
										WHERE category='".$_GLOBALS['param']."' 
										AND `season` like '".$_GLOBALS['param3']."' 
										AND `show`=1 
										AND (`size` like '%50%' OR  `size` like '52%' OR  `size` like '54%' OR  `size` like '56%' OR `size` like '58%' OR  `size` like '60%')
										ORDER BY nomer_mod desc limit ".$from.",".$on_page.";"; 
        
                $result=mysql_query($query);
				
				if ( mysql_num_rows($result)>0 ) {
                while($r=mysql_fetch_array($result))
                    {?>
					
					<li>				
				<div class='capsule'>
				<div class='item_stuff_v2'>	
					
					<?php $tmp_season = season_translator($r[10]);?>				
					<a href='http://www.ladystyle.su/im/details/<?php echo $tmp_season;?>/<?php echo $CAT_TYPE."/".$r[8];?>'><img class='lazy' data-original='http://www.ladystyle.su/im/image/<?php echo $r[8];?>.jpg' title="<?php echo "купить $r[2] от производителя оптом, Артикул $r[8], $tmp_season_for_img_alt"?>" alt="<?php echo "$r[2], Артикул $r[8], $tmp_season_for_img_alt"?>"></a>
					
					<?php if ($r[15]=='999') echo "<div class='soon'></div>";?>
					<div class='descriptor_block'>
					
					<?php 
						        if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) {
								echo "<strong>Цена: </strong>";
								 //Проверка актуальности акции -н
								 //echo $info_art->item_promo."<br>";
								 $query_promo = "SELECT * FROM promo WHERE `id`='".$r[15]."'";
								 //echo $query_promo;
								 $result_promo=mysql_query($query_promo);     
								 while($r_promo=mysql_fetch_array($result_promo))
								  {
								  $promo_active=$r_promo[3];
								  }
								  //echo $promo_active;
								 //Проверка актуальности акции -к
								 
								 
								 
									if (($r[5]>0) && ($r[15]>0)&& ($promo_active=='1')) {
										echo "<del>".$r[4]."руб</del><div class='skidka_red'>Со скидкой: ".$r[5]." руб.</div>";
												} else {
													 echo $r[4]." руб.";
												} 
												//echo "<br>"; 
												}
					?>
					
						<strong>Размеры:</strong> <?php echo $r[12]; ?><br>
						<strong>Артикул:</strong> <?php echo $r[8]; ?><br>
						<strong>Рост:</strong> <?php echo $r[11]; ?><br>
						<strong>Длина:</strong> <?php echo $r[16]; ?><br>
						<strong>Состав ткани: </strong><br><?php echo $r[9]; ?><br>
						
						
						<!--<div><a href='http://www.ladystyle.su/im/details/<?php //echo $tmp_season;?>/<?php //echo $CAT_TYPE."/".$r[8];?>'>Обзор модели</a></div>						-->
					</div>
				</div>
				</div>
			</li>
		<?php

                    }    
					} else { header('Location:http://www.ladystyle.su/template/404.php');}
        ?>
        </ul>
        <div style="position: relative; left: -22px;"><?php include 'api_pages.php';  ?></div>
		<div class='fulltext_category'>
		<?php echo $info->category_fulltext; ?><br><br>
		</div>
    </div>
</div>


<script>
			$(document).ready(function(){
				$(function() {
					$("img.lazy").lazyload();
				});
				
				$(".capsule").mouseenter(function(){
					
					$(this).children(".item_stuff_v2").children(".descriptor_block").animate({bottom: "0"}, 300);
					
				});
				$(".capsule").mouseleave(function(){			
					$(this).children(".item_stuff_v2").children(".descriptor_block").animate({bottom: "-117"}, 300);
				});
			});
</script>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
