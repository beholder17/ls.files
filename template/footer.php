     
     </div>
     <!-- Body End -->
     <!-- Footer Begin -->
        <div class="row">
            <div class="span12">
				<div class="magenta-strip" style="margin-left: 30px;"></div>
			</div>           
        </div>  
        <div class="row" style="background-color: white; margin-left: 20px; padding: 10px 0 10px 0; border-radius: 5">            
            <div class="span3" style="margin-left: 100px; min-height: 80px;"><a href="http://www.ladystyle.su/im/">Каталог</a><br><a href="http://www.ladystyle.su/im/novelty.php">Новинки</a><br><a href="http://www.ladystyle.su/articles/by_category/sales">Акции и скидки</a><br><a href="http://www.ladystyle.su/articles/by_category/offers">Коммерческие предложения</a><br><a href="http://www.ladystyle.su/articles/by_category/press">Пресса о нас</a></div>            
            <div class="span3" style="min-height: 80px;"><a href="http://www.ladystyle.su/articles/uslovia-sotrudnichestva">Условия сотрудничества</a><br><a href="http://www.ladystyle.su/opt/">Оплата и доставка</a><br><a href="http://www.ladystyle.su/articles/kak-vibrat-razmer-setka">Как выбрать размер?</a><br></div>            
            <div class="span3" style="min-height: 80px;"><a href="http://www.ladystyle.su/articles/by_category/news">Новости</a><br><a href="http://www.ladystyle.su/articles/by_category/about">О компании</a><br><a href="http://www.ladystyle.su/opinion/">Отзывы</a><br><a href="http://www.ladystyle.su/articles/rekvizit">Реквизиты</a><br><a href="http://www.ladystyle.su/articles/realiz-offer">Поставщикам</a><br><a href="http://www.ladystyle.su/articles/lekala">Лекала на заказ</a></div>
			<div class="span2" style="min-height: 80px;">
				<div style="float: right;">
				  <div class="presence">Сфера присутствия</div>
				<a href="http://www.ladystyle.su/map/"><img alt='Зона присутствия ООО &quot;Леди Стайл&quot;' src="http://www.ladystyle.su/template/russia.jpg"></a></div>
			</div>
        </div>
     <div class="row" style="padding-top: 20px;">
         <div class="span6" style="color: white">
<!-- <noindex> -->
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
<!-- </noindex> -->
		 </div>
         <div class="span6" style="margin-bottom: 5px; line-height: 10px ;color: gray; font-size: 8pt; text-align: justify"><div style="text-align: right;"><!--Разработано: xxxxx.ru-->Copyright 2008-<?php echo date('Y') ?> © LADYSTYLE.SU - оптовый интернет-магазин женской одежды российского производства<br>Lady Style ® является зарегистрированной торговой маркой<br>Любое её нелегальное использование будет преследоваться в соответствии с законодательством РФ<br>
		 <div class='trade_link'><? echo $sape->return_links($n); ?></div>
</div>
		 
		 </div>
     </div>
     <!-- Footer End -->
    </div> 
    </div>
    
    
    
    
    

 

  
    
    
    
     

    <script>
   // CKEDITOR.replace( 'editor1' );
    var ckeditor = CKEDITOR.replace('editor1');
    AjexFileManager.init({
    
    path: 'http://www.ladystyle.su/AjexFileManager',
    returnTo: 'ckeditor',
    editor: ckeditor,
        "extraPlugins": "imagebrowser",
        "extraPlugins": "fastimage",
         "customConfig": '<?php if ($check->accepted==1 && $check->level==80) echo "http://www.ladystyle.su/ckeditor/config.js"; else echo "http://www.ladystyle.su/ckeditor/config-simple.js"; ?>',
        "imageBrowser_listUrl": "images_list.json"
        
});
</script>   
<script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap-transition.js"></script>
<script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap-alert.js"></script>
<script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap-modal.js"></script>
<!--<script src="http://bootstrap.veliovgroup.com/assets/js/bootstrap-dropdown.js"></script>-->
<!--        <script src="http://bootstrap.veliovgroup.com/assets/js/bootstrap-scrollspy.js"></script>-->
<script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap-tab.js"></script>
<!--        <script src="http://bootstrap.veliovgroup.com/assets/js/bootstrap-tooltip.js"></script>-->
<!--<script src="http://bootstrap.veliovgroup.com/assets/js/bootstrap-popover.js"></script>-->
        <script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap-button.js"></script>
        <script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap-collapse.js"></script>
<!--        <script src="http://bootstrap.veliovgroup.com/assets/js/bootstrap-carousel.js"></script>-->
<!--        <script src="http://bootstrap.veliovgroup.com/assets/js/bootstrap-typeahead.js"></script>   -->

<!--выезжающее окно обратной связи - начало-->
<!--<div id="panel" style="padding-left: 10px; padding-top: 20px; border-radius: 10px; border: 3px solid #EC008C; display: none; width: 232px; height: 280px; background-color: white; position: absolute; top: -10px; margin-left: 50%; margin-right: 50%;">
 
<script type="text/javascript"> _shcp = []; _shcp.push({widget_id : 535196, widget : "Chat"}); (function() { var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true; hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://widget.siteheart.com/apps/js/sh.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hcc, s.nextSibling); })();</script>
</div>-->
<!--выезжающее окно обратной связи - конец-->
<!-- Yandex.Metrika counter --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter18269641 = new Ya.Metrika({id:18269641, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/18269641" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
</body>
</html>

