<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","история заказов Lady Style");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 ) {
    ?>




<div class="row">
<div class="span2">
<?php include "sidebar_opt.php";?>
    
</div>
<div class="span10">
<h1>История Ваших заказов</h1>
<br>
<!--<h2>Анкета</h2>-->
<?php 
$anketa = new users();
$anketa->get_user_info($_SESSION['user_uniq']);
//echo $anketa->name."<br>";
//echo $anketa->famil."<br>";
//echo $anketa->otch."<br>";
//echo $anketa->email."<br>";




?> 
    
    
    
<br>
<?php 
include "../im/_class.informator.php";
       $tyty = new orders();
       $tyty->get_order($_SESSION['user_uniq']);
?>

<br><h3>История заказов</h3><br>

<table class="table table-bordered table-stripped">
            <thead>
            <th>Код заказа</th>
            <th>Заказ на сумму</th>
            <th>Дата</th>
            <th style="width: 100px;">Просмотреть</th>
            <th>Статус</th>
            </thead>
    
    <?php
                include "../db_connect.php";
                $query_orders = "SELECT * FROM im_orders WHERE user_uniq='" . $_SESSION['user_uniq'] . "' AND status=5 ORDER BY date";
                $result_orders = mysql_query($query_orders);
                while ($o = mysql_fetch_array($result_orders)) {
                    $on_sum = $o[3];
                    $on_sum = unserialize($on_sum);
                    $total_sum = $on_sum['summ_buy'];
                    if ($o[4] == 0)
                        $status = 'Обработка заказа';
                    if ($o[4] == 1)
                        $status = 'Ожидание оплаты';
                    if ($o[4] == 2)
                        $status = 'Ожидайте получения';
                    if ($o[4] == 5)
                        $status = 'Доставлено';

                    echo "<tr>
  <td>$o[0]</td>
            <td>$total_sum руб.</td>
            <td>$o[2]</td>
            <td><a href=\"overview.php?id=$o[0]&user_uniq=$o[1]\"><img src=\"zoom.png\"></a></td>
           <td><span class=\"label\">" . $status . "</span></td>
  </tr>";
                }
                ?>
    
    
    
    
    
    
    
    
</table>
</div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
