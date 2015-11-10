<?php 
 session_start();
 define ("PAGE_IDENTIFY", "opinion");
 define ("TITLE_WORDS","Отзывы о продукции компании ООО Леди Стайл, торговая марка Lady Style");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "отзывы, женская одежда, одзывы о леди стайл, отзывы о lady style, реальные отзывы об одежде");
 define ("DESCRIPTION", "Отзывы о женской одежде торговой марки Lady Style от производителя ООО \"Леди Стайл\"");
 
?>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>




<div class="row">
<div class="span2">
    
    

<script src="<?php echo PATH_TO_ROOT; ?>js/zurb.js"></script>
<?php include "../articles/_bar_category.php"; ?>
    
</div>
<div class="span8">
  <h1>Отзывы клиентов о Lady Style</h1><br>
  
  
  
  
  
  
  
      
  <h3>Не хватает только вашего :) </h3><br>
  <!--          <div class="row"></div>-->
  <form method="post" action="write_opinion.php">
      
      <div class="row">
          <div class="span1">
              Ваше имя
          </div>
          <div class="span3">
              <input type="text" name="author" value="" size="300" />
          </div>
      </div>
          
          
      <div class="row">
          <div class="span1" >
              Отзыв
          </div>
          <div class="span3">
              <textarea  name="edit"></textarea>
          </div>
      </div> 
      <p></p>
          
      <div class="control-group">
          <label class="control-label" for="inputcaptcha">Введите цифры с картинки</label>
          <div class="controls">
              <input type="text" id="inputcaptcha" name="captcha" placeholder="Введите цифры с картинки">
              <?php require '../captcha/captcha.php'; ?>
          </div>
      </div>
          
      <input id="btnsend" disabled class="btn" type="submit" name="save" value="Отправить отзыв" />
          
  </form> 



<script>
  $(document).ready(function(){
       $('#inputcaptcha').bind('textchange', function (event, previousText) {
      //alert('Achtung');
      var $captcha = <?php echo $_SESSION[keystring]; ?>;
      var $getcaptcha = $('#inputcaptcha').val();
      //alert($getcaptcha);
      if ($captcha==$getcaptcha) {$('#btnsend').removeAttr('disabled');
} else {$('#btnsend').attr('disabled','true')}
        //                            });
       });
  });
</script>
  
  
  
  
  
  
  
  
  
  
  
  
  <?php 
  
  error_reporting(0);
//define ("PATH_TO_ROOT", "http://127.0.0.1/ls2013/");
        if (!include '../db_connect.php') include 'db_connect.php';
        $query = "SELECT * FROM opinion WHERE `show`=1 ORDER BY `date` DESC;";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            echo "<div class=\"articles-show-radius\"><h5>".$r[1]." - ".$r[2]."</h5>";
            echo "<p> ".$r[3];
            echo "</p>";
            echo "</div>";
            }    
  
  ?>
    
    
    
    
    
    
    
    
    
    
</div>
<div class="span2">
    
    

    
<?php// include "../articles/_bar_category.php"; ?>
    ~
</div>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
