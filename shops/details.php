<?php 
 session_start();
 include_once "../db_connect.php";
 $id = intval($_GET['shop']);
 
 if (is_int($id)!=TRUE){ $failed=1;}
  $query = "SELECT * FROM shops WHERE `show` = 1 AND `id`='$id'";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
        {
			if (mysql_num_rows($result)!=0) 
			{
				$title = $r[1];
				$fulltext = $r[2];
				$gallery_alias = $r[3];
				$map = $r[4];
				$description = $r[6];
				$keywords = $r[7];
				$qr = $r[8];
			} else $failed=1;
		}
 
 define ("PAGE_IDENTIFY", "shops");
 define ("TITLE_WORDS","$title");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "$keywords");
 define ("DESCRIPTION", "$description");
 

?>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
?>




<div class="row">
<div class="span2">
    
    

    
    
    
    
    
    
    
<?php include "../articles/_bar_category.php"; ?>
    
</div>
<div class="span10">
	<!-- Add jQuery library -->
<!--	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>-->

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../gallery/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../gallery/source/jquery.fancybox.js?v=2.1.5"></script>
	


	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();

		});
	</script>

    <?php
include_once 'breadcrumb.php';
?>
<?php 
function get_shop_pic($alias, $offset)
		{
			$query = "SELECT * FROM gallery WHERE `alias` = '$alias' LIMIT 1,$offset;";
			$result=mysql_query($query);			
			while($r=mysql_fetch_array($result))
			{	
				$img = $r[1];
				
			}
			return $img;
		}
?>

<?php echo "<h1>".$title."</h1>";?>

<?php echo "<div class='shop_fulltext'><p>".$fulltext."</p></div>";?>
<?php 
function ekranizator($tmp)
{
	$bodytag = str_replace('&', "&amp;", $tmp);
	return $bodytag;
}

echo "<div class='shop_map'>".ekranizator($map)."</div>";?>








<?php 
	if ($gallery_alias!=NULL) {//echo "<img class='thumbnail' src='http://www.ladystyle.su/gallery/images/small/".get_shop_pic ($gallery_alias)."'>";
?>  

<div style='display: table;'>
<h2>Фотографии магазина</h2>
<?php for ($i=1;$i<6;$i++){?>
<a style='float: left; margin: 0px 32px 10px 0px;' class="thumbnail fancybox" href="http://www.ladystyle.su/gallery/images/big/<?php echo get_shop_pic($gallery_alias,$i); ?>" data-fancybox-group="gallery" title="<?php echo $r[2]; ?>">
					<img alt='$title' src="http://www.ladystyle.su/gallery/images/small/<?php echo get_shop_pic($gallery_alias,$i); ?>"></a>
<?php } ?>
<a href="http://www.ladystyle.su/gallery/<?php echo $gallery_alias; ?>">Больше фотографий </a>
</div>
<?php }?>
<hr>
<?php if ($qr != NULL) { ?>
	<div class='qr-show'>
		
		<div class='qr-img'><img alt="qr-код, контакты" src="http://www.ladystyle.su/shops/qr/<?php echo $qr;?>"></div>
		<div class='qr-text'>Для быстрого считывания контактных данных магазина через QR-код, используйте ваш смартфон или планшетный компьютер</div>
	</div>  
<?php }?>	
</div>
<br><br>
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
?>
