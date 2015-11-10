<?php
error_reporting(0);
require_once 'simpleimage.class';

 $blacklist = array(".php", ".phtml", ".php3", ".php4", ".txt", ".doc", ".docx", ".xls", ".xml", ".xlsx", ".avi", ".exe", ".com", ".bat", ".ini", ".gif");

 foreach ($blacklist as $item) {

  if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {

   echo "Не верный формат файла! Вы можете выбрать только картинку в формате jpeg, png!\n";

   exit;

   }

  }

  $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);

 if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg') {

  if ($_FILES['userfile']['error']=='4') echo "Извините, но только jpeg и gif файлы\n";

  if ($_FILES['userfile']['error']=='1') echo "Слишком большой файл!";

  if ($_FILES['userfile']['error']=='0') echo "Файл загружен!";

  exit;

 }

 



  $uploaddir = 'image/600/';

  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

  

  

  

  

  

  

  

  

  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

   //echo "Файл загружен.\n</br><a href=\"backend.php?new_pic=".$_FILES['userfile']['name']."\">ggfhfghfgho</a>";

   //echo "<a href=\"backend.php?new_pic=".$_FILES['userfile']['name'].">ggfhfghfgho</a>dfgfdg";

  // echo "dsfsdfjsdhfhsdhsjhfjkshfjhsf";



 //меняем регистр на мелкий т.к. simpleimage не переваривает .JPG

$_FILES['userfile']['name']=mb_convert_case($_FILES['userfile']['name'], MB_CASE_LOWER);   



$img = new SimpleImage('image/600/'.$_FILES['userfile']['name']);





$img->best_fit(250, 562)->save('image/'.$_FILES['userfile']['name']);

$img->best_fit(80, 180)->save('image/80/'.$_FILES['userfile']['name']);

  

  } else {

   echo "File uploading failed.\n";

  }

  

  

  

    $id=$_POST['id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $show=$_POST['show'];
    $nomer_mod=$_POST['nomer_mod'];
    $content=$_POST['content'];
    $season=$_POST['season'];
    $rost=$_POST['rost'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $size=$_POST['size'];
    $such=$_POST['such'];
    $promo=$_POST['promo'];
    $image=$nomer_mod.".jpg";
    $height=$_POST['height'];
    //$date=date("Y-m-d");
    //$date=date("2014-10-23");
	//$date=date("2013-12-15");
	$date=date("2015-06-08");
    $promo=0;
    include "../db_connect.php";
    $query="INSERT INTO `im_catalog` VALUES (NULL,'$category','$name','$description','$price',NULL,'$image','$show','$nomer_mod','$content','$season','$rost','$size','$date','0','$promo','$height')";
    //$query="UPDATE `im_catalog` SET  `name` =  '$name', `description` =  '$description', `show` =  '$show', `price` =  '$price', `nomer_mod` =  '$nomer_mod', `content` =  '$content', `season` =  '$season', `rost` =  '$rost', `size` =  '$size', `promo` =  '$promo' WHERE  `id` =$id;";
  //  echo $query;
    $result=mysql_query($query);
    mysql_close($link); 
  
  //echo $category;

  //echo "<a href=\"backend.php?new_pic=".$_FILES['userfile']['name'];
    /*  echo "<script>
                    window.location = 'http://www.ladystyle.su/gallery/_add.php?image=".$_FILES['userfile']['name']."'
                    </script>"; */
?>