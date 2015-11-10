<?php 
session_start(); 
error_reporting(0);
 define ("PAGE_IDENTIFY", "im");
 define ("TITLE_WORDS","Леди Стайл - ываfd44ние коллекции");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Обновление коллекции женской одежды 2013 новый сезон мода одежда от производителя оптом одежда не дорого");
 define ("DOINDEX", "NO");
?>
<?php
//сделать безопасное получение
include "_class.informator.php";
$info = new informator();
$info->getCategoryDescription($category);
//Теперь данные категории доступны через свойства класса _class.informator.php :)
?>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>

<div class="row">
    <div class="span2"><?php include "category.php"; ?></div>
    <div class="span10">
            


        <h1><?php echo "Формируем Ваш заказ"; ?></h1><br>
        <p>Итак! Вы уже определились с выбором и ваша корзина полна товаров!</p>
        <p>Самое время разобраться с доставкой! :)</p>
        <h3><?php echo "Укажите способ доставки"; ?></h3>
        <p>Мы работаем со следующими транспортными компаниями:</p>
        
        <form name="delivery" action="http://www.ladystyle.su/im/verify.php" method="POST">
        
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Байкал сервис">
            Байкал сервис  - <a href="http://www.baikalsr.ru/city/" rel="nofollow" target="_blank">Сайт компании</a>
        </label>
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="Деловые линии">
            Деловые линии  - <a href="dellin.ru" rel="nofollow" target="_blank">Сайт компании</a>
        </label>
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios3" value="Автотрейдинг">
            Автотрейдинг  - <a href="http://www.ae5000.ru/site/allcities/" rel="nofollow" target="_blank">Сайт компании</a>
        </label>      
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios4" value="Энергия">
            Энергия - <a href="http://nrg-tk.ru/" rel="nofollow" target="_blank">Сайт компании</a>
        </label> 
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios5" value="ПЭК">
            ПЭК - <a href="http://www.pecom.ru" rel="nofollow" target="_blank">Сайт компании</a>
        </label> 
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios6" value="Жилдор экспедиция">
            Жилдорэкспедиция - <a href="http://www.jde.ru/branch" rel="nofollow" target="_blank">Сайт компании</a>
        </label> 
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios7" value="КИТ">
            КИТ - <a href="http://tk-kit.ru/" rel="nofollow" target="_blank">Сайт компании</a>
        </label> 
        <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios7" value="ТК не выбрана">
            Затрудняюсь с выбором, помогите определиться
        </label>
            <input class="btn" type="submit" value="Утверждаю ТК" name="" />
        </form>
        <br>
        <h5><i class="icon-hand-right"> </i> Как выбрать транспортную компанию?</h5>
        <p>Ваша посылка отправится из Ростова-на-Дону в день оплаты или утром следующего дня (зависит от времени зачисления оплаты на наш счет), посылка будет доставлена Вам той транспортной компанией которую вы укажите в списке. Убедитесь что выбранная компания имеет филиал в Вашем городе. Проверить это можно на официальных сайтах компаний, кликнув на ссылке "Сайт компании".</p>
    </div>
    
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
