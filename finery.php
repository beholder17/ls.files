<?php
session_start();
error_reporting(0);
define("PAGE_IDENTIFY", "im");
define("TITLE_WORDS", "Нарядная женская одежда 2014");
define("PATH_TO_ROOT", "http://www.ladystyle.su/");
define("KEY_WORDS", "Женская нарядная одежда, одежда от российского производителя, одежда Lady Style, осень-зима 2014");
define("DESCRIPTION", "Женская нарядная одежда от российского производителя Lady Style Осень-Зима 2014, нарядные платья");
$CAT_TYPE="finery";
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



        <h1><?php echo "Каталог нарядной одежды"; ?></h1>
       

        <?php
        include "../db_connect.php";
		$models_for_output = "2775 2774 2624 2615 2615-1 2592 2424 2357 2245 2583 1510-1 2034 2033 2026 2024 2024-1 2015 1908 1899 1817 2354 2322 1995 1887 2079 2407-1 2407-2 2583 1501 1528";
		$pars=explode (' ',$models_for_output);

		$query="SELECT * FROM `im_catalog` WHERE ";
		foreach ($pars as $tt)
{
 
 $result=mysql_query($query); 
 $half_query.= "(`nomer_mod`='$tt' AND `show` = '1') OR ";
 //$half_query = $half_query.$half_query;
 //echo $half_query."<br>";
}
$half_query2=substr($half_query,0,-4); 
 $query = substr($query.$half_query,0,-4); 
 $query_naryad=$query.";";
 //echo $query_naryad;
        $query = "SELECT DISTINCT category FROM im_catalog WHERE ".$half_query2." ORDER BY id;";
        $result = mysql_query($query);
        while ($r = mysql_fetch_array($result)) {
            //echo $r[category];
            //echo $r[0];
            //$query = "SELECT * FROM im_catalog WHERE date='$last_date' AND category='$r[0]';"; 
            echo "<h2>" . $r[0] . "</h2>";
            $query2 = "SELECT * FROM im_catalog WHERE ".$half_query2." AND category='$r[0]';";
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
