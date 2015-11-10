<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private_admin");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if (($check->accepted>0 && $check->level==80) OR ($check->accepted>0 && $check->level==50)) {
    $id=$_GET['id'];
    ?>




<div class="row">
<div class="span2">
    
</div>
<div class="span10">
<h1>Управление наименованием</h1>
<h3>id № <?php echo $id; ?></h3>



<?php 
include "_class.informator.php";
$info_art = new informator();
$info_art->getArtDescriptionByID($id);



echo $info_art->item_category."<br>";



?> 
    
    
    
<br>




        <form name="edit" action="_edit_position.php" method="POST">
    
<table class="table table-bordered table-stripped">
    <tr>
        <td>
        Категория
        </td>
        <td>
        <?php 
            echo $info_art->item_category;
        ?>
        </td>
    </tr>
    
    <tr>
        <td>
        Имя
        </td>
        <td>
            <input  class="input-xlarge" size="200" type="text" name="name" value="<?php echo $info_art->item_name;?>" />
            <input  class="input-xlarge" type="hidden" name="id" value="<?php echo $id;?>">
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
        Цена по акции
        </td>
        <td>
			<input  class="input-xlarge" size="200" type="text" name="new_price" value="<?php echo $info_art->item_price_new;?>" />
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
            <input  class="input-xlarge" size="200" type="text" name="such" value="<?php echo $info_art->item_also;?>" />
        </td>
    </tr>
      <tr>
        <td>
        Акция
        </td>
        <td>
               <?php 
			   
			   include "../db_connect.php";
    $query="SELECT * FROM promo WHERE `id`='$info_art->item_promo'";
  //  echo "<br>".$query."<br>";
    $result=mysql_query($query);
	while($r=mysql_fetch_array($result))
                    {
					echo $r[1];
					echo ", Код:".$r[0];
					}
			   
			   
			   ?>
            <!--   <input  class="input-xlarge" size="200" type="text" name="promo" value="<?php echo $info_art->item_promo;?>" />  -->
                 <?php
            echo "<select name = \"promo\">";
            echo "<option>Нет</option>";
            $query = "SELECT * FROM promo WHERE `show`=1";
            $result = mysql_query($query);
            while ($r = mysql_fetch_array($result)) {
                echo "<option"; 
				if ($r[0]==$info_art->item_promo) echo " selected ";
				echo ">$r[1]</option>";
            }
            echo "</select>";
            ?>
        </td>
      
          
            
    </tr>
	 <tr>
        <td>
        Длина изделия
        </td>
        <td>
            <input  class="input-xlarge" size="255" type="text" name="height" value="<?php echo $info_art->item_height;?>" />
        </td>
    </tr>
</table>
            <input type="submit" value="Внести изменения"/>
            
    </form>
    



    

</div>

</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
