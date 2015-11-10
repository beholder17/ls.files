<?php
define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
if (!include "db_connect.php") include "../db_connect.php";;


$query = "SELECT * FROM `articles_category` ORDER BY `name`";
echo "<div class='side_menu'>";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            {
         echo "<a href='".PATH_TO_ROOT."articles/by_category/$r[3]'><div class='category' style='position: relative'>$r[1]</div></a>";
            }
//echo "<a href='".PATH_TO_ROOT."im/novelty.php'><div class='category' style='position: relative'>Новинки</div></a>";
echo "<a href='".PATH_TO_ROOT."articles/uslovia-sotrudnichestva'><div class='category' style='position: relative'>Условия сотрудничества</div></a>";
echo "<a href='".PATH_TO_ROOT."gallery/diploms'><div class='category' style='position: relative'>Дипломы и награды</div></a>";
echo "<a href='".PATH_TO_ROOT."opinion/'><div class='category' style='position: relative'>Отзывы</div></a>";
?>
</div>

<script>
    $(document).ready(function(){
    $(".category").mouseover(function(){
        $(this).animate({opacity: "0.9", left: "+=5"},100, function(){
            $(this).css({left: "-5"})
            $(this).css({color: "#EC008C"})
        })
    }); 
      $(".category").mouseout(function(){
        $(this).animate({opacity: "1", left: "-=5"},150, function(){
            $(this).css({left: "+5"})
            $(this).css({color: "black"})
        });
    }); 
});

</script>                  


