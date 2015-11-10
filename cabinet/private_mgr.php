<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 ) {
    ?>




<div class="row">
<div class="span2">
    
<?php include "sidebar_mngr.php";?>
    
</div>
<div class="span10">
<h1>Рабочее место менеджера</h1>
<br>
<h2>Привет! Отличный денек чтобы поработать! :)</h2>

<?php 
include "../im/_class.informator.php";
$anketa = new users();
$anketa->get_user_info($_SESSION['user_uniq']);
//echo $anketa->name."<br>";
//echo $anketa->famil."<br>";
//echo $anketa->otch."<br>";
//echo $anketa->email."<br>";


$recent_order=$_GET['recent_order'];
if ($recent_order=='1') echo '<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Уважаемая(ый) '.$anketa->name.'!</strong><br> Ваш заказ принят и в самом скором времени будет обработан. Вы можете следить за исполнением заказа из своего личного кабинета.
</div>
';

//Проверка на наличие наобработанных заказов
$unprocessed_orders=new orders();
$unprocessed_orders->get_unprocessed_orders();
if ($unprocessed_orders->num_rows>0){
    echo "<p>Кажется у нас есть необработанные заказы! И их целых<span class=\"badge badge-important\">$unprocessed_orders->num_rows</span>шт.! <a href='unprocessed_orders.php'>Просмотреть</a></p>";
} else echo "<p><a href='unprocessed_orders.php'>Лист заказов </a></p>";
?> 
    
    
    
<br>
<?php 

    //   $tyty = new orders();
    //   $tyty->get_order($_SESSION['user_uniq']);
?>

<br><h2>Клиенты ждут одобрения!</h2><br>

<table class="table table-bordered table-stripped">
            <thead>
            <th>ФИО</th>
            <th>Адрес</th>
			<th>Тел.</th>
			<th>e-mail</th>
            <th>ИНН</th>
            <th>ОГРН</th>
            <th>Статус</th>
            <th>Что делаем?</th>
            </thead>
<?php 


                include "../db_connect.php";
                $query = "SELECT * FROM users WHERE level='1'";
                $result = mysql_query($query);
                while ($r = mysql_fetch_array($result)) {
                    if ($r[8]=='1') $status='Не одобрен';
                    echo "<tr>";
                    echo "<td> $r[5] $r[4] $r[6]</td>
                    <td>$r[12]</td>
					<td>$r[15]</td>
					<td>$r[7]</td>
                    <td>$r[13]</td>
                    <td>$r[14]</td>
                    <td id='x$r[0]'>$status</td>
                    <td><a href='#' id='$r[0]'>Одобрить</a><br><a href='#' id='del$r[0]'>Отклонить</a></td>
                                        ";
                    
//                    $total_sum = $on_sum['summ_buy'];
//                    if ($o[4] == 0)
//                        $status = 'Обработка заказа';
//                    if ($o[4] == 1)
//                        $status = 'Ожидание оплаты';
//                    if ($o[4] == 2)
//                        $status = 'Ожидайте получения';


    echo "</tr>";
    echo "<script>
$(document).ready(function(){
        $(\"#$r[0]\").click(function(){
     $.ajax({
        type: \"POST\",
        async: true,
        cache: false,
        url: \"_agree.php\",
        data: \"id=$r[0]\",
        success: function(msg){
        //alert(msg);
        $('#x$r[0]').html('<span class=\"label label-success\">Одобрен</span>'); 
        }
               
        });
                                    }
                        ); 
                                        }
                            );    
</script>";
    echo "<script>
$(document).ready(function(){
        $(\"#del$r[0]\").click(function(){
     $.ajax({
        type: \"POST\",
        async: true,
        cache: false,
        url: \"_disagree.php\",
        data: \"id=$r[0]\",
        success: function(msg){
        //alert(msg);
        $('#x$r[0]').html('<span class=\"label label-success\">Отклонен</span>'); 
        }
               
        });
                                    }
                        ); 
                                        }
                            );    
</script>";
                }
?>
    
</table>
    <?php echo $tyty->num_rows;?>
    



    

</div>

</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
