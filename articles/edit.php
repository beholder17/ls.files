<?php
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
include_once '../template/header.php';
if ($check->accepted==1 && $check->level==80) {
    include "_class.articles.php";
    if ($_POST['editor1']!=NULL){
        $text=$_POST['editor1'];
        $alias=$_POST['alias'];
        $update=new articles();
        $update->update_article_by_alias($text, $alias);
    } 
$alias=$_GET['alias'];

$article = new articles();
$article->get_article_by_alias($alias);

    
?>



<div class="row">
<div class="span2">
    
<ul class="nav nav-list">
  <li class="nav-header">О КОМПАНИИ</li>
  <li class="active"><a href="#">На главную</a></li>
  <li><a href="#">О компании</a></li>
  <li><a href="#">Наши награды</a></li>
  <li><a href="#">Сфера присутствия</a></li>
  <li><a href="#">Видео</a></li>
</ul>
    <a href="../articles/add_artic.php">Добавить статью</a><br>
<a href="../tabs/scan.php">Просканировать табы</a><br>
</div>
    <div class="span8">
    
<?php
include_once '../template/devider.php';
echo $article->text."<hr>";
?>
<h3>Редактировать статью</h3>
<!--          <div class="row"></div>-->
          <form method="post" action="edit.php?alias=<?php echo $article->alias;?>">
             <div class="row"> 
                 <div class="span1">
             Название статьи
                   </div>
                  <div class="span3">
             <input type="text" name="title" value="<?php echo $article->title; ?>" size="300" />
                   </div>
             </div>
             <div class="row">
                  <div class="span1">
             Автор
                   </div>
             <div class="span3">
             <input type="text" name="author" value="<?php echo $article->author; ?>" size="300" />
                   </div>
             </div>
			 <div class="row">
                 <div class="span1">
             Keywords 
                 </div>
                 <div class="span3">
                 <input id="exhibitb" type="text" name="alias" value="<?php echo $article->keywords; ?>" size="300" />
                 </div>
             </div>
             <div class="row">
                 <div class="span1">
             Alias 
                 </div>
                 <div class="span3">
                 <input id="exhibitb" type="text" name="alias" value="<?php echo $article->alias; ?>" size="300" />
                 </div>
             </div>
             <div class="row">
                 <div class="span1">
              Краткое описание
                 </div>
                 <div class="span4">
                 <input type="text" name="subtitle" value="<?php echo $article->subtitle; ?>" size="500" />
                 </div>
              </div>
              
  	   <textarea  name="editor1"><?php echo $article->text;?></textarea>
           
           <br>
	   <input class="btn" type="submit" name="save" value="Запись" />
         
	   
          </form> 


</div>
</div>


<?php
include_once '../template/footer.php';
}
?>