<?php 
 session_start();
 define ("PAGE_IDENTIFY", "shops");
 define ("TITLE_WORDS","Фирменные магазины Lady Style - продажа женской одежды, сумок и аксессуаров");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки сумки аксессуары");
?>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>




<div class="row">
<div class="span2">
    
    

    
    
    
    
    
    
    
<?php include "../sidebar.php"; ?>
    
</div>
<div class="span10">
    <?php
include_once 'breadcrumb.php';
?>
    <h1>Ростов-на-Дону</h1>
    <br>
<p>Приглашаем посетить фирменный магазин Lady Style!</p>
    <ul>
        <li><p>Буденновский, 51 (возле 'Астор Плаза')</p></li>
        <li><p>Пн-Сб: 9.30 - 20.30 </p></li>
        <li><p>Вс: 10.00 - 19.00 </p></li>
        
    </ul>
<img class="thumbnail" style="float: left" src="images/rnd-s.jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>
<img class="thumbnail" style="float: left" src="images/rnd-s (1).jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>
<img class="thumbnail" style="float: left" src="images/rnd-s (2).jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>
<img class="thumbnail" style="float: left" src="images/rnd-s (3).jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>
<img class="thumbnail" style="float: left" src="images/rnd-s (4).jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>
<img class="thumbnail" style="float: left" src="images/rnd-s (5).jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>
<img class="thumbnail" style="float: left" src="images/rnd-s (6).jpg" alt="Магазин Lady Style в г.Ростов-на-Дону"/>


  
</div>
<br><br>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
