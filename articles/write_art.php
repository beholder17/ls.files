<?php

include "../db_connect.php";
//echo "<script>alert('345');</script>";
$text=$_POST['editor1'];
$title=$_POST['title'];
$category=$_POST['cat'];
$author=$_POST['author'];
$keywords=$_POST['keywords'];
$subtitle=$_POST['subtitle'];
//$category=$_POST['category'];
$category_alias_tmp=explode(' :: ',$category);
$category=$category_alias_tmp[0];
$category_alias=$category_alias_tmp[1];
//echo "<script>alert('".$category_alias."');</script>";
//$author=$_POST['author'];
$alias=$_POST['alias'];
$time=date("Y-m-d");
//echo $title."<hr>".$subtitle." - ".$time."<hr>".$text."<br>";

//$query = "INSERT INTO `u0095203_ls`.`articles` (`id`, `title`, `subtitle`, `text`, `date`, `show`, `author`, `alias`, `Category`,`keywords`,`category_alias`) VALUES (NULL,'".$title."','".$subtitle."','".$text."','".$time."','1','".$author."','".$alias."','".$category."','".$keywords."','".$category_alias."');";
echo $query;
//$time=date("Y-m-d");
if($_POST['elm1'] != '') 
    {
$query = "INSERT INTO articles VALUES (NULL,'".$title."','".$subtitle."','".$text."','".$date."','1');";

if(mysql_query($query)) {  header("Location: index.php");}

 }
 else {echo "<a href=\"index.php\">назад</a>";  };
 //INSERT INTO `u0095203_ls`.`articles` (`id`, `title`, `subtitle`, `text`, `data`, `show`, `author`, `alias`) VALUES (NULL, '
 $query = "INSERT INTO `u0095203_ls`.`articles` (`id`, `title`, `subtitle`, `text`, `date`, `show`, `author`, `alias`, `Category`,`keywords`,`category_alias`) VALUES (NULL,'".$title."','".$subtitle."','".$text."','".$time."','1','".$author."','".$alias."','".$category."','".$keywords."','".$category_alias."');";
 //echo $query;
 
 mysql_query($query);
 mysql_close($link);
?>
<script>
alert ('Статья добавлена');
window.location = "http://www.ladystyle.su/";
</script>