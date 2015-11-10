<?php
/*
Available variables:

	$bag_id
	$bag_title
	$bag_price
	$bag_img
	$bag_art
	$bag_show
	$bag_description
	
	*/
?>
<h1>Женская сумка, артикул <?php echo $bag_art; ?></h1>

<div>
	<div class='bag_big_img'>
	<a class="group1" href="img/big/<?php echo $bag_art;?>.jpg">
		<img src = 'img/<?php echo $bag_img; ?>'>
	</a>
	</div>
	<div class='bag_details_description'>
	
	<?php
	if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50) OR ($check->accepted==1 && $check->level==80)) {?>
	<div class='bag_price'>Цена: <? echo $bag_price; ?> руб.</div>
	<?php
	}
	?>
	
<!--Кнопка класс от одноклассников - начало-->
<script type="text/javascript" src="//yandex.st/share/share.js"
charset="utf-8"></script>
<div class="yashare-auto-init pull-right" data-yashareL10n="ru"
 data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,lj"></div> 

<!--Кнопка класс от одноклассников - конец-->

<table class="table">
	<tr>
        <td>Состав</td>
        <td>Искусственная кожа</td>
    </tr>
	<tr>
        <td>Страна-производитель</td>
        <td>Белоруссия</td>
    </tr>

     
        

        
    
    <tr>
        <td>Сертификация</td>
        <td><img alt="ТС" src="http://www.ladystyle.su/im/eac.jpg" title="Знак качества таможенного союза">
<img alt="Знак соответсивя российскому стандарту" src="http://www.ladystyle.su/im/rst.jpg" title="Знак соответсивя российскому стандарту">
        <a href="http://www.ladystyle.su/gallery/certificate.php">Обзор сертификатов</a>
        </td>
    </tr>
</table>
	
	
	</div>
</div>
<div style='clear: both; margin-bottom: 50px;'></div>
<script>
			$(document).ready(function(){
				// Make ColorBox responsive
				jQuery.colorbox.settings.maxWidth  = '98%';
				jQuery.colorbox.settings.maxHeight = '98%';
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1',scrolling:'true',retinaImage:'true',reposition:"true",scalePhotos:"true"});
			})
</script>
<style>
.bag_big_img{
	width: auto;
	height: auto;
	background-color: magenta;
	display: inline-block;
	float: left;
}

.bag_details_description{
	
	
	display: inline-block;
	width: 550px;
	height: 400px;
	float: left;
	margin-left: 50px;
}

.bag_price{
  font-size: 40px;
  font-weight: bold;
  position: relative;
  left: 0px;
  top: 24px;
  text-shadow: 1px 1px 0px rgba(192, 185, 157, 1);
  margin-bottom: 25px;
}

</style>