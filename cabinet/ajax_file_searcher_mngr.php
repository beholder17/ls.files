<?php
$date = $_GET['date'];
$mode = $_GET['mode'];
require '../db_connect.php';

$query1 = "SELECT DISTINCT category FROM im_catalog WHERE date='$date'";
$result1 = mysql_query($query1);
while ($rr = mysql_fetch_array($result1)) {





echo "<h3>".$rr[0]."</h3>";
if ($mode==2) $query = "SELECT * FROM im_catalog WHERE `date`='$date' AND `category`='$rr[0]' ORDER BY `nomer_mod` DESC;";
if ($mode==0) $query = "SELECT * FROM im_catalog WHERE `date`='$date' AND `show`='0' AND `category`='$rr[0]' ORDER BY `nomer_mod` DESC;";
if ($mode==1) $query = "SELECT * FROM im_catalog WHERE `date`='$date' AND `show`='1' AND `category`='$rr[0]' ORDER BY `nomer_mod` DESC;";
    $result=mysql_query($query);
    while($r=mysql_fetch_array($result))
            {        
			?>
			<div class='unshown_item' >
				<div class='unshown_item_img'>
					<img class='<?php 
			if ($r[7]==1) echo "opacity1";
			if ($r[7]==0) echo "opacity0";
			?>' alt='<?php echo $r[2].' '.$r[8];?>' src='../im/image/80/<?php echo $r[6]; ?>'>
				</div>
				<div class='unshown_item_caption'>
				<a style='float: left;' href='http://www.ladystyle.su/im/edit_shell.php?id=<?php echo $r[0];?>'>
				<?php echo $r[8];?>
				</a>
				</div>
				<div class='show_or_not_icon'>
					<?php 
					if ($r[7]==1) echo "<i id='$r[0]' class='icon-eye-open'></i>";
					if ($r[7]==0) echo "<i id='$r[0]' class='icon-remove'></i>";
					
					?>
				</div>
			</div>
			<?php
			}
			echo "<div class='reset_line'></div>";
}			
mysql_close($link);
?>

<script>
$(document).ready(function(){
$('.show_or_not_icon').click(function(){
	var status;
	var ident;
	ident = $(this).children().attr('id'); 
	status = $(this).children().attr('class'); 
	//alert(status+' '+ident);
	if (status == 'icon-eye-open') {
		if (confirm("Убрать эту модель с публикации на сайте?")) {
		  
		  	$.ajax({
				type: "POST",		
				async: true,
				cache: false,
				timeout: 2000,
				data: 'id='+ident,
				url: "http://www.ladystyle.su/cabinet/ajax_hide_model.php",
				success: function(msg){
				//alert(msg);
				$('#'+ident).attr('class','icon-remove');
				//alert(mem);
				}
			});
		  
		  
		  
		} else {
		 
		}
	}
	if (status == 'icon-remove') {
		if (confirm("Опубликовать эту модель на сайте?")) {
		  $.ajax({
				type: "POST",		
				async: true,
				cache: false,
				timeout: 2000,
				data: 'id='+ident,
				url: "http://www.ladystyle.su/cabinet/ajax_show_model.php",
				success: function(msg){
				$('#'+ident).attr('class','icon-eye-open');
				//alert(msg);
				}
			});
		} else {
		  
		}
	}
	});
	});  
</script>