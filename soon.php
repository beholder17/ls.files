<?php
session_start();
//error_reporting(0);
define("PAGE_IDENTIFY", "im");
define("TITLE_WORDS", "Ожидаемые поступления, каталог одежды зима 2015-2016 | Скоро в продаже");
define("PATH_TO_ROOT", "http://www.ladystyle.su/");
define("KEY_WORDS", "скоро в продаже, новая коллеция, обновление коллекции женской одежды, 2015, 2015-2016, новый сезон, мода, одежда от производителя, оптом, одежда не дорого, фабрика");
define("DESCRIPTION", "На этой странице вы можете ознакомиться со ожидаемым поступлением женской одежды на склады Lady Style. Каталог женской одежды 2015-2016 в официальном оптовом интернет-магазине фирмы Lady Style ");
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



        <h1><?php echo "Скоро в продаже!"; ?></h1>
        

        <?php
        include "../db_connect.php";
      /*  $query = "SELECT MAX(`date`) FROM im_catalog";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            $last_date = $r[0];
        }*/

        $query = "SELECT DISTINCT category FROM im_catalog WHERE `show`='1' AND promo='999' ORDER BY id;";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            //echo $r[category];
            //echo $r[0];
            //$query = "SELECT * FROM im_catalog WHERE date='$last_date' AND category='$r[0]';"; 
            echo "<h2>" . $r[0] . "</h2>";
            $query2 = "SELECT * FROM im_catalog WHERE promo='999' AND category='$r[0]' AND `show`='1' ORDER BY date DESC;";
         //   echo $query2;
//                        echo $query;
            echo "<ul class=\"thumbnails\">";
            $result2 = mysql_query($query2);
            while ($rr = mysql_fetch_array($result2)) {
                echo "
            <li class='span2'>
            <i class='icon-info-sign'> </i> $rr[1],<br/> модель № $rr[8]
            <a rel='nofollow' href='http://www.ladystyle.su/im/details/any/usual/$rr[8]' class='thumbnail'>
            <img src='http://www.ladystyle.su/im/image/80/$rr[6]' alt='$rr[2]' style='width: 86px; height: 200px'>

            </a>";
           if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) echo "$rr[4] руб.";
           /*   echo "
        <a href='details.php?art=$rr[8]' class='btn btn-small' type='button'>Обзор <i class='icon-zoom-in'></i></a>";*/
        echo "</li>";
            }
            echo "</ul><hr>";
        }
        ?>

		<h2>Скоро в продаже!</h2>
		<p>
		На нашем сайте отображается каталог товаров, доступных для заказа и имеющихся в наличии. Однако есть категория одежды, которая находится на завершающем этапе производства, но доступная для заказа уже сейчас. На этой странице вы можете ознакомиться с женской одеждой, которая готовится к сдаче на склад.
		</p>
    </div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>
