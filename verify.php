<?php 
session_start(); 
error_reporting(0);
 define ("PAGE_IDENTIFY", "im");
 define ("TITLE_WORDS","Леди Стайл - Обновление коллекции");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Обновление коллекции женской одежды 2013 новый сезон мода одежда от производителя оптом одежда не дорого");
 
?>
<?php
//print_r($_SESSION);
//сделать безопасное получение
$tk=$_POST['optionsRadios'];
$_SESSION['tk']=$tk;
include "_class.informator.php";
$info = new informator();
$info->getCategoryDescription($category);
//Теперь данные категории доступны через свойства класса _class.informator.php :)
?>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>

<div class="row">
    <div class="span2"><?php include "category.php"; ?></div>
    <div class="span10">
     <h1>Подтверждение заказа</h1>
        <br>
        <h2>Ваш заказ</h2>
        <table class="table table-bordered table-stripped">
            <thead>
            <th>№</th>
            <th>Фото</th>
            <th>Номер модели</th>
            <th>Размер</th>
            <th>Кол-во</th>
            <th>Цена за 1 шт</th>
            <th>Итоговая цена</th>
            </thead>
         <?php 
         $inc=0;
         $total_quantity=0;
         foreach ($_SESSION['name'] as $key => $val)
         {
             $inc++;
             echo "<tr>";
             echo "<td>$inc</td>";
             echo "<td><a href='details.php?art=$val'><img height='100px' src='image/80/$val.jpg'></a></td>";
             echo "<td>$val</td>";
             echo "<td>".$_SESSION['size'][$key]."</td>";
             echo "<td>".$_SESSION['quantity'][$key]."</td>";
             $total_quantity=$total_quantity+$_SESSION['quantity'][$key];
             echo "<td>".$_SESSION['price'][$key]."руб.</td>";
             $total_price=$_SESSION['quantity'][$key]*$_SESSION['price'][$key];
             echo "<td>".$total_price."руб.</td>";
             echo "</tr>";
         }
         ?>
         <tr style="background-color: #E1FFDF;">
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td><?php echo "Ед.всего: $total_quantity";?></td>
             <td></td>
             <td>ИТОГО: <?php echo $_SESSION['summ_buy']." руб.";?></td>
             
         </tr>
         </table>        
        
        <!-- <h3>Груз будет доставлен ТК <?php// echo $tk; ?>. </h3> -->
        <!--<h3>Ваш адрес: ************ </h3>
        <h3>Контактный телефон: ************ </h3>-->
        
        <div class="hero-unit" style="background-image: url('success_bg.jpg');">
  <h1>Всё верно</h1>
  <p>Сведения перепроверены и верны</p>
  <p>
    <a class="btn btn-primary btn-large" href="accept.php">
      Подтверждаю заказ!
    </a>
  </p>
</div>
        
        <br><br><br>
    </div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
