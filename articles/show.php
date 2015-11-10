<?php 
//получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект
function request_url()
{
  $result = ''; // Пока результат пуст
  $default_port = 80; // Порт по-умолчанию
  // А не в защищенном-ли мы соединении?
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    // В защищенном! Добавим протокол...
    $result .= 'https://';
    // ...и переназначим значение порта по-умолчанию
    $default_port = 443;
  } else {
    // Обычное соединение, обычный протокол
    $result .= 'http://';
  }
  // Имя сервера, напр. site.com или www.site.com
  $result .= $_SERVER['SERVER_NAME']; 
  // А порт у нас по-умолчанию?
  if ($_SERVER['SERVER_PORT'] != $default_port) {
    // Если нет, то добавим порт в URL
    $result .= ':'.$_SERVER['SERVER_PORT'];
  }
  // Последняя часть запроса (путь и GET-параметры).
  $result .= $_SERVER['REQUEST_URI'];
  // Уфф, вроде получилось!
  return $result;
}

 error_reporting(0);
 session_start();
$alias=$_GET['alias'];
define ("ALIAS", $alias);
include '_class.articles.php';
$article = new articles();
$article->get_article_by_alias($alias);
//echo "<script>alert('".$article->category_alias."')</script>";
 define ("PAGE_IDENTIFY", "$article->category_alias");
 //define ("PAGE_IDENTIFY", "articles");
 define ("TITLE_WORDS","$article->title");
 define ("KEY_WORDS", "$article->keywords");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("DESCRIPTION", "$article->subtitle");

	if ($article->undefined!=1) {
	header('HTTP/1.1 404 Not Found');
	header('Location:http://www.ladystyle.su/template/404.php');
	exit();
	}

	$foo = request_url();
	if (strrpos($foo, '?alias=', 0)!=FALSE) 
	{
		header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: http://www.ladystyle.su/articles/$alias"); 
		exit();		
	}
 
 
 /*

 $alias=$_GET['alias'];
define ("ALIAS", $alias);
include '_class.articles.php';
$article = new articles();
$article->get_article_by_alias($alias);
 define ("PAGE_IDENTIFY", "articles");
 define ("TITLE_WORDS","$article->title");
 define ("KEY_WORDS", "Новости рок-музыки, исполнители, статья о $article->subtitle");
 define ("DESCRIPTION", "$article->subtitle");
 define ("DIR", "http://riffter.ru/");
 error_reporting(0);
 session_start();
 */
?>
<?php
require_once '../template/header.php';
?>



<div class="row">
<div class="span2">
    
 <?php include "_bar_category.php"; ?>
    
</div>
<div class="span8">
 <?php

        
echo "<div itemscope itemtype='http://schema.org/ScholarlyArticle'>";
echo "<h1 itemprop='headline'>" . $article->title . "</h1>";
?>

    <?php
if ($check->accepted == 1 && $check->level == 80){
    echo "<a href='edit.php?alias=".$alias."'><h5>Редактировать</h5></a>";
    echo "<a href='delete.php?alias=".$alias."'><h5>Удалить</h5></a>";
    }
//echo "<div style=\"font: 9pt cursive; color: graytext;\"><i class=\"icon-pencil\"></i> Опубликовано: ".$article->date."  -  ".$article->author."  |  <i class=\"icon-folder-close\"></i> Категория: $article->category</div>";
echo "<div style=\"font: 9pt cursive; color: graytext;\"><i class=\"icon-pencil\"></i> Опубликовано: ".$article->date."  |  <i class=\"icon-folder-close\"></i> Категория: $article->category</div>";
?>
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir"></div>
<?php    
echo "<div class='articleBody' itemprop='articleBody' style='width: 770px;'>" . $article->text . "</div>";
echo "</div>";
define("ARTICLE_CONTENT", $r[3]);
//echo "<br>";

            
?> 
<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<script type="text/javascript">
  VK.init({apiId: 4652989, onlyWidgets: true});
</script>

<!-- Put this div tag to the place, where the Comments block will be -->
<div style="min-height: 300px;">
<div id="vk_comments"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 10, width: "800", attach: "*"});
</script>
</div>
<br><br>
<!--<hr>-->
<!--<h4>Комментарии</h4>-->
<?php
//include "../db_connect.php";
//$query = "SELECT * FROM responses WHERE `show`=1 AND `alias`='".ALIAS."' ORDER BY `date`,`time`;";
////$query = "SELECT * FROM responses WHERE `show`=1;";
//        $result=mysql_query($query);
//        while($r=mysql_fetch_array($result))
//            { 
//         echo "
//      <div class='comment_name'>
//            <div><img src='noavatar.jpg'></div>
//            $r[1]</div>
//           
//            <div class='comment_body' style=''>
//             <div class='comment_time'>$r[4] - $r[5]</div>
//            $r[6]</div>            
//";
//            }
            ?>
</div>
    <div class="span2">
    
<?php 

 ?>
    
</div>
</div>

        
       

      

<!--
          <h5>Оставьте комментарий</h5>
          <form method="post" action="add_response.php">
<form method="post">
    <table><tr>
            <td>Ваше имя*</td><td><input type="text" name="user_name" value="" size="300" /></td></tr>
            <tr><td>E-mail</td><td><input id="inputemail" type="text" name="user_email" value="" size="500" />(не публикуется) </tr>
            </table>
      <div class="control-group">
    <label class="control-label" for="inputcaptcha">Введите цифры с картинки</label>
    <div class="controls">
      <input type="text" id="inputcaptcha" name="captcha" placeholder="Введите цифры с картинки">
        <?php 
        //require '../contacts/captcha.php';
        ?>
      <span id="span_inputcaptcha" class="label" hidden></span>
    </div>
  </div>
  	   <textarea id="comment" name="text" rows="7" cols="40" style="width: 50%"></textarea>
           <br />
	   <input class="btn" id="response_button" type="submit" name="save" value="Отправить" />
           <a class="btn" id="response_button" name="save">Отправить</a>
           <input class="hidden" type="text" name="alias" value="<?php echo $alias;?>" size="500" />
          </form> -->




    <!--Ajax посыл комментария-->

        <script>
            $(document).ready(function(){
                   //почта
        $("#inputemail").blur(function(){
        email=$(this).attr('value');
        var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
        if ($(this).attr('value').search(pattern)==0)
        {
        emailok=1;
        } else {
         emailok=0;
         $("#inputemail").addClass('.error');
         alert('Не верный e-mail');
        }
                                    }
                        ); 
                
                  $('#response_button').click(function(){
                  user_name=$("form input[name=user_name]").val(); //получение данных из формы
                  user_email=$("form input[name=user_email]").val();
                  captok=$("form input[name=captcha]").val();
                  elm3=$('#comment').val();
         //         alert(emailok);
                  alias=$("form input[name=alias]").val();
                  captver=<?php echo  $_SESSION[keystring];?>;
                  if (user_name!='' && user_email!='' && elm3!='' && captver==captok && emailok=='1'){
                       $.ajax({
                                type: "POST",
                                cache: false,
                                async: true,
                                url: "<?php echo DIR; ?>articles/add_response.php",
                                data: "user_name="+user_name+"&user_email="+user_email+"&alias="+alias+"&elm3="+elm3,
                                success: function(msg){
                               //     alert(msg);
                                    window.location.reload();
                                                    }
                                });
                               
                                }
                                else alert ('Форма заполнена не верно!');
                                                }
                                    )
                                         
                                        }
                            ); 
          </script>   
 
<?php
include_once '../template/footer.php';
?>

 
     