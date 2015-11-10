<?php
include "../db_connect.php";
$tmp = get_file_contents('idelprice.txt');
echo $tmp;
     $query = "SELECT * FROM im_catalog WHERE `show` ='1';";
     $result=mysql_query($query); 
	 while($r=mysql_fetch_array($result))
	{
	  // echo "<a href='download_images_5.php?filename=$r[6]'>Скачать $r[6]</a><br>";
	}
?>