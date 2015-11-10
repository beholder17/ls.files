<?php
session_start();
error_reporting(0);
define("PAGE_IDENTIFY", "im");
define("TITLE_WORDS", "Леди Стайл - новинки женской одежды российского производства");
define("PATH_TO_ROOT", "http://www.ladystyle.su/");
define("KEY_WORDS", "Обновление коллекции, женская одежда, весна лето 2015, новый сезон, одежда от производителя оптом, одежда оптом не дорого");
define("DESCRIPTION", "Новая коллекции женской одежды весна-лето 2015 российского производства! Для опта доступны: платья, блузки, брюки и другие категории товаров. Доставка по всей России! ");
$CAT_TYPE="novelty";
?>
<?php
//сделать безопасное получение
include "_class.informator.php";
//$info = new informator();
//$info->getCategoryDescription($category);
//Теперь данные категории доступны через свойства класса _class.informator.php :)
?>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
?>

<div class="row">
    <div class="span2"><?php include "category.php"; ?></div>
    <div class="span10">



        <h1><?php echo "Новинки"; ?></h1>
        <h3><?php echo "Обновление коллекции"; ?></h3>

        <?php
        include "../db_connect.php";
        $query = "SELECT MAX(`date`) FROM im_catalog";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            $last_date = $r[0];
        }

        //$query = "SELECT DISTINCT category FROM im_catalog WHERE date='$last_date';";
		//вернуть закомментированное сверху. это для общего случая.
		//$last_date = "2014-12-15";		
		$last_date = "2015-02-19";		
		
		
		//$query = "SELECT DISTINCT category FROM im_catalog WHERE (date='$last_date') OR (date='$last_date2')";
		$query = "SELECT DISTINCT category FROM im_catalog WHERE date='$last_date'";
		///
		
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            //echo $r[category];
            //echo $r[0];
            //$query = "SELECT * FROM im_catalog WHERE date='$last_date' AND category='$r[0]';"; 
            echo "<h2>" . $r[0] . "</h2>";
            $query2 = "SELECT * FROM im_catalog WHERE date='$last_date' AND category='$r[0]' AND `show`='1';";
			///раскомментировать 53 строку (запрос выше) она дл яобщего случая. сейчас выводятся новинки по двум датам, нижнюю строку 55 удалить для общего случая.
			$query2 = "SELECT * FROM im_catalog WHERE (date='$last_date' OR date='$last_date2') AND category='$r[0]' AND `show`='1' ORDER by date DESC;";
			
			
            //echo $query;
//                        echo $query;
            echo "<ul class=\"thumbnails\">";
            $result2 = mysql_query($query2);
            while ($rr = mysql_fetch_array($result2)) {
                echo "
            <li class='span2'>
            <i class='icon-info-sign'> </i> $rr[1],<br/> модель № $rr[8]
            
			<a rel='nofollow' href='http://www.ladystyle.su/im/details/any/$CAT_TYPE/$rr[8]' class='thumbnail'>
            <img src='image/80/$rr[6]' alt='$rr[2]' style='width: 86px; height: 200px'>

            </a>";
           if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50)) echo "$rr[4] руб.";
              /*echo "
        <a href='details.php?art=$rr[8]&cat=$CAT_TYPE' class='btn btn-small' type='button'>Обзор <i class='icon-zoom-in'></i></a>";*/
        echo "</li>";
            }
            echo "</ul><hr>";
        }
        ?>

    </div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>
<?php 
/*include "../db_connect.php";
  $query = "SELECT `tel` FROM `users` WHERE `level`='2'; ";
  $result = mysql_query($query);
  while ($rr = mysql_fetch_array($result)) {
  
  //echo $rr[0]."</br>";
  
  }*/
?>