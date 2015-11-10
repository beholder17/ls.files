<?php 
 session_start();
// define ("PAGE_IDENTIFY", "opt");
 define ("TITLE_WORDS","Регистрация оптового покупателя на сайте Lady Style");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
 define ("DESCRIPTION", "Регистрация для оптовых покупателей женской одежды торговой марки Lady Style напрямую у производителя. Сотрудничество возможно как с юридическими так и с физическими лицами. Опт от 10000 рублей");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>


<div class="row">
<div class="span2">
    
    

    
    
    
    
    
    
&nbsp;
    
</div>
<div class="span10">
 
<h1>Анкета оптового покупателя</h1>
<br>
<br>
<div class="alert alert-error">
При заполнении анкеты Вы даете согласие на проверку своих персональных данных. <br>Передача Ваших данных третьим лицам исключена!
</div>
<br>
<div class="alert alert-success">
Активация вашей учетной записи производится вручную, следовательно этот процесс займет некоторое время. (около 10 минут, иногда чуть более) <br>Указывайте свой контактный телефон для связи с нашим отделом продаж. <br> Кроме того, на указанный номер придет СМС-оповещение об активации учетной записи.<br> Только с этого момента для вас будут доступны оптовые цены и корзина заказа.
</div>
<br>
<br>



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
    <label class="control-label" for="inputName">Ваше ФИО</label>
    <div class="controls">
      <input type="text" id="inputName" name="name" placeholder="Имя">
      <span id="spaninputName" class="label" hidden></span>
    </div>
  </div>
    <!--<div class="control-group">
    <label class="control-label" for="inputfamil">Ваша фамилия</label>
    <div class="controls">
      <input type="text" id="inputfamil" name="famil" placeholder="Фамилия">
      <span id="spaninputfamil" class="label" hidden></span>
    </div>
  </div>-->
    
    <!--
    <div class="control-group">
    <label class="control-label" for="inputotch">Ваше отчество</label>
    <div class="controls">
      <input type="text" id="inputotch" name="otch" placeholder="Отчество">
      <span id="spaninputotch" class="label" hidden></span>
    </div>
  </div>-->
  
   <div class="control-group">
    <label class="control-label" for="inputcity">Ваш город</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="inputaddress" name="address" placeholder="Адрес">
      <span id="spaninputaddress" class="label" hidden></span>
      <p><small>* Например: г. Самара, Самарская область</small></p>
    </div>
  </div>
  <!--
         <div class="control-group">
    <label class="control-label" for="inputinn">ИНН</label>
    <div class="controls">
      <input type="text" id="inputinn" name="inn" placeholder="12 цифр номера ИНН">
      <span id="spaninputinn" class="label" hidden></span>
    </div>
  </div>
  -->
  <!--
  <div class="control-group">
    <label class="control-label" for="inputogrn">ОГРН</label>
    <div class="controls">
      <input type="text" id="inputogrn" name="ogrn" placeholder="Необязательное поле">
      <span id="spaninputogrn" class="label" hidden></span>
    </div>
  </div>
  -->
  <div class="control-group">
    <label class="control-label" for="inputtel">Контактный телефон</label>
    <div class="controls">
      <input type="text" id="inputtel" name="tel" placeholder="Телефон">
      <span id="spaninputtel" class="label" hidden></span>
    </div>
	<p><small>* Телефон для связи с вами</small></p>
  </div>  
    
    
    <div class="control-group">
    <label class="control-label" for="inputEmail">Электроная почта</label>
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
     
      <button id="reg_button" type="submit" disabled class="btn">Зарегистрироваться</button>
    </div>
  </div>
</form>
</div>
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>

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
        //Логин
        $("#inputli").bind('textchange', function (event, previousText) {
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
           button_deactivator();
        }
                                    }
                        );
      
        //почта
        $("#inputemail").bind('textchange', function (event, previousText) {
        email=$(this).attr('value');
        //var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
		var pattern = /^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/i;
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
          button_deactivator();
        }
                                    }
                        ); 
        //Имя                    
        $("#inputName").bind('textchange', function (event, previousText) {
        yourname=$(this).attr('value');
        //var pattern = /^[а-яa-z]{2,35}$/i;
		//регулярное выражение для ФИО
		var pattern = /^[ -а-яa-z]{2,100}$/i;
        if ($('#inputName').attr('value').search(pattern)==0)
        {
            good('spaninputName');
        } 
            else 
        {
           bad('spaninputName');
           button_deactivator();
        }
                                    }
                        );   
      
        //Фамилия
        $("#inputfamil").bind('textchange', function (event, previousText) {
        yourfamil=$(this).attr('value');
        var pattern = /^[а-яa-z]{2,35}$/i;
        if ($('#inputfamil').attr('value').search(pattern)==0)
        {
            good('spaninputfamil');
        } else {
           bad('spaninputfamil');
           button_deactivator();
        }
                                    }
                        );

        //Отчество
        $("#inputotch").bind('textchange', function (event, previousText) {
        yourfamil=$(this).attr('value');
        var pattern = /^[а-яa-z]{2,35}$/i;
        if ($('#inputotch').attr('value').search(pattern)==0)
        {
            good('spaninputotch');
        } else {
           bad('spaninputotch');
           button_deactivator();
        }
                                    }
                        );
                            
                            
        //Адрес
        $("#inputaddress").bind('textchange', function (event, previousText) {
        yourfamil=$(this).attr('value');
        var pattern = /^[0-9 a-zа-я,.;-№\-]{3,200}$/i;
        if ($('#inputaddress').attr('value').search(pattern)==0)
        {
            good('spaninputaddress');
        } else {
           bad('spaninputaddress');
           button_deactivator();
        }
                                    }
                        );


        //ИНН
        $("#inputinn").bind('textchange', function (event, previousText) {
        yourfamil=$(this).attr('value');
        var pattern = /^[0-9]{8,12}$/i;
        if ($('#inputinn').attr('value').search(pattern)==0)
        {
            good('spaninputinn');
        } else {
           bad('spaninputinn');
           button_deactivator();
        }
                                    }
                        );
        //ОГРН
        $("#inputogrn").bind('textchange', function (event, previousText) {
        yourfamil=$(this).attr('value');
        var pattern = /^[0-9]{5,45}$/i;
        if ($('#inputogrn').attr('value').search(pattern)==0)
        {
            good('spaninputogrn');
        } else {
           bad('spaninputogrn');
          // button_deactivator();
        }
                                    }
                        );                              

        //Телефон
        $("#inputtel").bind('textchange', function (event, previousText) {
        email=$(this).attr('value');
        var pattern = /^[0-9() \-+/]{11,20}$/i;
        if ($(this).attr('value').search(pattern)==0)
        {
        good('spaninputtel');
        } else {
          bad('spaninputtel');
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
            $('#'+arg).html('&nbsp');
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
            if (($('#spaninputaddress').hasClass('label-success')) && ($('#spaninputli').hasClass('label-success')) && ($('#spaninputName').hasClass('label-success')) && ($('#span_email').hasClass('label-success')) && ($('#span_pw').hasClass('label-success'))  && ($('#span_pw2').hasClass('label-success')) && ($('#spaninputtel').hasClass('label-success')) && ($('#span_inputcaptcha').hasClass('label-success'))) { $('#reg_button').removeAttr('disabled'); }
            
            
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
        }
                            
</script>
<script>

</script>

