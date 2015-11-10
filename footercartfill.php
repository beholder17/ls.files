<?php
error_reporting(0);
session_start();

?>

<div style="float: left;">В корзине всего <div id="cartitems" style="display: inline; text-decoration: underline;"> <?php echo array_sum($_SESSION['quantity']);?></div> шт., на сумму: </div><div id="cartsumm" style="float: left; text-decoration: underline;"><?php echo " ".$_SESSION['summ_buy']." ";?></div><div id="cartsumm" style="float: left;"> руб.</div>
    
    <button class="btn" data-dismiss="modal" aria-hidden="true">Продолжить покупки</button>
    
    <a href="http://www.ladystyle.su/im/verify.php" class="btn btn-primary">Перейти к оформлению</a>