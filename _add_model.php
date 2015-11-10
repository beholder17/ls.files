<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private_admin");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 && $check->level==80) {
    include("api_resize.php");
    ?>




<div class="row">
<div class="span2">
    
<!--<ul class="nav nav-list">
  <li class="nav-header">О КОМПАНИИ</li>
  <li class="active"><a href="#">На главную</a></li>
  <li><a href="#">О компании</a></li>
  <li><a href="#">Наши награды</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'cabinet/_check_images.php';?>"> Проверить фотографии</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'gallery/_backend.php';?>"> Добавить фото в галерею</a></li>
  <li><a href="<?php echo PATH_TO_ROOT.'im/_add_model.php';?>"> + модель</a></li>
</ul>-->
    ~
</div>
<div class="span10">
<h1>Добавляем модель</h1>
      
        
         <form name="upload" action="upload.php" method="POST" ENCTYPE="multipart/form-data">
               <input id="nomermod" type="text" name="nomer_mod" value="1" /><br>
        <div id="result"></div>
         Выберите файл для загрузки: <input type="file" name="userfile">
         <input type="submit" name="upload" value="upload">
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
              
    
<table class="table table-bordered table-stripped">
    <tr>
        <td>
        Категория
        </td>
        <td>
        <?php 
            include "../db_connect.php";
            echo "<select name = \"category\">";
            echo "<option></option>";
            $query = "SELECT * FROM im_category";
            $result = mysql_query($query);
            while ($r = mysql_fetch_array($result)) {
                echo "<option>$r[1]</option>";
            }
            echo "</select>";
           
        ?>
        </td>
    </tr>
    
    <tr>
        <td>
        Имя
        </td>
        <td>
          <input  class="input-xlarge" size="200" type="text" name="name" value="<?php echo $info_art->item_name;?>" />
            <input  class="input-xlarge" type="hidden" name="id" value="<?php echo $id;?>">-->
              
        </td>
    </tr>
    
       <tr>
        <td>
        Описание
        </td>
        <td>
        <textarea name="description" rows="6" cols="35"><?php echo $info_art->item_description; ?></textarea>
        </td>
    </tr>
       <tr>
        <td>
        Цена
        </td>
        <td>
        <input  class="input-xlarge" size="200" type="text" name="price" value="<?php echo $info_art->item_price;?>" />
        </td>
    </tr>
       <tr>
        <td>
        Новая цена (не трогать!)
        </td>
        <td>
        <?php 
            echo $info_art->item_price_new;
        ?>
        </td>
    </tr>
        <tr>
        <td>
        Картинка
        </td>
        <td>
        <?php 
            echo $info_art->item_image;
        ?>
            <img src="image/80/<?php echo $info_art->item_image; ?>" height="50">
<img src="image/<?php echo $info_art->item_image; ?>" height="100">
<img src="image/600/<?php echo $info_art->item_image; ?>" height="150">
        </td>
    </tr>
            <tr>
        <td>
        Дополнительные картинки
        </td>
        <td>
        <?php 

$index_image=1;    
while ($stop==0){
$filename='image/'.$info_art->item_nomer_mod.'_'.$index_image.'.jpg';
//echo $filename;
if (file_exists($filename)) {
echo $info_art->item_nomer_mod."_".$index_image;
echo  "<img src=\"image/80/".$info_art->item_nomer_mod."_".$index_image.".jpg\" height=\"50px\">
<img src=\"image/".$info_art->item_nomer_mod."_".$index_image.".jpg\" height=\"100px\">
    <img src=\"image/600/".$info_art->item_nomer_mod."_".$index_image.".jpg\" height=\"150px\">
";
$index_image++;
//$filename='image/'.$art.'.jpg';
} else {$stop=-1;
        break;}
}
        ?>
        </td>
    </tr>
       <tr>
        <td>
        Отображение (1-да, 0-нет)
        </td>
        <td>
            <input  class="input-xlarge" size="200" type="text" name="show" value="<?php echo $info_art->item_show;?>" />
        </td>
    </tr>
       <tr>
        <td>
        Номер модели
        </td>
        <td>
        
             <input  class="input-xlarge" size="200" type="text" name="nomer_mod" value="<?php echo $info_art->item_nomer_mod;?>" />
        </td>
    </tr>
       <tr>
        <td>
        Состав
        </td>
        <td>
            
       
            <input  class="input-xlarge" size="200" type="text" name="content" value="<?php echo $info_art->item_content;?>" />
                    
                
        </td>
    </tr>
       <tr>
        <td>
        Сезон
        </td>
        <td>
             <input  class="input-xlarge" size="200" type="text" name="season" value="<?php echo $info_art->item_season;?>" />
        </td>
    </tr>
    <tr>
        <td>
        Рост
        </td>
        <td>
               <input class="input-xlarge" size="200" type="text" name="rost" value="<?php echo $info_art->item_rost;?>" />
        </td>
    </tr>
    <tr>
        <td>
        Размеры (Строго через один пробел)
        </td>
        <td>
            <input  class="input-xlarge" size="200" type="text" name="size" value="<?php echo $info_art->item_size;?>" />
        </td>
    </tr>
      <tr>
        <td>
        Капсула (модели строго через один пробел)
        </td>
        <td>
            <input  class="input-xlarge" size="200" type="text" name="such" value="<?php echo $info_art->item_such;?>" />
        </td>
    </tr>
      <tr>
        <td>
        Акция
        </td>
        <td>
               <?php echo $info_art->item_promo;?>
               <input  class="input-xlarge" size="200" type="text" name="promo" value="<?php echo $info_art->item_promo;?>" />
                 <?php
            echo "<select name = \"promo\">";
            echo "<option>Нет</option>";
            $query = "SELECT * FROM promo";
            $result = mysql_query($query);
            while ($r = mysql_fetch_array($result)) {
                echo "<option>$r[1]</option>";
            }
            echo "</select>";
            ?>
        </td>
      
          
            
    </tr>
	   <tr>
        <td>
        Длинна изделия
        </td>
        <td>
            <input  class="input-xlarge" size="200" type="text" name="height" value="" />
        </td>
    </tr>
</table>
            <input type="submit" value="Внести изменения"/>
    
     </form>
<hr>
<h1>Добавить доп.фото</h1>

         <form name="upload2" action="upload2.php" method="POST" ENCTYPE="multipart/form-data">
               
        
         Выберите файл для загрузки: <input type="file" name="userfile">
         <input type="submit" name="upload" value="- ОК -">
         </form>
         
         
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
</div>
    <script>
$(document).ready(function(){
        $("#nomermod").blur(function(){
        $val=$('#nomermod').val();       
        $.ajax({        
        type: "POST",
        url: "_add_model_check.php",
        data: "nomer_mod="+$val,
        success: function(msg){       
           $("#result").html(msg);
        }
        });
                                    }
                        ); 
                                        
}
                            );
                            
    </script>
</div>

<?php
// открывает картинку 1.jpg и сохраняет ее с новыми размерами в 2.jpg
// 150, 200 ширина и высота новой картинки
// 70 качество нового изображения в процентах
// 0xFFFFF0 цвет фона(если рисунок полуится меньше)
// 0 включить/выключить создание размера изображения, строго по размерам, Если включить, тогда размер изображения всегда будет
// таким, как заявлен, а лишнее будет заполняться фоном. Экспериментируйте.
  img_resize("wm/".$str_exp[6], "wm/pw/s".$str_exp[6], 100, 255,  98, 0xFFFFF0, 0);
?>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>

