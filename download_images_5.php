<?php
$filename = $_GET['filename'];
 
 // нужен для Internet Explorer, иначе Content-Disposition игнорируется
if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
$file_extension = strtolower(substr(strrchr($filename,"."),1));
 $filename=urldecode($filename);
 echo $filename;
 readfile("$filename");
 echo "<script>alert('".$filename."');</script>";
 $filename = "http://www.ladystyle.su/im/image/600/".$filename;
 echo "<script>alert('".$filename."');</script>";
if( $filename == "" )
{
          echo "ОШИБКА: не указано имя файла.";
          exit;
} elseif ( ! file_exists( $filename ) ) // проверяем существует ли указанный файл
{
          echo "ОШИБКА: данного файла не существует.";
          exit;
};
switch( $file_extension )
{
          case "html": $ctype="application/html"; break;
          default: $ctype="application/force-download";
}
header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // нужен для некоторых браузеров
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); // необходимо доделать подсчет размера файла по абсолютному пути
readfile("$filename");
exit();
?>