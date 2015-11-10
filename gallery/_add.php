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

    
    
    
<?php 
$pic=$_GET['new_pic'];
echo "<img src='images/small/".$pic."'";
        
include "../db_connect.php";
//пишем фотку в БД

?>
<form class="form-horizontal" name="context" action="e" method="POST">
      <div class="control-group">
    <label class="control-label" for="inputEmail">Описание фотографии</label>
    <div class="controls">
              <textarea id="text" name="context" rows="4" cols="30"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Выберите категорию</label>
    <div class="controls">
        <?php 
        echo "<select id=\"alias\" name=\"alias\">";
        $query="SELECT * FROM gallery_category";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
                echo "<option>$r[4]</option>";
            }    
echo "</select>";
$date=date("Y-m-d");        
?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Отображать?</label>
    <div class="controls">
      <input id="show" type="checkbox" name="Show" checked="checked" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
<!--      <button id="rec_to_db" type="submit" class="btn">ОК</button>-->
      <a id="record" class="btn">Записать</a>
    </div>
  </div>
</form>
<div id="result"></div>
    
<a class="btn" href="_backend.php">Добавить следующее фото</a>
</div>

</div>

<script>
$(document).ready(function(){
        $("#record").click(function(){
            
        text=$('#text').val();
        alias=$('#alias').val();
        show=$("#show").prop("checked");
     $.ajax({
        type: "POST",
        async: true,
        cache: false,
//        timeout: 2000,
        url: "_rec.php",
        data: "img=<?php echo $pic;?>&text="+text+"&alias="+alias+"&date=<?php echo $date;?>&show="+show,
        success: function(msg){
            
        alert('записано'+msg);
        $('#result').html(msg); 
        }
               
        });
                                    }
                        ); 
                                        }
                            );    
</script>


<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
