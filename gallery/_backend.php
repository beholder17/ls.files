<?php 
 session_start();
 define ("PAGE_IDENTIFY", "gallery");
 define ("TITLE_WORDS","Галерея фотографий леди стайл");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Фото модели фотографии одежды, фото женщин, платье");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted==1 && $check->level==80) {
    ?>




<div class="row">
<div class="span2">
    
<ul class="nav nav-list">
  <li class="nav-header">О КОМПАНИИ</li>
  <li class="active"><a href="#">На главную</a></li>
  <li><a href="#">О компании</a></li>
  <li><a href="#">Наши награды</a></li>
  <li><a href="#">Сфера присутствия</a></li>
  <li><a href="#">Видео</a></li>
</ul>
    
</div>
<div class="span10">
<h1>Панель управления фотогалереей</h1>
<br>

    
    
    
<?php include "_gallery.class.php";?>
<table class="table table-bordered table-stripped">
            <thead>
            <th>Фото</th>
            <th>Имя файла</th>
            <th>описание</th>
            <th>категория</th>
            <th>Дата</th>
            <th>отображать?</th>
            </thead>

    
    <tr>
       <td>
       
       </td>
        <td>фото:
      <?php echo $tmp->photo; ?>
        </td>
        <td>текст: 
        <?php echo $tmp->text; ?>
        </td>
        <td>категория: 
        <?php echo $tmp->category; ?>
        </td>
         <td>дата:
                     <?php echo $tmp->date;?>
        </td>
        <td>show: 
        <?php echo $tmp->show;?>
        </td>
    </tr>
    
   <tr>
        <td>
      <div id="add_image" style="cursor: pointer;">+ Add image</div>
    </td>
        <td>
            <form name="upload" action="upload.php" method="POST" ENCTYPE="multipart/form-data">
                    <input id="filename" type="file" name="userfile"><br>
                    <input  type="submit" name="upload" value="upload">
            </form>
        </td>
        <td>
      
        </td>
        <td>
      
        </td>
         <td>
      
        </td>
        
        <td>
      
        </td>
    </tr>    
</table>
<script>
   $(document).ready(function(){
        $("#add_image").click(function(){
            
            filename=$("#filename").val()
            alert(filename);
            
      
       
   });
   });
</script>
    



    

</div>

</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
