<?php
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


//формируем код ссылки для предыдущей страницы
$previous="<a href='";
$param2=$_GLOBALS['param2'];

$previous=$previous.$param2.".php?page=";
if ($page>1)
  { $page--;
    $previous=$previous.$page;
    $page++;}
   else $previous=$previous.'1';
$previous=$previous."&category=$param&season=$param3'>Предыдущая</a>";


//формируем код ссылки для следующей страницы
$next="<a href='".$param2.".php?page=";
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
$next=$next."&category=$param&season=$param3'>&nbsp;Следующая</a>";




echo "<div class='pagination pagination-large pagination-centered' style='margin-bottom: 70px;'><ul class='pagination'>\n";
if ($page==1) {echo "<li class='active'>".$previous."</li>";} else echo "<li>".$previous."</li>";
for ($temp=1; $temp<$kol_vo_str+1; $temp++)
 {
        if ($page==$temp) {echo "<li class='active'><a href='".$param2.".php?page=".$temp."&category=".$param."'>".$temp."</a></li>";} else {
 	echo "<li><a href='".$param2.".php?page=".$temp."&category=".$param."&season=".$param3."'>".$temp."</a></li>";}
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