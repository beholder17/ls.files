<?php
define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
include "../template/header.php";
if ($check->accepted==1 && $check->level==80) {
?>
<script src="<?php echo PATH_TO_ROOT; ?>js/ajaxupload.min.js"></script>
<div class="row">
    <div class="span2">
         fdg
        </div> 
         <div class="span8">
        
<h3>Добавить статью</h3>
<!--          <div class="row"></div>-->
          <form method="post" action="write_art.php">
             <div class="row"> 
                 <div class="span1">
             Название статьи
                   </div>
                  <div class="span3">
             <input type="text" name="title" value="" size="255" />
                   </div>
             </div>
             <div class="row">
                  <div class="span1">
             Автор
                   </div>
             <div class="span3">
             <input type="text" name="author" value="" size="255" />
                   </div>
             </div>
             <div class="row">
                 <div class="span1">
             Alias 
                 </div>
                 <div class="span3">
                 <input type="text" name="alias" value="" size="255" />
                 </div>
             </div>
             <div class="row">
                 <div class="span1">
              Краткое описание
                 </div>
                 <div class="span3">
                 <input type="text" name="subtitle" value="" size="255" />
                 </div>
              </div>
			  <div class="row">
                 <div class="span1">
              keywords
                 </div>
                 <div class="span3">
                 <input type="text" name="keywords" value="" size="255" />
                 </div>
              </div>
			     <div class="row">
                 <div class="span1">
             img 
                 </div>

             </div>
                <div class="row">
                 <div class="span1">
                     Категория
                 </div>
                 <div class="span3">
                 <select name="cat">
                     <?php
                     include "../db_connect.php";
$query = "SELECT * FROM `articles_category`";
//$query = "SELECT * FROM responses WHERE `show`=1;";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
         echo "<option>$r[1] :: $r[3]</option>";
            }
            mysql_close($link);
                     ?>
                 
                         </select>
                    
                 </div>
              </div>
  	   <textarea name="editor1"></textarea>
           
           
	   <input class="btn" type="submit" name="save" value="Submit" />
	   <input class="btn" type="reset" name="reset" value="Reset" />
          </form> 


</div>
    <div class="span2">
    &nbsp;
    </div>
    </div>
<?php
include "../template/footer.php";
} else echo "Access denied";
?>
<script>
   // CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace('editor1', {
        "extraPlugins": "imagebrowser",
        "extraPlugins": "fastimage",
        "imageBrowser_listUrl": "images_list.json"
});
</script>
<style>
#img_private{
 width: 120px; 
 height: 100px; 
 background-color: gray; 
 margin: 10px;
 }
#img_private:hover{
background-color: brown;
cursor: pointer;
}
</style>