<?php
define ("DIRECT", "http://www.ladystyle.su");

echo "<div class=\"navbar\" style=\"font-size: 15px; font-family: 'Roboto Condensed', sans-serif !important;\">
      <div class=\"navbar-inner\">
       <div class=\"container\">
        
        <ul class=\"nav\" id=\"menu\">
         
         
         <li "; if (PAGE_IDENTIFY=='main') echo "class=\"active\""; echo " >
			<a href=\"".DIRECT."/\">ГЛАВНАЯ</a>		 
		 </li>
             
        <li "; if (PAGE_IDENTIFY=='im') echo "class=\"active\""; echo " >
			<a href=\"".DIRECT."/im/\">ОДЕЖДА</a>";?>
			<ul id='level1'>
				<li><a href="#">Осень-зима</a>
					<ul class='level2' id='menu_winter'>
					<li class='menu_container'>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/bluzki/1'>Блузки</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/bolero/1'>Болеро</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/bridges/1'>Бриджи</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/bruki/1'>Брюки</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/jacket/1'>Жакеты</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/jilet/1'>Жилеты</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/combineson/1'>Комбинезоны</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/complect/1'>Комплекты</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/palto/1'>Пальто</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/platya/1'>Платья</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/sarafan/1'>Сарафаны</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/sharf/1'>Шарфы</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/shorts/1'>Шорты</a></div>
						<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/winter/yubki/1'>Юбки</a></div>
					</li>
					</ul>					
				</li>
				<li><a href="#">Весна-лето</a>				
					<ul class='level2' id='menu_summer'>
						<li class='menu_container'>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/bluzki/1'>Блузки</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/bolero/1'>Болеро</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/bridges/1'>Бриджи</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/bruki/1'>Брюки</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/jacket/1'>Жакеты</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/jilet/1'>Жилеты</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/combineson/1'>Комбинезоны</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/complect/1'>Комплекты</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/platya/1'>Платья</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/sarafan/1'>Сарафаны</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/top/1'>Топы</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/sharf/1'>Шарфы</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/shorts/1'>Шорты</a></div>
							<div class="menu_item_v2"><a href='http://www.ladystyle.su/im/summer/yubki/1'>Юбки</a></div>
						</li>
					</ul>
				</li>
				<li><a href='http://www.ladystyle.su/im/novelty.php'>Новинки</a></li>
				<li><a href='http://www.ladystyle.su/im/finery.php'>Нарядная одежда</a></li>
				<li><a href='http://www.ladystyle.su/im/promo.php'><strong>Каталог акции</strong></a></li>
			</ul>
		<?php
		echo "
		<li "; if (PAGE_IDENTIFY=='bags') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/bags/\">СУМКИ</a></li>
		</li>
                <li "; if (PAGE_IDENTIFY=='opt') echo "class=\"active\""; echo " ><a href=\"http://www.ladystyle.su/opt/\">ОПТОВОЕ СОТРУДНИЧЕСТВО</a></li>
                              <li "; if (PAGE_IDENTIFY=='shops') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/shops/\">МАГАЗИНЫ</a></li>
             <li "; if (PAGE_IDENTIFY=='gallery') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/gallery/\">ГАЛЕРЕЯ</a></li>
         <li "; if (PAGE_IDENTIFY=='contacts') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/contacts/\">КОНТАКТЫ</a></li>
		 <li "; if (PAGE_IDENTIFY=='questions') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/questions/\">ВАШИ ВОПРОСЫ</a></li>
		 <li "; if (PAGE_IDENTIFY=='moda') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/articles/by_category/moda/\">О МОДЕ</a></li>
		 <li "; if (PAGE_IDENTIFY=='sales') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/im/promo.php\"><b>АКЦИЯ</b></a></li>
		 <li "; if (PAGE_IDENTIFY=='opt') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/opt\"><b>РЕГИСТРАЦИЯ</b></a></li>
		 
		 
		 
             
           

   
";         
if ($check->accepted==1 && $check->level==80) { echo "<li "; if (PAGE_IDENTIFY=='private_admin') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/cabinet/private_adm.php\"><b>ADMIN_PNL</b></a></li><li><a href='http://www.ladystyle.su/im/wod.php'>Без описания</a></li>";}
if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==1)) { echo "<li "; if (PAGE_IDENTIFY=='private') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/cabinet/\"><b>Личный кабинет</b></a></li>";}
if ($check->accepted==1 && $check->level==50) { echo "<li "; if (PAGE_IDENTIFY=='private') echo "class=\"active\""; echo " ><a href=\"".DIRECT."/cabinet/private_mgr.php\"><b>= Менеджеру =</b></a></li>";}
echo "
        </ul>
       </div>
     </div>
    </div>";

?>