<?php
error_reporting(0);
session_start();
?>
    <h5><a id="cartopen" href="#myModal" role="button" class="b54tn" data-toggle="modal">
            <div style="float: left; position: relative; left: -10px; top: -5px; margin-bottom: -8px;"><img src="http://www.ladystyle.su/im/shoppingcart.jpg" width="40" height="40"/></div>
            <?php 
           // session_start();
            if ($_SESSION['count_buy']<1) {echo "Ваша корзина пуста, но нам есть что предложить";} else {
            echo "<div id=\"cart\" style=\"float: left;\">
                <div style=\"float: left;\">Товаров:&nbsp;</div>
                <div id=\"items\" style=\"float: left;\">".$_SESSION['count_buy']."</div></br>
                <div id=\"summ\" style=\"float: left;\">".$_SESSION['summ_buy']."</div>  <div style=\"float: left;\">&nbsp;руб.</div>
            </div>";}
            ?>
        </a></h5>
<script>
    $.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
    });
    
$(document).ready(function(){
    
        $("#cartopen").click(function(){
        $('.modal-body').load('http://www.ladystyle.su/im/cartcontent.php'); 
        $('.modal-footer').load('http://www.ladystyle.su/im/footercartfill.php'); 
                                    }
                        ); 
                                        }
                            );    
</script> 