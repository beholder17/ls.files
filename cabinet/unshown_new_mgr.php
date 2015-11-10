<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 ) {
    ?>




<div class="row">
<div class="span2">
    
<?php include "sidebar_mngr.php";?>
    
</div>
<div class="span10">
<h1>Рабочее место менеджера</h1>
<br>





<?php
$date="2014-10-23";
$date_sec="2014-12-15";
$date_sec_2="2015-02-02";
/*$date_sec="2014-04-24";
$date2="2014-07-13";
$date3="2014-08-11";*/
echo "<h3>Невыставленные модели фотосессий: февраль, апрель, июль, август</h3><br>";

 if (!include '../db_connect.php') include 'db_connect.php';
//        $query = "SELECT * FROM im_catalog WHERE `show`=0 AND (`date`='$date' OR `date`='$date_sec' OR `date`='$date2' OR `date`='$date3') ORDER BY `nomer_mod` DESC;";
        $query = "SELECT * FROM im_catalog WHERE `show`=0 AND (`date`='$date' OR `date`='$date_sec' OR `date`='$date_sec_2') ORDER BY `nomer_mod` DESC;";
        
        $result=mysql_query($query);
        //define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
        while($r=mysql_fetch_array($result))
            {
            //$r[3]=strip_tags($r[3]);
            //$article_croped = crop_str($r[3], 300);
            //echo "<div class=\"articles-show-radius\"><h5><a href=\"".PATH_TO_ROOT."articles/show.php?alias=$r[7]\">".$r[1]."</a></h5>";
            //echo "<div style=\"font: 9pt cursive; color: graytext;\"><i class=\"icon-pencil\"></i> Опубликовано: ".$r[4]." | <i class=\"icon-folder-close\"></i> $r[8]</div>";

           // echo "<div style=\"margin: 2px 8px 0px 0px; width: 70px; height: 70px; float: left; background-color: black; border: 2px gray solid;\">.</div>";
           // echo "<p> ".$article_croped."...";
           // echo "</p>
		    ?>
            <div class='unshown_item'>
				<div class='unshown_item_img'>
					<img alt='<?php echo $r[2].' '.$r[8];?>' src='../im/image/80/<?php echo $r[6]; ?>'>
				</div>
				<div class='unshown_item_caption'>
				<a style='float: left;' href='http://www.ladystyle.su/im/edit_shell.php?id=$r[0]'>
				<?php echo $r[2].' '.$r[8];?>
				</a>
				</div>
			</div>
			
			<?php
            }    

?>
<style>
	.unshown_item{
	width: 86px;
height: 228px;
float: left;
margin: 9px;
font-size: 11px;
	}
	.unshown_item_img{
	
	}
	.unshown_item_caption{
	
	}
</style>





<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Nunc tincidunt</a></li>
    <li><a href="#tabs-2">Proin dolor</a></li>
    <li><a href="#tabs-3">Aenean lacinia</a></li>
  </ul>
  <div id="tabs-1">
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>

    



<script>
    //jQuery.noConflict();
$(document).ready(function(){  
   $(function() {
    $( "#tabs" ).tabs();
  });
});  
</script>

    

</div>

</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
