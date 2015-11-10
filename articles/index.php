<?php 
 define ("PAGE_IDENTIFY", "articles");
 define ("TITLE_WORDS","Информационные статьи");
 define ("KEY_WORDS", "Гитары");
 //define ("DIR", "http://riffter.ru/");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 //error_reporting(0);
 session_start();
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
                include 'articles.php';     
?>
<hr>        

      
        
<div class="row">  
    <div class="span8">


</div></div>

</div>
    <div class="span2">
       
    
    <?php 
	include "../tabs/tabs_block.php";
   include "../_right_bar.php"; ?>
    </div>
    </div>
<?php
include_once '../template/footer.php';
?>


     