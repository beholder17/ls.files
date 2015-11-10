<?php
session_start();
//error_reporting(0);
define("PAGE_IDENTIFY", "im");
define("TITLE_WORDS", "Каталог одежды зима 2014-2015 | Новогодняя коллекция");
define("PATH_TO_ROOT", "http://www.ladystyle.su/");
define("KEY_WORDS", "новогодняя коллеция, обновление коллекции женской одежды, 2015, 2014-2015, новый сезон, мода, одежда от производителя, оптом, одежда не дорого, фабрика");
define("DESCRIPTION", "Каталог женской одежды осень-зима 2014-2015 в официальном оптовом интернет-магазине фирмы Lady Style ");
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



        <h1><?php echo "Новогодняя коллекция 2014"; ?></h1>
        

        <?php
        include "../db_connect.php";
      /*  $query = "SELECT MAX(`date`) FROM im_catalog";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            $last_date = $r[0];
        }*/

        $query = "SELECT DISTINCT category FROM im_catalog WHERE promo='2' ORDER BY id;";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            //echo $r[category];
            //echo $r[0];
            //$query = "SELECT * FROM im_catalog WHERE date='$last_date' AND category='$r[0]';"; 
            echo "<h2>" . $r[0] . "</h2>";
            $query2 = "SELECT * FROM im_catalog WHERE promo='2' AND category='$r[0]' AND `show`='1' ORDER BY date DESC;";
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

		<h2>Новогодняя коллекция женской одежды оптом 2014-2015</h2>
		<p>
		Близятся новогодние праздники. Это прекрасное и бесзаботное время, когда чувство ожидания новогоднего волшебства снова поселится в сердца прекрасных женщин!
		В такие моменты жизни хочется быть особенно обаятельной и красивой. Поспешите сделать заказ в оптовом интернет-магазине женской одежды Lady Style по низким ценам
		чтобы порадовать в Новый Год 2015 себя и своих покупательниц новой модной одеждой из новогодней коллекции.
		</p>
    </div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';
?>
