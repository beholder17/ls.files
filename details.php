<?php
error_reporting(0);
session_start(); 
function season_translator($var)
{
switch ($var) {
case 'Весна-лето': $tr_var="summer"; break;
case 'Осень-зима': $tr_var="winter"; break;
default: $tr_var=$var;
}; 
return $tr_var;
}

//session_unset();
//print_r($_SESSION);
$art=$_GET['art'];
$cat_type=$_GET['cat'];
if ($cat_type==NULL) $cat_type = 'usual';
//echo "<script>alert('".$art."-".$cat_type."')</script>";

//отбиваем от имени модели суффикс. нужно имя модели без него для вывода моделей типа 3214-1 3214-2 3214-3
//echo $art."<br>";

$temp5=substr_count($art, "-");
//echo $tt."*<br>";
if ($temp5>0){
    $artparts=explode("-",$art);
}






if ($_COOKIE[CookieArt]!=NULL)
{
  if (stristr($_COOKIE[CookieArt],$art)==NULL){
  $seenmassive=$_COOKIE[CookieArt]."|".$art;
  setcookie (CookieArt, $seenmassive);    

 $grut=explode('|', $seenmassive);
 //echo count($grut);
 if (count($grut)>5) {
 $grut=array_slice($grut, 1);
 $grut=implode('|', $grut);
 setcookie (CookieArt,$grut);
 }
 //print_r ($grut);
  }} else {
  setcookie (CookieArt, $art);    
}
//сделать безопасное получение
//$_SESSION[5][5]='ugly';
//echo $seenmassive;
////echo "_".$_SESSION[0][0]."-".$_SESSION[0][0]."_<br>";    
////echo "_".$_SESSION[1][1]."-".$_SESSION[1][1]."_<br>";    
////echo "_".$_SESSION[2]['name']."-".$_SESSION[2]['specify']."_<br>";    
////echo "_".$_SESSION[3]['name']."-".$_SESSION[3]['specify']."_<br>";   
//print_r($_SESSION);
//print_r($_COOKIE);
//

//echo "<br> каунт бай--- ".$_GLOBALS['count_buy'];
//echo "_".$_SESSION['name'][1]."-".$_SESSION['size'][1]."_<br>";   
//echo "_".$_SESSION['name'][2]."-".$_SESSION['size'][2]."_<br>";   

include "_class.informator.php";
$info_art = new informator();
$info_art->getArtDescription($art);
//Теперь данные артикула доступны через свойства класса _class.informator.php :)
?>
<?php 
 $title_words_content = $info_art->item_name;
 $title_words_content_num = $info_art->item_nomer_mod;
 
 setlocale(LC_CTYPE, "ru");
 $title_words_content = strtolower($title_words_content);
 $item_season = $info_art->item_season;
 $keywords_content = $info_art->item_category;
 define ("PAGE_IDENTIFY", "im");
 //define ("TITLE_WORDS","Женская одежда оптом , категории товаров");
 if ($info_art->item_season=='Весна-лето') $season_keywords = "на лето, на весну";
 if ($info_art->item_season=='Осень-зима') $season_keywords = "на весну, на зиму";
 define ("TITLE_WORDS","Купить $title_words_content оптом $season_keywords");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "купить $title_words_content, артикул $title_words_content_num оптом, мелкий опт, $keywords_content от производителя, поставки $keywords_content");
 if ($info_art->item_description==NULL OR $info_art->item_description==" ") {define ("DESCRIPTION", "$title_words_content, артикул $title_words_content_num, оптовый интернет магазин женской одежды Lady Style предлагает  купить $keywords_content");} else {
 define ("DESCRIPTION", "$info_art->item_description купить оптом не дорого");
 }
 
 
 
 
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
	//"details.php?art=";

	$foo = request_url();
	if ($_GET['search_form_flag']!="true"){
	if ((strrpos($foo, 'art=', 0)!=FALSE) OR (strrpos($foo, 'cat=', 0)!=FALSE) OR (strrpos($foo, 'season=', 0)!=FALSE) OR (strrpos($foo, $summer_txt, 0)!=FALSE) OR (strrpos($foo, $winter_txt, 0)!=FALSE))
	{//  echo "<script>alert('34');</script>";
		$tmp_s1 = season_translator($item_season);
		header("HTTP/1.1 301 Moved Permanently"); 
		if ($item_season==NULL) $item_season="any";
		header("Location: http://www.ladystyle.su/im/details/$tmp_s1/$cat_type/$title_words_content_num"); 
		
		exit();		
		
	//echo "<script>alert('mod-rewrite flag:  $item_season - $cat_type - $title_words_content_num');</script>";
	}
	}
 //получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект - конец
 
 
?>
<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';

?>

<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
<script type="text/javascript">
  VK.init({apiId: 4652989, onlyWidgets: true});
</script>



<div class="row">
    <div class="span2">
	<?php include "category.php"?>
	<?php include $_SERVER['DOCUMENT_ROOT']."/articles/_bar_category.php"; ?>
	</div>
    
    <div class="span10">
<!--<a href="javascript:history.back()" onMouseOver="window.status='Назад';return true"><i class="icon-backward"> </i> Назад</a>	-->
<?php 
/***Предыдущая/следующая запись Н***********/
//if ($cat_type=='general') {echo "<br>";
if ($cat_type!=NULL) {echo "<br>";
		include $_SERVER['DOCUMENT_ROOT']."/db_connect.php";	
		$massive=array();
		
		//if ($cat_type=='usual') {}
		if ($cat_type=='general') {
		if (($_GET['season']=='Весна-лето') OR ($_GET['season']=='summer')) {$query="SELECT id FROM im_catalog WHERE category='".$info_art->item_category."' and `season` like 'Весна-лето' and `show`=1 ORDER BY nomer_mod desc";};
		if (($_GET['season']=='Осень-зима') OR ($_GET['season']=='winter')) {
		//$query="SELECT id FROM im_catalog WHERE `Category`='".$info_art->item_category."' AND `show`=1 AND `season`='Осень-зима' ORDER BY date desc;";
		$query="SELECT id FROM im_catalog WHERE category='".$info_art->item_category."' and `season` like 'Осень-зима' and `show`=1 ORDER BY nomer_mod desc";
		};
		}
		if ($cat_type=='promo') {$query="SELECT id FROM im_catalog WHERE `Category`='".$info_art->item_category."' AND `show`=1 AND `promo`=".$info_art->item_promo.";";};
		if ($cat_type=='novelty') {
        $query = "SELECT MAX(`date`) FROM im_catalog";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            $last_date = $r[0];
        }
		$query="SELECT id FROM im_catalog WHERE `Category`='".$info_art->item_category."' AND `show`=1 AND `date`='".$last_date."';";
		//echo $query;
		};
		
		
		$result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            {
			$massive=array_merge((array)$massive, (array)$r);			
			}
			
			unset ($massive[id]);
		//	print_r ($massive);
			$current_element=array_search($info_art->item_id, $massive);
		//	echo "<br>current: ".$current_element."<br>";
			$next_element=$current_element+1;
			$prev_element=$current_element-1;
			$query="SELECT * FROM im_catalog WHERE `id`=".$massive[$prev_element];		
			$result=mysql_query($query);
			while($r=mysql_fetch_array($result))
            {                      
			$season_tmp=season_translator($r[10]);
				//echo "<span class='label'><a style='color: white' href='http://www.ladystyle.su/im/details.php?art=$r[8]&cat=$cat_type&season=$r[10]'><i class='icon-arrow-left icon-white'></i> Предыдущая модель $r[8]</a></span>";
				echo "<span class='label'><a style='color: white' href='http://www.ladystyle.su/im/details/$season_tmp/$cat_type/$r[8]'><i class='icon-arrow-left icon-white'></i> Предыдущая модель $r[8]</a></span>";
			}
			$query="SELECT * FROM im_catalog WHERE `id`=".$massive[$next_element];			
			$result=mysql_query($query);
			while($r=mysql_fetch_array($result))
            {                
				$season_tmp=season_translator($r[10]);
				//echo "<div class='pull-right'><span class='label'><a style='color: white' href='http://www.ladystyle.su/im/details.php?art=$r[8]&cat=$cat_type&season=$r[10]'>Следующая модель $r[8] <i class='icon-arrow-right icon-white'></i> </a></span></div>";
				echo "<div class='pull-right'><span class='label'><a style='color: white' href='http://www.ladystyle.su/im/details/$season_tmp/$cat_type/$r[8]'>Следующая модель $r[8] <i class='icon-arrow-right icon-white'></i> </a></span></div>";
			}
}
/***Предыдущая/следующая запись К***********/	
?>
<h1><?php echo $info_art->item_name;?>, артикул <?php echo $info_art->item_nomer_mod;?></h1>
<?php if ($info_art->item_promo=='999') echo "<h2><div class='soon_txt'>Скоро в продаже!</div></h2>"; ?>
<span itemscope itemtype="http://schema.org/Product">




</span><br/>
<!--/////////////////-->
<?php 

$ifnotexist=$info_art->num_rows;
if ($ifnotexist==0){
    echo "
    <script language=\"JavaScript\"> 
  window.location.href = \"http://www.ladystyle.su/im/notfound.php?mod=$art\"
</script>";
}
//echo "Присутствие: ".$info_art->num_rows." шт"; 

?>

<div class="row">
    <div class="span4">

        

        
        
<div style="float: left; margin-right: 50px; border-right: 1px lightgray solid;">        
<ul class="unstyled">
    
    <?php
    
//существует ли файл
$index_image=1;    
while ($stop==0){
$filename='image/'.$art.'_'.$index_image.'.jpg';
//echo $filename;
if (file_exists($filename)) {
echo  "<li>
<a rel=\"{gallery: 'gal1', smallimage: 'http://www.ladystyle.su/im/image/".$art."_".$index_image.".jpg',largeimage: 'http://www.ladystyle.su/im/image/600/".$art."_".$index_image.".jpg'}\" href=\"javascript:void(0);\">  
    <img alt='$info_art->item_category, артикул $art' src=\"http://www.ladystyle.su/im/image/80/".$art."_".$index_image.".jpg\" style='height: 120px'>  
</a>
        </li>";
$index_image++;
//$filename='image/'.$art.'.jpg';
} else {$stop=-1;
        break;}
}
echo  "<li>
<a rel=\"{gallery: 'gal1', smallimage: 'http://www.ladystyle.su/im/image/".$art.".jpg',largeimage: 'http://www.ladystyle.su/im/image/600/".$art.".jpg'}\" href=\"javascript:void(0);\"><div class=\"date_spec\">gallery: 'gal1', smallimage: 'http://www.ladystyle.su/im/image/".$art.".jpg',largeimage: 'http://www.ladystyle.su/im/image/600/".$art.".jpg'</div>
    <img src=\"http://www.ladystyle.su/im/image/80/".$art.".jpg\" style=\"height: 120px;\" alt=\"$info_art->item_category, артикул $art\">  
</a>
        </li>";
?>

</ul>

</div>        

        
<a rel="gal1" href="http://www.ladystyle.su/im/image/600/<?php echo $info_art->item_image; ?>" class="MYCLASS" title="Модель № <?php echo $art;?>" >
    <img alt="<?php echo $info_art->item_name; ?>" id="item_image" width="239" height="538" src="http://www.ladystyle.su/im/image/<?php echo $info_art->item_image; ?>" title="<?php echo $info_art->item_name; ?>">  
</a>  
             

        

    <?php 
    if (($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) echo "<a href='http://www.ladystyle.su/im/edit_shell.php?id=".$info_art->item_id."'>Редактировать</a>";
//    echo $info_art->item_category.', '.$info_art->item_description.', Модель№ '.$info_art->item_nomer_mod; 
    //echo $info_art->num_rows;
    //if (==0){echo "<h1>Модель не найдена</h1>";}
    
    ?>

    </div>
    <div class="span5">
<?php if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) {
 
 //Проверка актуальности акции -н
 //echo $info_art->item_promo."<br>";
 $query_promo = "SELECT * FROM promo WHERE `id`='".$info_art->item_promo."'";
 //echo $query_promo;
 $result_promo=mysql_query($query_promo);     
 while($r_promo=mysql_fetch_array($result_promo))
  {
  $promo_active=$r_promo[3];
  }
  //echo $promo_active;
 //Проверка актуальности акции -к
 
 
 
    if (($info_art->item_price_new>0) && ($info_art->item_promo>0)&& ($promo_active=='1')) {
        echo "<h3>Цена: <s>".$info_art->item_price." руб.</s><h3><h2>По акции: ".$info_art->item_price_new." руб.</h2>";
		$rrr=$info_art->item_price;
		$rrrr=$info_art->item_price_new;
		$benyfit = $rrr - $rrrr;
		echo "<div class='benyfit'>Ваша экономия: ".$benyfit." руб. или ".round(100-($rrrr*100)/$rrr)."%</div><br><br>";
                } else {
                     echo "<h2>Цена: ".$info_art->item_price." руб.</h2>";
                } }
                else echo "<div class='how-to-buy'>Как купить?</div>
				<p>Купить одежду в розницу вы можете <a href='http://www.ladystyle.su/shops'>в наших магазинах</a>.</p>
				<p>Оптовые закупки возможны после заполнения <a href='http://www.ladystyle.su/opt/'>анкеты партнера</a>, причем чтобы совершить оптовый заказ не обязательно быть ИП! <strong>Опт от 10000 руб.</strong></p>
				<p>После заполнения анкеты партнера вам станут доступны <b>оптовые</b> цены и корзина для удобного формирования заказа</p>
				";
                ?>
<?php if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) include "buys_mod.php"; ?>



<!--Кнопка класс от одноклассников - начало-->
<script type="text/javascript" src="//yandex.st/share/share.js"
charset="utf-8"></script>
<div class="yashare-auto-init pull-right" data-yashareL10n="ru"
 data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,lj"></div> 

<!--Кнопка класс от одноклассников - конец-->
<table class="table">
    <tr>
        <td>Размеры</td>
        <td><b><?php echo $info_art->item_size;?></b></td>
	</tr>
	<tr>
        <td>Состав</td>
        <td><?php echo $info_art->item_content;?></td>
    </tr>
    <tr>
        <td>Рост</td>
        <td><?php echo $info_art->item_rost;?></td>
    </tr>
	<?php
	
	if ($info_art->item_height!=NULL) echo "
	<tr>
        <td>Длина изделия</td>
        <td>$info_art->item_height</td>
    </tr>";
	?>
    <tr>
        <td>Сезон</td>
        <td><?php echo $info_art->item_season;?>
        </td>
    </tr>
     
        
            <?php
       //     if ($artparts[0]!=NULL){
     
     $artparts=explode("-",$art);
          $query = "SELECT * FROM im_catalog WHERE `show`='1' AND nomer_mod LIKE '$artparts[0]%'"; 
                $result=mysql_query($query);
                $numrows_such=mysql_num_rows($result);
                if ($numrows_such>1){
                    echo "<tr><td>Вариации</td>
        <td>";
                while($r=mysql_fetch_array($result))
                    {
                        echo "<a href='http://www.ladystyle.su/im/details/any/usual/$r[8]'><img src='http://www.ladystyle.su/im/image/80/$r[6]' alt='$r[2]' style='width: 43px; height: 100px'></a>";
                    }
                     echo "</td></tr>";
                }
                   // echo "</td></tr>";
                    
                    //}
        ?>
        
    
    <tr>
        <td>Сертификация</td>
        <td><img alt="ТС" src="http://www.ladystyle.su/im/eac.jpg" title="Знак качества таможенного союза">
<img alt="Знак соответсивя российскому стандарту" src="http://www.ladystyle.su/im/rst.jpg" title="Знак соответсивя российскому стандарту">
        <a href="http://www.ladystyle.su/gallery/certificate.php">Обзор сертификатов</a>
        </td>
    </tr>
</table>

       <?php echo $info_art->item_description."<br>";?>

        
<!--        закладки-->
        <div class="tabbable" style="margin-top: 10px; min-height: 450px;"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li><a href="#tab1" data-toggle="tab">Доставка</a></li>
    <li><a href="#tab2" data-toggle="tab">Способы оплаты</a></li>
    <li><a href="#tab3" data-toggle="tab">Размерная сетка</a></li>
	<li class="active"><a href="#tab4" data-toggle="tab">Комментарии</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane" id="tab1">
      <p>Доставка осуществляется любой транспортной компанией на Ваше усмотрение. Единственное требование - это наличие филиала в Ростове-на-Дону поскольку посылка свой путь к Вам начнет оттуда! Отгрузка осуществляется в день зачисления оплаты или на утро следующего дня. Если планируете воспользоваться услугами транспортной компании впервые то Вам следует уточнить наличие филиала в вашем городе. Эту информацию можно получить на официальном сайте ТК. Там же есть калькулятор для вычисления стоимости доставки.</p>
    </div>
    <div class="tab-pane" id="tab2">
      <p>Для оптовых заказов предусмотрены следующие способы оплаты:<br>
          - На расчетный счет,<br>
          - На карту сбербанка.
      </p>
    </div>
        <div class="tab-pane" id="tab3">
      <p>размерная сетка</p>
      <img alt="Размерная сетка женской одежды" src="http://www.ladystyle.su/im/sizes.png"/>
    </div>
	  <div class="tab-pane active" id="tab4">
		<!-- Put this div tag to the place, where the Comments block will be -->
		<div id="vk_comments"></div>
		<script type="text/javascript">
		VK.Widgets.Comments("vk_comments", {limit: 10, width: "450", attach: false});
		</script>
    </div>
  </div>
</div>
        
        
        </div>
    </div>


<h4>Последнее из просмотренного...</h4>
<br/>
<div class="row">
    <?php
          //  $_GLOBALS['param']=$category;
          //  $_GLOBALS['param3']=$season;
          //  $_GLOBALS['param2']="catalog"; //значение постоянное
          //  include_once 'api_pages.php';    
        include "../db_connect.php";
        
if ($_COOKIE[CookieArt]!=NULL)
{
 $seenmassive=$_COOKIE[CookieArt];
 $grut=explode('|', $seenmassive);
 
// if (count($grut)>3) {
// $grut=array_slice($grut, 1);
// $grut=implode('|', $grut);
//  }
 foreach ($grut as $nomer_mod)
 {
  $query = "SELECT * FROM im_catalog WHERE nomer_mod='$nomer_mod' LIMIT 1;"; 
                $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
                    {
            echo "<li class='span2'>
            $r[1] <br/> модель № $r[8]";
            // echo "<a href='http://www.ladystyle.su/im/details.php?art=$r[8]' class='thumbnail'>";
			echo "<a rel='nofollow' href='http://www.ladystyle.su/im/details/any/usual/$r[8]' class='thumbnail'>";
            echo "<img src='http://www.ladystyle.su/im/image/80/$r[6]' alt='$r[2]' width=86px height=200px>
            </a>";
            /*if (($check->accepted == 1 && $check->level == 2) OR ($check->accepted == 1 && $check->level == 50))
            echo "<span class=\"label label-important\">$r[4] руб.</span>";*/
			if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50))
			 {
			 //if ($r[15]==3) {echo "<span class=\"label label-info\">$r[5] руб. (Акция)</span>";} else {echo "<span class=\"label label-important\">$r[4] руб.</span>";}
			 echo "<span class=\"label label-important\">$r[4] руб.</span>";
			 }
            echo "<br/>
               </li>";
        }
 }
 
 
 
 //print_r ($grut);
} else {
  echo "Ранее просмотренных моделей нет!";
}
      
      
        
                    
     
                     
        ?>
  
</div>
<div class="magenta-strip"></div>
<br>
<h4>С этим товаром также покупают...</h4><br>
<div class="row">


    
    <?
    
    if ($info_art->item_also!=NULL)
{
 $massive=$info_art->item_also;
 $also_models=explode(' ', $massive);
 
// if (count($grut)>3) {
// $grut=array_slice($grut, 1);
// $grut=implode('|', $grut);
//  }
 foreach ($also_models as $nomer_mod)
 {
     $query = "SELECT * FROM im_catalog WHERE nomer_mod='$nomer_mod' LIMIT 1;"; 
                $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
                    { 
                    echo "
         <li class='span2'>
            $r[1] <br/> модель № $r[8]";
            //echo "<a href='http://www.ladystyle.su/im/details.php?art=$r[8]' class='thumbnail'>";
			echo "<a rel='nofollow' href='http://www.ladystyle.su/im/details/any/usual/$r[8]' class='thumbnail'>";
            echo "<img src='http://www.ladystyle.su/im/image/80/$r[6]' alt='$r[2]' width=86px height=200px>

            </a>";
            if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50)) echo "<span class=\"label label-important\">$r[4] руб.</span>";
            echo "<br/>
        
        </li>";
 }
 
 }
 
 
 
 //print_r ($grut);
} else {
//если не указаны капсулы моделей то отображаем случайные модели фотосессии, проведенной в определенную дату (предположительно последняя фотосессия)
  //echo "";
  $last_fs_date = "2015-02-19";
  
       $query = "SELECT * FROM `im_catalog` WHERE `date`='$last_fs_date' ORDER BY RAND() LIMIT 5;"; 
                $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
                    {
                    echo "
         <li class='span2'>
            $r[1] <br/> модель № $r[8]";
            //echo "<a href='http://www.ladystyle.su/im/details.php?art=$r[8]' class='thumbnail'>";
			echo "<a rel='nofollow' href='http://www.ladystyle.su/im/details/any/usual/$r[8]' class='thumbnail'>";
            echo "<img src='http://www.ladystyle.su/im/image/80/$r[6]' alt='$r[2]' width=86px height=200px>

            </a>";
            if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50)) echo "<span class=\"label label-important\">$r[4] руб.</span>";
            echo "<br/>
        
        </li>";
 }
  
  
  
}

?>
    
    
    
 
</div>

<br><br><br> 
</div>
    
</div>
<script>
    //jQuery.noConflict();
$(document).ready(function(){  
    var options = {  
            zoomType: 'reverse',  
            lens:true,  
            preloadImages: true,  
           // alwaysOn:false,  
            zoomWidth: 600,  
            zoomHeight: 400,  
            xOffset:30,  
            yOffset:130,  
            position:'left',  
           hideEffect: 'hide',
            showEffect:'fadein',
            fadeoutSpeed:'fast',
            title:'0'
                       //...MORE OPTIONS  http://www.mind-projects.it/projects/jqzoom/index.php#examples
    };  
    $('.MYCLASS').jqzoom(options);  
});  
</script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>

