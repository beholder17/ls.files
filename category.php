<?php
function counter_summer($name)
{
//$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name';";
$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name' and `show`=1 and `season`='Весна-лето';";
$result_count=mysql_query($query_count);
$row=mysql_fetch_row($result_count);
return $row[0];
}
function counter_winter($name)
{
//$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name';";
//$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name' and `show`=1 and `season`='Осень-зима';";
$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name' and `show`=1 and `season`='Осень-зима';";
$result_count=mysql_query($query_count);
$row=mysql_fetch_row($result_count);
return $row[0];
}
function counter_big($name)
{
//$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name';";
$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name' and `show`=1 and `season`='Осень-зима' 
				AND (`size` like '%50%' OR  `size` like '52%' OR  `size` like '54%' OR  `size` like '56%' OR `size` like '58%' OR  `size` like '60%');";
$result_count=mysql_query($query_count);
$row=mysql_fetch_row($result_count);
return $row[0];
}

include "../db_connect.php";
if ($_GLOBALS['big']==1) 
{
	$collapsed_in='in';
	$collapsed_out='';
} 
else
{
	$collapsed_in='';
	$collapsed_out='in';
}


echo  '<div class="accordion" id="accordion2" style="margin-left: 28px;">
	<div class="accordion-group" style="margin-left: -30px; width: 170px">
  <div class="accordion-heading">
      <a class="accordion-toggle" href="http://www.ladystyle.su/im/soon.php">
          <strong>Скоро в продаже</strong>
      </a>
    </div>
	</div>
	

       <div class="accordion-group" style="margin-left: -30px; width: 170px">
        <div class="accordion-heading">
         <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          Весенне-летний сезон
         </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse '.$collapsed_in.'">
            <div class="accordion-inner">';
              	$query = "SELECT * FROM im_category ORDER BY name";
                $result=mysql_query($query);
				echo "<ul>";
                while($r=mysql_fetch_array($result))
                    { 
                    $count_item=counter_summer($r[1]);
                    echo "<li style='position: relative; left: 10px;'>";
                    //echo "<p><a href='catalog.php?page=1&amp;category=$r[1]&amp;season=Весна-лето' alt='".$r[2]."'>".$r[1]." ($count_item)</a></p>";
					echo "<p><a href='http://www.ladystyle.su/im/summer/$r[8]/1'>".$r[1]." ($count_item)</a></p>";
                    echo "</li>";
                    } 
				echo "</ul>";
        echo '</div>
        </div>
        </div>

      
      <div class="accordion-group" style="margin-left: -30px; width: 170px">
      <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          Осенне-зимний сезон
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse '.$collapsed_out.'">
      <div class="accordion-inner">';
      	$query = "SELECT * FROM im_category ORDER BY name";
        $result=mysql_query($query);
		echo "<ul>";
        while($r=mysql_fetch_array($result))
            { 
            $count_item=counter_winter($r[1]);
            if ($count_item!=0){
            echo "<li style='position: relative; left: 10px;'>";
            //echo "<p><a href='catalog.php?page=1&amp;category=$r[1]&amp;season=Осень-зима' alt='".$r[2]."'>".$r[1]." ($count_item)</a></p>";
			echo "<p><a href='http://www.ladystyle.su/im/winter/$r[8]/1'>".$r[1]." ($count_item)</a></p>";
			//r1 установить в 8
            echo "</li>";
            }
            }
		echo "</ul>";

echo '      </div>
    </div>
    </div>

<div class="accordion-group" style="margin-left: -30px; width: 170px">
      <div class="accordion-heading">
      <a class="accordion-toggle" href="http://www.ladystyle.su/im/novelty.php">
          Новинки
      </a>
    </div>
	<div class="accordion-heading">
      <a class="accordion-toggle" href="http://www.ladystyle.su/im/finery.php">
          Нарядная одежда
      </a>
    </div>
	<div class="accordion-heading">
      <a class="accordion-toggle" href="http://www.ladystyle.su/im/promo.php">
          <strong>Каталог акции</strong>
      </a>
    </div>
	';
   
echo '</div></div>';
?>


<div class="magenta-strip"></div>
Поиск по номеру модели
<div class="input-append">
    <form action="http://www.ladystyle.su/im/details.php" method="get">
	<input type="hidden" name="season" value="any">
    
	<input type="hidden" name="cat" value="usual">
	<input type="hidden" name="search_form_flag" value="true">
	<input name="art" class="span1" id="appendedInputButton" size="16" type="text">
	
<!--    <button class="btn" type="submit"></button>-->
      <button type="submit" class="btn"><i class="icon-search"> </i> Найти</button>
    </form>
</div>
<div class="magenta-strip"></div>
