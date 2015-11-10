<button id="button_to_buy" class='btn btn-large disabled' type='button'>Купить (Выберите размер) <i class='icon-shopping-cart'></i>
         <div id="current-price" style="display: none;"><?php echo $info_art->item_price; ?></div>
         
</button>
<div id="clicked-size" style="display: none;"></div>        
        <br/><br/>


<script>
          $(document).ready(function(){
        $("#button_to_buy").click(function(){
            
       
        if (!($("#button_to_buy").hasClass('disabled') )) {
        //var attrib=$(this).parent("div").attr("id");
        var attrib=$(this).attr("id");
    //    alert (attrib);
        
        //moveit(attrib); 
        //moveit('bemoved'); 
        
        //получаем размер для покупки
        var size=$('#clicked-size').html();
      //  var summ=$('#'+attrib+' #current-price').text();
      //  alert(summ);
        //$('#formove').css('display','inline');
        $('#button_to_buy').addClass('disabled');
        $('#button_to_buy').html('В корзине');
        disablesizebutton(size);
        
      
        $.ajax({
        type: "GET",
        async: false,
        scriptCharset: 'utf-8',
        url: "http://www.ladystyle.su/im/carthandler.php",
        data: "id="+"<?php echo $info_art->item_nomer_mod; ?>"+"&size="+size+"&summbuy="+"<?php 
        if (($info_art->item_price_new>0) && ($info_art->item_promo>0)&& ($promo_active=='1')) {echo $info_art->item_price_new;} else echo $info_art->item_price; 
        ?>",
        success: function(msg1){
         //alert( "Data Saved: " + msg1 );
        }
               
        });
        bubu(attrib);
        
        
        
        

        };
                                    }
                        ); 
                                        }
                            );


function disablesizebutton(sizenum){
$('#'+sizenum).addClass("disabled");
}

   function bubu(number){
   // alert ('number'+number);
    var priceelem = $('#'+number+' #current-price').text();
    //получаем сумму из корзины
  //  alert ('цена: '+priceelem);
  
    var korzinaprice = $('#cart #summ').text();  
   //  alert(korzinaprice);
   // $('#cartmain').load('maincartfill.php'); 
   $.ajax({
        type: "GET",
        async: true,
        cache: false,
        timeout: 2000,
        url: "http://www.ladystyle.su/im/maincartfill.php",
        success: function(msg){
            
        //alert(msg);
        $('#cartmain').html(msg); 
        }
               
        });
   
   
   
   
   
   
   
   
   
   
    //если сообщение "пусто корзины" не было заменено то сейчас отличный момент это сделать :) (н)
//    if (!korzinaprice) {
//          $('#cartmain').load('maincartfill.php'); 
//    }
    
    korzinaprice = (+korzinaprice) + (+priceelem);
    //$('#cart #summ').html(korzinaprice);
    //рихтуем кол-во товаров в корзине
    var korzinakolvo = $('#cart #items').text();  
    korzinakolvo = (+korzinakolvo) + 1;
    //$('#cart #items').html(korzinakolvo);
    
    }    

function moveit(number){
    var сe = $("#cart");
    var left_offset_position = сe.offset().left; //это координата left
    var top_offset_position = сe.offset().top; //это координата top
        $("#"+number)
        .animate({opacity: "1", top: top_offset_position, height: "100", width: "100"},{queue:false} ,  "fast")
        .animate({opacity: "0.0", left: left_offset_position, height: "50", width: "50"},{queue:false} , "fast")
        
       // return false;
       
}
                         
</script>



<?php
//кнопки размеров
//
        //количество покупок
        $firstable_buy_limits=$_SESSION['firstable_buy_limits'];
        //проверка: есть ли в корзине модель, на странице которой мы сейчас находимся?
        $p=0;
        for ($o = 1; $o< $firstable_buy_limits+1; $o++)
        {
            if ($_SESSION['name'][$o]==$art)
            {
             //   echo "<h1>Такая есть в корзине!!!</h1>";
                $enabled_sizes[$p]=$_SESSION['size'][$o]; //размеры, которые куплены (массив)
                $p++;
            }
        }
        
        error_reporting(0);
        
        foreach ($enabled_sizes as $value) {
          //  echo $value."<br>hgjghjghj";        
            echo "<script>
$(document).ready(function(){
   $('#'+$value).addClass(\"disabled\");     
                                        }
                            );
                </script>";
            }



$sizes=explode(" ", $info_art->item_size);

echo "<div class=\"btn-group\" data-toggle=\"buttons-radio\">";


  for($i = 0; $i < count($sizes); $i++) 
  {  
     
     echo "<button id=\"$sizes[$i]\" type=\"button\" class=\"btn\" value=\"$sizes[$i]\">$sizes[$i]</button>";
     echo "<script>
         
    $(document).ready(function(){
        $(\"#".$sizes[$i]."\").click(function(){
      if (($(\"#".$sizes[$i]."\").hasClass('disabled') )) {
          alert('Этот размер уже заказан!');
      } else {
      var sizebutton=$(this).attr(\"value\");
   //  alert ('3');
      $('#button_to_buy').html(\"Купить <i class='icon-shopping-cart'></i><div id='current-price' style='display: none;'>".$info_art->item_price."</div>\");
      $('#clicked-size').html(sizebutton);      
      $('#button_to_buy').removeClass(\"disabled\");
   
      }
                                    }
                        ); 
                                        }
                            );                 
</script>";
     
  }  

  
  
  
echo "</div>";
echo "<br>";
?>