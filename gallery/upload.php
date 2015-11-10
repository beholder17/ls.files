<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
error_reporting(0);
if ($check->accepted==1 && $check->level==80) {
require_once 'simpleimage.class'; 
$blacklist = array(".php", ".phtml", ".php3", ".php4", ".txt", ".doc", ".docx", ".xls", ".xml", ".xlsx", ".avi", ".exe", ".com", ".bat", ".ini", ".gif"); 
foreach ($blacklist as $item) 
{
	if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) 
	{   
		echo "Не верный формат файла! Вы можете выбрать только картинку в формате jpeg, png!\n";   
		exit;   
	}  
} 
$imageinfo = getimagesize($_FILES['userfile']['tmp_name']); 
if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg') 
{
if ($_FILES['userfile']['error']=='4') echo "Извините, но только jpeg и gif файлы\n";  
if ($_FILES['userfile']['error']=='1') echo "Слишком большой файл!";  
if ($_FILES['userfile']['error']=='0') echo "Файл загружен!";  exit; 
}
$uploaddir = 'images/big/';  
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);                  
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
{   
echo "Файл загружен.\n</br><a href=\"_add.php?new_pic=".$_FILES['userfile']['name']."\">Редактирование тэгов изображеня</a>";   
echo "<a href=\"backend.php?new_pic=".$_FILES['userfile']['name'].">ggfhfghfgho</a>dfgfdg";  
echo "dsfsdfjsdhfhsdhsjhfjkshfjhsf"; //меняем регистр на мелкий т.к. simpleimage не переваривает .JPG$_FILES['userfile']['name']=mb_convert_case($_FILES['userfile']['name'], MB_CASE_LOWER);   
$img = new SimpleImage('images/big/'.$_FILES['userfile']['name']);
$img->best_fit(950, 950)->save('images/big/'.$_FILES['userfile']['name']);
$img->best_fit(950, 950)->square_crop(150)->save('images/small/'.$_FILES['userfile']['name']);    
} else {   echo "File uploading failed.\n";  }          
echo "<a href=\"backend.php?new_pic=".$_FILES['userfile']['name']."stra</a>";      
//echo "<script> window.location = 'http://127.0.0.1/ls2013/gallery/_add.php?image=".$_FILES['userfile']['name']."'</script>";
} else echo "access denied";
?>