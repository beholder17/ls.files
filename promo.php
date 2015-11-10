<?php
session_start();
error_reporting(1);
define("PAGE_IDENTIFY", "im");
define("TITLE_WORDS", "Акция, скидки на женскую одежду. ");
define("PATH_TO_ROOT", "http://www.ladystyle.su/");
define("KEY_WORDS", "скидки и акции, женская одежда дешево, женская одежда оптом от производителя не дорого, плятья по акции, юбки по акции");
define("DESCRIPTION", "Женская одежда оптом по акции со склада. От крупного ужнороссийского производителя Lady Style");
$CAT_TYPE="promo";
?>
<?php
//сделать безопасное получение
//include "_class.informator.php";
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



        <h1><?php echo "Каталог акции от Lady Style"; ?></h1>
        <h3><?php echo "Модели, участвующие в акции"; ?></h3>
		<div class='open_prices'><a href='http://www.ladystyle.su/opt/'>Открыть цены!</a></div>
<style>		
		.open_prices {
  
  width: 250px;
  height: 70px;
  border-radius: 35px;
  line-height: 70px;
  text-align: center;
  box-shadow: 0px 2px 5px rgba(0,0,0,0.5);
  color: white;
  
  font-size: 25px;
  cursor: pointer;
font-style: italic;
font-family: georgia;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#cb60b3+0,c146a1+50,a80077+51,db36a4+100;Pink+Gloss */
background: #cb60b3; /* Old browsers */
background: -moz-linear-gradient(top,  #cb60b3 0%, #c146a1 50%, #a80077 51%, #db36a4 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cb60b3), color-stop(50%,#c146a1), color-stop(51%,#a80077), color-stop(100%,#db36a4)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* IE10+ */
background: linear-gradient(to bottom,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cb60b3', endColorstr='#db36a4',GradientType=0 ); /* IE6-9 */

}
.open_prices a{color: white;}
.open_prices:hover{
  text-decoration: underline;
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#db36a4+0,a80077+49,c146a1+50,cb60b3+100 */
background: #db36a4; /* Old browsers */
background: -moz-linear-gradient(top,  #db36a4 0%, #a80077 49%, #c146a1 50%, #cb60b3 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#db36a4), color-stop(49%,#a80077), color-stop(50%,#c146a1), color-stop(100%,#cb60b3)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #db36a4 0%,#a80077 49%,#c146a1 50%,#cb60b3 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #db36a4 0%,#a80077 49%,#c146a1 50%,#cb60b3 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #db36a4 0%,#a80077 49%,#c146a1 50%,#cb60b3 100%); /* IE10+ */
background: linear-gradient(to bottom,  #db36a4 0%,#a80077 49%,#c146a1 50%,#cb60b3 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#db36a4', endColorstr='#cb60b3',GradientType=0 ); /* IE6-9 */

}
</style>
        <?php
        include "../db_connect.php";
        $query = "SELECT DISTINCT category FROM im_catalog WHERE `promo`='4' ORDER BY id;";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            //echo $r[category];
            //echo $r[0];
            //$query = "SELECT * FROM im_catalog WHERE date='$last_date' AND category='$r[0]';"; 
            echo "<h2>" . $r[0] . "</h2>";
            $query2 = "SELECT * FROM im_catalog WHERE `show`='1' AND `promo`='4' AND category='$r[0]';";
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
           if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50)) echo "<del>$rr[4] руб</del><br>$rr[5] руб.";
		   
/*$num[0]=10000;  
$num[1]=1000;  
$procent=$rr[4]/100;  

$resultat=$rr[5]/$procent; 
$resultat=100-$resultat;*/
echo "<span class=\"label label-important\">-".round(100-($rr[5]*100)/$rr[4])."%</span>";

             /* echo "
        <a href='details.php?art=$r[8]&cat=$CAT_TYPE' class='btn btn-small' type='button'>Обзор <i class='icon-zoom-in'></i></a>";*/
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
