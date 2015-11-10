<?php 
 define ("PAGE_IDENTIFY", "articles");
 define ("TITLE_WORDS","");
 define ("KEY_WORDS", "");
 //define ("DIR", "127.0.0.1/riffter/");
  define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
?>
<?php
require_once '../template/header.php';
?>
sdfsdfsdf
<?php
require_once '../template/devider.php';
?>
<div class="row">
    <div class="span9">
            Редактор новой статьи
          <form method="post" action="write_art.php">
             Название статьи <input type="text" name="title" value="" size="300" /><br>
              Краткое описание <input type="text" name="subtitle" value="" size="500" /><br>
  	   <textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 80%">

	   </textarea>
           <br />
	   <input class="btn" type="submit" name="save" value="Submit" />
	   <input class="btn" type="reset" name="reset" value="Reset" />
          </form> 
<?php
$alias=$_GET['alias'];
include_once '../db_connect.php';
        $query = "SELECT * FROM articles WHERE `show`=1 AND `alias`='$alias';";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            echo "<h1><a href=\"#\">".$r[1]."</a></h1>";
            echo "<div style=\"font: 9pt cursive; color: graytext;\"><i class=\"icon-pencil\"></i> Опубликовано: 10-11-2012  -  Admin  |  <i class=\"icon-tags\"></i> Комментарии: 35</div><hr>";

            echo "<div style=\"margin: 2px 8px 0px 0px; width: 70px; height: 70px; float: left; background-color: black; border: 2px gray solid;\">.</div>";
            echo "<p> ".$r[3];
            echo "</p><hr>";
            }    
?>        


          Оставьте ваш комментарий
          <form method="post" action="articles/add_response.php">
             Ваше имя* <input type="text" name="user_name" value="" size="300" /> <br>
              E-mail <input type="text" name="user_email" value="" size="500" />(не публикуется) <br>
  	   <textarea id="elm3" name="elm3" rows="15" cols="80" style="width: 80%">
	   </textarea>
           <br />
	   <input class="btn" type="submit" name="save" value="Отправить" />
           <input class="hidden" type="text" name="alias" value="<?php echo $alias;?>" size="500" />
          </form> 

</div>
    <div class="span3">fdgfdg</div>
    </div>
<?php
include_once '../template/footer.php';
?>

        <!-- Tinymce Begin -->
      <!--  <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",                
                plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
                theme_advanced_buttons1 : "fontsizeselect,bold,underline,strikethrough,hr,removeformat,emotions,iespell,media,advhr,|,link,unlink,image,|,undo,redo,|,cut,copy,paste,|,",
                theme_advanced_toolbar_location : "bottom",
                theme_advanced_toolbar_align : "center",             
                content_css : "http://www.ladystyle.su/css/tinymce.css"
        });       
        </script>
         Tinymce End -->