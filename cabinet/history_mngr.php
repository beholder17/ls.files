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
<h1>История заказов</h1>
<br>


<?php 
//$recent_order=$_GET['recent_order'];
//if ($recent_order=='1') echo '<div class="alert alert-info">
//<button type="button" class="close" data-dismiss="alert">&times;</button>
//<strong>Уважаемая(ый) '.$anketa->name.'!</strong><br> Ваш заказ принят и в самом скором времени будет обработан. Вы можете следить за исполнением заказа из своего личного кабинета.
//</div>
//';


include "../db_connect.php";
       
        $result=mysql_query($query);
        
        $query = "SELECT * FROM im_orders WHERE `status` =5";
        $result=mysql_query($query);
        
echo '<table class="table table-bordered table-stripped">
            <thead>
            <th>Код заказа</th>
            <th>Покупатель</th>
            <th>Заказ на сумму</th>
            <th>Дата</th>
            <th>Обзор</th>
            <th>Статус</th>
            </thead>
';
    
        while ($r = mysql_fetch_array($result)) {
        echo "<tr>";
//получаем информацию о покупателе
        $query2 = "SELECT * FROM users WHERE user_uniq='$r[1]'";
        $result2 = mysql_query($query2);
        while ($r2 = mysql_fetch_array($result2)) {
            $bb= $r2[5].' '.$r2[4].' '.$r2[6]. '<br>' . 'E-mail: '.$r2[7] . '<br>'. 'Адрес: '.$r2[12] . '<br>'. 'ИНН: '.$r2[13] . '<br>'.'ОГРН: '.$r2[14] . '<br>'.  'Тел.'. $r2[15] . '<br>';
        }

$tmp1=unserialize($r[3]);
$tmp1['summ_buy'];

                    if ($r[4] == 0)
                        $status = '<span class="label label-info">Обработка заказа</span>';
                    if ($r[4] == 1)
                        $status = '<span class="label label-warning">Ожидание оплаты</span>';
                    if ($r[4] == 2)
                        $status = '<span class="label label-success">Ожидайте получения</span>';
                    if ($r[4] == 5)
                        $status = '<span class="label">В истории</span>';
                    
                    
        echo '<td>' . $r[0] . '</td><td>' . $bb . '</td><td style="max-width: 400px;">' . $tmp1['summ_buy'] . 'руб</td><td>' . $r[2] . '</td><td><a href="mngr_overview.php?id='.$r[0].'&user_uniq='.$_SESSION['user_uniq'].'" class="btn">Обзор</a></td><td id="x'.$r[0].'">'.$status.'</td>';
//        echo "<td>
//<a href='#' id='$r[0]'>Ожидание оплаты</a><br>
//<a href='#' id='rcv$r[0]'>Отправлено</a><br>
//<a href='#' id='hst$r[0]'>В историю</a><br>
//</td>";
        echo "</tr>";
//            echo "<script>
//$(document).ready(function(){
//        $(\"#$r[0]\").click(function(){
//     $.ajax({
//        type: \"POST\",
//        async: true,
//        cache: false,
//        url: \"_wait_pay.php\",
//        data: \"id=$r[0]\",
//        success: function(msg){
//        //alert(msg);
//        $('#x$r[0]').html('<span class=\"label label-warning\">Ожидание оплаты</span>'); 
//        }
//               
//        });
//                                    }
//                        ); 
//                                     
//        
//        $(\"#rcv$r[0]\").click(function(){
//        $.ajax({
//        type: \"POST\",
//        async: true,
//        cache: false,
//        url: \"_rcv.php\",
//        data: \"id=$r[0]\",
//        success: function(msg){
//        //alert(msg);
//        $('#x$r[0]').html('<span class=\"label label-success\">Отправлено</span>'); 
//        }
//               
//        });
//                                    }
//                        ); 
//        
//        $(\"#hst$r[0]\").click(function(){
//        $.ajax({
//        type: \"POST\",
//        async: true,
//        cache: false,
//        url: \"_hst.php\",
//        data: \"id=$r[0]\",
//        success: function(msg){
//        //alert(msg);
//        $('#x$r[0]').html('<span class=\"label\">В истории заказов</span>'); 
//        }
//               
//        });
//                                    }
//                        ); 
//        
//        }
//        
//        
// 
//                                        
//                            );    
//</script>";
    }
    echo "</table>";
    //$this->num_rows=mysql_num_rows($result);
    mysql_close($link);
?> 
    
    
    
<br>


    



    

</div>

</div>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
