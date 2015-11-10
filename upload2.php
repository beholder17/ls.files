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

  echo "Загружено";

  } else {

   echo "File uploading failed.\n";

  }

  

  

  

  //echo $category;

  //echo "<a href=\"backend.php?new_pic=".$_FILES['userfile']['name'];
//      echo "<script>
//                    window.location = 'http://127.0.0.1/ls2013/gallery/_add.php?image=".$_FILES['userfile']['name']."'
//                    </script>"; 
?>





