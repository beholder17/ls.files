<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
$user_uniq_get=$_GET['user_uniq'];
$order_id=$_GET['id'];
if ($check->accepted==1 && $check->level==50) {
    ?>




<div class="row">
<div class="span2">
<?php include "sidebar_mngr.php";?>
    
</div>

    
<div class="span10">

<h1>Обзор оптового заказа № <?php echo $order_id; ?></h1>




<?php 
include "../im/_class.informator.php";
       $ord = new orders();
       $ord->get_order_by_id($order_id);
       $order_overview=array();
       $order_overview=$ord->items;
	 //  print_r ($order_overview);
       echo "<span class=\"label label-info\">".$ord->status."</span>";
?>
       <table class="table table-bordered table-stripped">
            <thead>
            <th>№</th>
            <th>Фото</th>
            <th>Номер модели</th>
            <th>Размер</th>
            <th>Кол-во</th>
            <th>Цена за 1 шт</th>
            <th>Итоговая цена</th>
			<th>-</th>
            </thead>
         <?php 
         $inc=0;
         $total_quantity=0;
         foreach ($order_overview['name'] as $key => $val)
         {
             $inc++;
             echo "<tr>";
             echo "<td>$inc</td>";
             echo "<td><a href='../im/details.php?art=$val'><img height='100px' src='../im/image/80/$val.jpg'></a></td>";
             echo "<td>$val</td>";
             echo "<td>".$order_overview['size'][$key]."</td>";
             echo "<td>".$order_overview['quantity'][$key]."</td>";
             $total_quantity=$total_quantity+$order_overview['quantity'][$key];
             echo "<td>".$order_overview['price'][$key]."руб.</td>";
             $total_price=$order_overview['quantity'][$key]*$order_overview['price'][$key];
             echo "<td>".$total_price."руб.</td>";
			 //echo "<td><a href='unset_position_mngr.php?id=$inc&order_id=$order_id'>убрать</a>$key</td>";
			 echo "<td><a href='unset_position_mngr.php?id=$key&order_id=$order_id'>убрать</a></td>";
             echo "</tr>";
			 //print_r $order_overview;
         }
         ?>
         <tr style="background-color: #E1FFDF;">
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td><?php echo "Ед.всего: $total_quantity";?></td>
             <td></td>
             <td>ИТОГО: <?php echo $order_overview['summ_buy']." руб.";?></td>
         </tr>
         </table>  
    <?php echo "Доставка: ".$order_overview[tk]; 
    $user=new users();
    $user->get_user_info($user_uniq_get);
    //echo "<br>".$user->address;
    ?>
</div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
