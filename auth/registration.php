<?php 
 session_start();
// define ("PAGE_IDENTIFY", "opt");
 define ("TITLE_WORDS","Lady Style - Регистрация на сайте");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
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
 
<h1>Регистрация</h1>
<br><br>

<form class="form-horizontal" action="registration_check.php" method="post">
    <div class="control-group">
    <label class="control-label" for="inputli">Ваш Логин</label>
    <div class="controls">
      <input type="text" id="inputli" name="li" placeholder="Логин">
      <span id="spaninputli" class="label" hidden></span>
      <p><small>* Логин не короче 3х знаков. Может состоять из больших или малых букв, а также цифр.</small></p>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputName">Ваше имя</label>
    <div class="controls">
      <input type="text" id="inputName" name="name" placeholder="Имя">
      <span id="spaninputName" class="label" hidden></span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="inputfamil">Ваша фамилия</label>
    <div class="controls">
      <input type="text" id="inputfamil" name="famil" placeholder="Фамилия">
      <span id="spaninputfamil" class="label" hidden></span>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" for="inputEmail">Ваша электронка</label>
    <div class="controls">
      <input type="text" id="inputemail" name="email" placeholder="E-mail" value="">
      <span id="span_email" class="label" hidden></span>
    </div>
  </div>
       <div class="control-group">
    <label class="control-label" for="inputpw">Пароль</label>
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
     
      <button id="reg_button" type="submit" class="btn disabled">Зарегистрироваться</button>
    </div>
  </div>
</form>
</div>
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>

<script>
  $(document).ready(function(){
        //Логин
        $("#inputli").blur(function(){
        yourli=$(this).attr('value');
        var pattern = /^[а-яa-z0-9]{3,35}$/i;
        if ($('#inputli').attr('value').search(pattern)==0)
        {
            good('spaninputli');
            $.ajax({
        type: "GET",
        async: true,
        cache: false,
        timeout: 2000,
        data: 'li='+yourli,
        url: "<?php echo DIRECT_NAME;?>/auth/loginfree.php",
        success: function(msg){
        if (msg=='busy') busylogin('spaninputli');
        }  
        });
        } else {
           bad('spaninputli');
        }
                                    }
                        );
      
        //почта
        $("#inputemail").blur(function(){
        email=$(this).attr('value');
        var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
        if ($(this).attr('value').search(pattern)==0)
        {
        good('span_email');
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
        }  
        });
        } else {
          bad('span_email');
        }
                                    }
                        ); 
        //Имя                    
        $("#inputName").blur(function(){
        yourname=$(this).attr('value');
        var pattern = /^[а-яa-z]{2,35}$/i;
        if ($('#inputName').attr('value').search(pattern)==0)
        {
            good('spaninputName');
        } 
            else 
        {
           bad('spaninputName')
        }
                                    }
                        );   
      
        //Фамилия
        $("#inputfamil").blur(function(){
        yourfamil=$(this).attr('value');
        var pattern = /^[а-яa-z]{2,35}$/i;
        if ($('#inputfamil').attr('value').search(pattern)==0)
        {
            good('spaninputfamil');
        } else {
           bad('spaninputfamil');
        }
                                    }
                        );
 
        //пароль
        $("#inputpw").blur(function(){
        pw=$(this).attr('value');
        //alert(email);
        var pattern = /^[a-z0-9_/$/#+]{6,50}$/i;
        if ($(this).attr('value').search(pattern)==0)
        {
          good('span_pw');
        } else {
          bad('span_pw');
        }
                                    }
                        ); 

        $("#inputpw2").blur(function(){
        pw2=$(this).attr('value');
        pw=$("#inputpw").attr('value');
        if (pw==pw2)
        {
            good('span_pw2');
            button_activator();
        } else {
         bad ('span_pw2');
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
            $('#'+arg).html('Этот е-мэйл уже занят :(');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-success');
           $('#'+arg).addClass('label-important');      
           $('#'+arg).removeAttr('hidden');
        }
        function busylogin(arg){
            $('#'+arg).html('Этот логин уже занят. Выберите другой.');
           $('#'+arg).removeAttr('hidden');
           $('#'+arg).removeClass('label-success');
           $('#'+arg).addClass('label-important');      
           $('#'+arg).removeAttr('hidden');
        }
        function button_activator(){
            if (($('#spaninputli').hasClass('label-success')) && ($('#spaninputName').hasClass('label-success')) && ($('#spaninputfamil').hasClass('label-success')) && ($('#span_email').hasClass('label-success')) && ($('#span_pw').hasClass('label-success'))  && ($('#span_pw2').hasClass('label-success'))) { $('#reg_button').removeClass('disabled'); }
            
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
        }
                            
</script>


