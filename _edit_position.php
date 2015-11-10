<?php 
 session_start();
 //define ("PAGE_IDENTIFY", "private_admin");
 //define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 //define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if (($check->accepted>0 && $check->level==80) OR ($check->accepted>0 && $check->level==50)) {
    
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $show=$_POST['show'];
    $nomer_mod=$_POST['nomer_mod'];
    $content=$_POST['content'];
    $season=$_POST['season'];
    $rost=$_POST['rost'];
    $price=$_POST['price'];
	$new_price=$_POST['new_price'];
    $size=$_POST['size'];
    $such=$_POST['such'];
    $promo=$_POST['promo'];
	$height=$_POST['height'];
	
    if ($promo=='Нет') $promo='0';
	include "../db_connect.php";
    $query="SELECT * FROM promo WHERE `title`='$promo'";
  //  echo "<br>".$query."<br>";
    $result=mysql_query($query);
	while($r=mysql_fetch_array($result))
                    {
					$promo=$r[0];
					//echo "---".$r[0];
					}
	
  // mysql_close($link); 
	
	
	
	
    
    $query="UPDATE `im_catalog` SET  `name` =  '$name', `description` =  '$description', `show` =  '$show', `price` =  '$price',`price_new` =  '$new_price', `nomer_mod` =  '$nomer_mod', `content` =  '$content', `season` =  '$season', `rost` =  '$rost', `size` =  '$size',`also` =  '$such', `promo` =  '$promo', `height` =  '$height' WHERE  `id` =$id;";
   // echo $query;
                $result=mysql_query($query);
    mysql_close($link); 




//echo "Присутствие: ".$info_art->num_rows." шт"; 
}
?>                
<!--<script language="JavaScript"> 
  window.location.href = history.back();
</script>        -->
<script>
//window.location = history.back();
</script>

<script>
window.location = "http://www.ladystyle.su/im/details/any/usual/<?php echo $nomer_mod;?>";
</script>