<?php 
 session_start();
 define ("PAGE_IDENTIFY", "contacts");
 define ("TITLE_WORDS","Lady Style - адрес фабрики, контакты, телефоны, путь подъезда");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Контакты с производителем, кантакты с поставщиком женской одежды, карта, схема проезда, производитель женской одежды на Юге россии");
 define ("DESCRIPTION", "Контакты с ООО Леди Стайл, а также схема проезда к головному офису, производственным и швейным цехам, складу продукии");
?>

<?php 
 define ("PAGE_IDENTIFY", "contacts");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>




<div class="row">
<div class="span2">
<?php include "../articles/_bar_category.php"; ?>
    
</div>
<div class="span10">
    <?php
include_once 'breadcrumb.php';
?>
    <h1>Контакты</h1>
<br>
<img alt="Отдел продаж ООО 'Леди Стайл', контакты швейной фабрики" src="picture.jpg" class="thumbnail" style="float: right;">


<h3>Отдел продаж</h3>
<p>По вопросам розничных продаж (Интернет-магазин),<br> а также по вопросам оптовых продаж обращаться:<br>
Клечковская Ольга Валентиновна, руководитель отдела продаж<br>
<abbr title="Городской контактный телефон отдела продаж">Тел: </abbr> 8 (8635) 27-56-41<br>
<abbr title="Мобильный контактный телефон отдела продаж">Тел: </abbr> 8 (909) 410-74-00<br>
<abbr title="Факс отдела продаж">Тел: </abbr> 8 (8635) 27-56-48<br>
<abbr title="Электронная почта">E-mail: </abbr><a href="mailto:opt@ladystyle.su">opt@ladystyle.su</a></p> <br>



<h3>Коммерческий директор</h3>
<p>С коммерческими предложениями, а также по вопросам производства обращаться:<br>
Кобзарь Татьяна Алексеевна, коммерческий директор<br>
<!--<abbr title="Городской контактный телефон отдела продаж">Тел: </abbr> 8 (8635) 27-56-41<br>
<abbr title="Мобильный контактный телефон отдела продаж">Тел: </abbr> 8 (950) 844-07-10<br>-->
<abbr title="Электронная почта">E-mail: </abbr><a href="mailto:com@ladystyle.su">com@ladystyle.su</a></p> <br>



<h3>Склад готовой продукции</h3>
<p>
Дурнева Валентина Романовна, начальник склада готовой продукции<br>
<abbr title="Городской контактный телефон склада готовой продукции">Тел: </abbr> 8 (8635) 27-56-48<br>

</p> <br>




<h3>Отдел кадров</h3>
<p>
Салькинова Ирина Павловна, начальник отдела кадров<br>
<abbr title="Городской контактный телефон отдела продаж">Тел: </abbr> 8 (8635) 27-56-47<br>
с 9.00 до 15.00 в будние дни.
</p> <br>


<div class="pull-right" style="padding-right: 300px; "><img alt="контакты" src="banner_contact.gif" style="width: 150px;"></div>
<h3>Адрес нашей компании</h3>
<address>
  <strong>ООО "Леди Стайл"</strong><br>
  Ростовская область<br>
  г.Новочеркасск, пр. Ермака 5<br>
 Здание бывшего ликеро-водочного завода<br>
  <abbr title="Контактный телефон">Тел:</abbr> 8 (8635) 27-56-41
</address>

<br>

<h3>Мы на карте</h3>
<p>
    <i class="icon-info-sign"> </i> На карте вы можете увидеть, где располагается швейная фабрика, а также пути подъезда к нам со стороны Ростова-на-Дону и Шахт.<br> 
    Обратите внимание, что железнодорожный вокзал находится в шаговой доступности :)
</p><br>
<div class="thumbnail">
<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=ViB-keuXk19qvR8hshto9Xcewi2zjhhr&amp;width=962&amp;height=450"></script>
</div>
<br><br>
</div>
</div>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
