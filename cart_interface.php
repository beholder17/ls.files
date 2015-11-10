<div id="cartmain" class="shadow" style="z-index: 99; border-radius: 3px; position: fixed; background-color: white; right: -3px; width: 110px;">
    <h5><a id="cartopen" href="#myModal" role="button" class="b54tn" data-toggle="modal">
            <div style="float: left; position: relative; left: -10px; top: -5px; margin-bottom: -8px;"><img src="http://www.ladystyle.su/im/shoppingcart.jpg" width="40" height="40"/></div>
            <?php 
            if ($_SESSION['count_buy']<1) {echo "Ваша корзина пуста, но нам есть что предложить";} else {
            echo "<div id=\"cart\" style=\"float: left;\">
                <div style=\"float: left;\">Товаров:&nbsp;</div>
                <div id=\"items\" style=\"float: left;\">".count($_SESSION['name'])."</div></br>
                <div id=\"summ\" style=\"float: left;\">".$_SESSION['summ_buy']."</div>  <div style=\"float: left;\">&nbsp;руб.</div>
            </div>";}
            ?>
        </a></h5>
</div>
<!--<a href="#myModal" role="button" class="btn" data-toggle="modal">Вход / Регистрация</a>-->
<script>
    $.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false,
    //scriptCharset: 'utf-8'
   // async: false
    
    });
    
$(document).ready(function(){
    
        $("#cartopen").click(function(){     
           $('#modal-body_helping_id').load('http://www.ladystyle.su/im/cartcontent.php'); 
             $('#modal-footer_helping_id').load('http://www.ladystyle.su/im/footercartfill.php'); 
                                    }
                        ); 
                                        }
                            );    
                            
                            
                            
               
                               
</script> 


<div id="cartbody">
<div class="modal hide fade out" style="position: rela4tive; left: 700px; width: 800px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3 id="myModalLabel">Корзина</h3>
  </div>
  <div class="modal-body" id="modal-body_helping_id">
      <img src="ajax-loader.gif"/>
  </div>
  <div class="modal-footer" id="modal-footer_helping_id">
      <div style="float: left;">В корзине всего <div id="cartitems" style="display: inline; text-decoration: underline;"> <?php echo $_SESSION['count_buy'];?></div> наименований, на сумму: </div><div id="cartsumm" style="float: left; text-decoration: underline;"><?php echo " ".$_SESSION['summ_buy']." ";?></div><div id="cartsumm" style="float: left;"> руб.</div>
      <a href="http://www.ladystyle.su/im/unset_session.php">Сброс сессии</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Продолжить покупки</button>
    <button class="btn btn-primary">Оформить заказ</button>
  </div>
</div>
</div>
        