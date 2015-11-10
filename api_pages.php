<?php
/*
function category_translator($var)
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
*/
/*Скрипт вывода контента постранично*/
$page=$_GET['page'];
if (!isset($page)) $page=1;
//Количество моделей на странице
$on_page=30;
$param3=$_GLOBALS['param3'];
$query = "SELECT COUNT(*) FROM im_catalog WHERE category='";
$param=$_GLOBALS['param'];
$query=$query.$param."' and `show`=1 and `season`='".$param3."'";
$result = mysql_query($query) or die;
$ar = mysql_fetch_row($result);
$news_amount = $ar[0];
$kol_vo_zap = $news_amount;
$temp = $kol_vo_zap / $on_page;
//echo "$temp";
$kol_vo_str = ceil ($temp);

//yy begin - конвертор русскоязычного сезона в англ
	if ($param3=="Весна-лето") {$param3_trans = 'summer';} 
	if ($param3=="Осень-зима") {$param3_trans = 'winter';} 
//yy end	

//переводим категорию в алиас её
//$param_trans = category_translator($param);
$param_trans = $_GLOBALS['param_categ_eng'];

//формируем код ссылки для предыдущей страницы
$previous="<a href='http://www.ladystyle.su/im/$param3_trans/$param_trans/";
$param2=$_GLOBALS['param2'];

//$previous=$previous.$param2.".php?page=";
if ($page>1)
  { $page--;
    $previous=$previous.$page;
    $page++;}
   else $previous=$previous.'1';
//$previous=$previous."&category=$param&season=$param3'>Предыдущая</a>";
$previous=$previous."'>Предыдущая</a>";




//формируем код ссылки для следующей страницы
$next="<a href='http://www.ladystyle.su/im/$param3_trans/$param_trans/";
if ($page==$kol_vo_str)
    {
    $next=$next.$page;
    }
   else
    {
   	$page++;
   	$next=$next.$page;
   	$page--;
   	};
$next=$next."'>&nbsp;Следующая</a>";




echo "<div class='pagination pagination-large pagination-centered' style='margin-bottom: 70px;'><ul class='pagination'>\n";
if ($page==1) {echo "<li class='active'>".$previous."</li>";} else echo "<li>".$previous."</li>";
for ($temp=1; $temp<$kol_vo_str+1; $temp++)
 {
        if ($page==$temp) {echo "<li class='active'><a href='http://www.ladystyle.su/im/$param3_trans/$param_trans/$temp'>".$temp."</a></li>";} else {
 	echo "<li><a href='http://www.ladystyle.su/im/$param3_trans/$param_trans/$temp'>".$temp."</a></li>";}
 }
if ($page==$kol_vo_str) {echo "<li class='active'>".$next."</li></ul>";} else {echo "<li>".$next."</li></ul>";}
echo "<br /><span class=\"label label-info\">Страница № ".$page."</span><br /></div>";
//<span class="label label-info">Информация


//echo "<b>Страница № ".$page."</b>";





//echo $next;
//echo "<br /><b>Страница № ".$page."</b><br />";
$from=($page-1) * $on_page;
$to=$on_page*$page;
?>
<script>
    $(document).ready(function(){
		$(".span10 li.active a").attr("href", "javascript:void(0)");		
        }
    );
</script>






