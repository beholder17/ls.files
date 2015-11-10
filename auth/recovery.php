<?php 
 session_start();
 define ("PAGE_IDENTIFY", "im");
 define ("TITLE_WORDS","Восстановление пароля");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "");
 define ("DOINDEX", "NO");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>

<div class="row">
    <div class="span2"><?php include "category.php"; ?>
    <?php include "../articles/_bar_category.php"; ?>
    </div>
    <div class="span10">
<h1>Восстановление параметров учетной записи</h1><br>
        
<div class="magenta-strip"></div>

<p>В случае утраты пароля введите адрес электронной почты, указанный при регистрации. Также необходимо указать Ваш <u>новый пароль</u>.</p>
<p>Логин и новый пароль будут отправлены на электронную почту.</p>

<form class="form-horizontal" action="recovery_do.php" method="post">
   <div class="control-group">
    <label class="control-label" for="inputEmail">Ваша электронка</label>
    <div class="controls">
      <input type="text" id="inputemail" name="email" placeholder="E-mail" value="">
      <span id="span_email" class="label" hidden></span>
    </div>
  </div>
          <div class="control-group">
    <label class="control-label" for="inputpw">Новый пароль</label>
    <div class="controls">
      <input type="password" id="inputpw" name="pw" placeholder="Не менее 6 символов">
      <span id="span_pw" class="label" hidden></span>
      <p><small>* Пароль не короче шести знаков. <br>Может состоять из больших или малых букв, а также цифр.</small></p>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputpw2">Пароль еще раз</label>
    <div class="controls">
      <input type="password" id="inputpw2" placeholder="Повторите пароль">
      <span id="span_pw2" class="label" hidden></span>
    </div>
  </div>
       <div class="control-group">
    <label class="control-label" for="inputcaptcha">Введите цифры с картинки</label>
    <div class="controls">
      <input type="text" id="inputcaptcha" name="captcha" placeholder="Введите цифры с картинки">
        <?php require '../captcha/captcha.php';?>
      <span id="span_inputcaptcha" class="label" hidden></span>
    </div>
  </div>
     <div class="control-group">
    <div class="controls">
     
      <button id="reg_button" type="submit" disabled class="btn">ОК</button>
    </div>
  </div>
</form>
<script src="<?php echo PATH_TO_ROOT; ?>js/zurb.js"></script>
<script>
    $(document).ready(function(){
       $('#inputcaptcha').bind('textchange', function (event, previousText) {
      //alert('Achtung');
      var $captcha = <?php echo $_SESSION[keystring]; ?>;
      var $getcaptcha = $('#inputcaptcha').val();
      //alert($captcha);
      if ($captcha==$getcaptcha) {good('span_inputcaptcha');
} else {bad('span_inputcaptcha');
button_deactivator();
}
        //                            });
       });
  });  
    
    
  $(document).ready(function(){
        
      
        //почта
        $("#inputemail").bind('textchange', function (event, previousText) {
        email=$(this).attr('value');
        //var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
		var pattern = /^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/i;
        if ($(this).attr('value').search(pattern)==0)
        {
        //good('span_email');
        $.ajax({
        type: "GET",
        async: true,
        cache: false,
        timeout: 2000,
        data: 'email='+email,
        url: "<?php echo DIRECT_NAME;?>/auth/emailfree.php",
        success: function(msg){
            
        //alert(msg);
        if (msg=='busy') busy('span_email');
		if (msg=='free') free('span_email');
		if (msg=='more') more('span_email');
		button_activator();
        }  
        });
        } else {
          bad('span_email');
          button_deactivator();
        }
                                    }
                        ); 
        
 
        //пароль
        $("#inputpw").bind('textchange', function (event, previousText) {
        pw=$(this).attr('value');
        //alert(email);
        var pattern = /^[a-z0-9 _/$/#+\-]{6,50}$/i;
        if ($(this).attr('value').search(pattern)==0)
        {
          good('span_pw');
        } else {
          bad('span_pw');
          button_deactivator();
        }
                                    }
                        ); 

        $("#inputpw2").bind('textchange', function (event, previousText) {
        pw2=$(this).attr('value');
        pw=$("#inputpw").attr('value');
        if (pw==pw2)
        {
            good('span_pw2');
            button_activator();
        } else {
         bad ('span_pw2');
         button_deactivator();
        }
                                    }
                        );  
                            
                            
                         
                            
                                        }
                            );
                            
        //в аргyмент передается айди спана-индикатора
        function good(arg){
            $('#'+arg).html('Ок');
            $('#'+arg).removeClass('label-important');
            $('#'+arg).addClass('label-success');      
            $('#'+arg).removeAttr('hidden');
            button_activator();
        }
        function bad(arg){
            $('#'+arg).html('Ошибка');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-success');
           $('#'+arg).addClass('label-important');      
           $('#'+arg).removeAttr('hidden');
        }
        function busy(arg){
            $('#'+arg).html('ОK');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-important');
           $('#'+arg).addClass('label-success');      
           $('#'+arg).removeAttr('hidden');
		   button_activator();
        }
		 function free(arg){
            $('#'+arg).html('Нет учетных записей с такой почтой');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-success');
           $('#'+arg).addClass('label-important');      
           $('#'+arg).removeAttr('hidden');
        }
		 function more(arg){
            $('#'+arg).html('В базе более одного аккаунта с указанной почтой. Свяжитесь с отделом продаж для уточнения активного аккаунта');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-success');
           $('#'+arg).addClass('label-important');      
           $('#'+arg).removeAttr('hidden');
        }
		
      
        function button_activator(){
            if (($('#span_email').hasClass('label-success')) && ($('#span_pw').hasClass('label-success'))  && ($('#span_pw2').hasClass('label-success')) && ($('#span_inputcaptcha').hasClass('label-success'))) { $('#reg_button').removeAttr('disabled'); }
            
            
        }
          function button_deactivator(){
            $('#reg_button').attr('disabled','true')
            
            
        }
        function captcha_false(arg){
            $('#'+arg).html('Не верно введены цифры с картинки');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-success');
           $('#'+arg).addClass('label-important');      
           $('#'+arg).removeAttr('hidden');
        }
        function captcha_true(arg){
            $('#'+arg).html('Цифры введены верно');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-important');
           $('#'+arg).addClass('label-success');      
           $('#'+arg).removeAttr('hidden');
		   button_activator();
        }
                            
</script>



</div>
    
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
