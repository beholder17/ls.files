<?php 
	function alias_convertor($alias)
	{	if (!include '../db_connect.php') include 'db_connect.php';
		$alias = urldecode($alias);
		$query = "SELECT * FROM `articles_category` WHERE `name`=\"$alias\"";
		//echo "<script>alert('".$query."');</script>";
        $result=mysql_query($query);        
        while($r=mysql_fetch_array($result))
            {				
				$tmp = $r[3];
			//	echo "<script>alert('1')</script>";
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: http://www.ladystyle.su/articles/by_category/$tmp"); 
				exit();		
			}
		
		if ($tmp==NULL) $tmp=$alias;
		return $tmp;
	}


 
 //$category=sanitize_string($_GET['cat']);
 $alias = sanitize_string($_GET['cat']);
 $alias = alias_convertor($alias);
 //echo "<script>alert(\"--".$alias."\")</script>";
 
 //конструкция для вывода информации в метаданные начало
 if (!include '../db_connect.php') include 'db_connect.php';
         $query = "SELECT * FROM articles_category WHERE `alias`='$alias';";
		 
        $result=mysql_query($query);
        //echo "<h2>$query</h2>";
        while($r=mysql_fetch_array($result))
        {
		 define ("PAGE_IDENTIFY","$r[3]");
		 define ("TITLE_WORDS","$r[1], женская одежда оптом");
		 define ("DESCRIPTION", "Информационные материалы в категории: $r[1] на сайте оптового поставщика женской одежды");
		 define ("KEY_WORDS", "женская одежда, $r[1], опт, для оптовика, информация на сайте");
        }
 //конструкция для вывода информации в метаданные конец
 
 
 //define ("PAGE_IDENTIFY", "articles");
 
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 session_start();
 
 //получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект - начало
function request_url()
{
  $result = ''; // Пока результат пуст
  $default_port = 80; // Порт по-умолчанию
  // А не в защищенном-ли мы соединении?
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    // В защищенном! Добавим протокол...
    $result .= 'https://';
    // ...и переназначим значение порта по-умолчанию
    $default_port = 443;
  } else {
    // Обычное соединение, обычный протокол
    $result .= 'http://';
  }
  // Имя сервера, напр. site.com или www.site.com
  $result .= $_SERVER['SERVER_NAME']; 
  // А порт у нас по-умолчанию?
  if ($_SERVER['SERVER_PORT'] != $default_port) {
    // Если нет, то добавим порт в URL
    $result .= ':'.$_SERVER['SERVER_PORT'];
  }
  // Последняя часть запроса (путь и GET-параметры).
  $result .= $_SERVER['REQUEST_URI'];
  // Уфф, вроде получилось!
  return $result;
}
	$foo = request_url();
	if (strrpos($foo, '?cat=', 0)!=FALSE)
	{
		//$alias = alias_convertor($alias);
		header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: http://www.ladystyle.su/articles/by_category/$alias"); 
		exit();		
	}
	
	

 //получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект - конец
?>
<?php
require_once '../template/header.php';
?>

<div class="row">
    <div class="span2">
	 <?php include "_bar_category.php"; ?>
	</div>

<div class="span8">
        

        
        
        
        
        
<?php
///вывод статей



function sanitize_string($var)
{
    $var = stripslashes($var);
    //$var = htmlentities($var, ENT_COMPAT, 1251);
    $var = strip_tags($var);
    return $var;
}
//$category=sanitize_string($_GET['cat']);
$alias=sanitize_string($_GET['cat']);
function crop_str($string, $limit)  
{
$substring_limited = substr($string,0, $limit);        //режем строку от 0 до limit
return substr($substring_limited, 0, strrpos($substring_limited, ' ' ));    //берем часть обрезанной строки от 0 до последнего пробела
}



        if (!include '../db_connect.php') include 'db_connect.php';
         $query = "SELECT * FROM articles_category WHERE `alias`='$alias';";
        $result=mysql_query($query);
        //echo "<h2>$category</h2>";
        while($r=mysql_fetch_array($result))
            { 
          echo "<p>".$r[2]."</p>";
		  echo "<h1>$r[1]</h1><br>";
        }
        $query = "SELECT * FROM articles WHERE `show`=1 AND `category_alias`='$alias' ORDER BY `date` DESC;";
        
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            { 
        //получаем изображение из статьи - начало		
		$img_thmb=explode('src=',$r[3]);
		$img_thmb=explode ('style=',$img_thmb[1]);
		$img= str_replace ('/image/','/_thumb/image/',$img_thmb[0]);
		$img= str_replace ('"','',$img);		
		//получаем изображение из статьи - конец
		
//            //считаем количество комментов - начало
//            
//        $query_count_responses = "SELECT COUNT(*) FROM responses WHERE alias = '".$r[7]."';";
//        $count_result=mysql_query($query_count_responses);
//        $temp=mysql_fetch_array($count_result);
//        $count_responses=$temp[0];
//        //считаем количество комментов - конец
            $r[3]=strip_tags($r[3]);
            $article_croped = crop_str($r[3], 800);
            echo "<div class=\"articles-show-radius\"><h5><a href=\"".PATH_TO_ROOT."articles/$r[7]\">".$r[1]."</a></h5>";
			//echo $img;
			if ($img!=NULL) echo "<img alt='$r[1]' class='thumbnail' src='$img' style='float: left; margin: 5px;'>";
            echo "
			
			<div style=\"font: 9pt cursive; color: graytext;\"><i class=\"icon-pencil\"></i> Опубликовано: ".$r[4].", автор:  ".$r[6]." | <i class=\"icon-folder-close\"></i> Категория: $r[8]</div>";

           // echo "<div style=\"margin: 2px 8px 0px 0px; width: 70px; height: 70px; float: left; background-color: black; border: 2px gray solid;\">.</div>";
            echo "<p> ".$article_croped."...";
            echo "</p>
            <div style=\"padding-right: 4%; alignment-adjust: right; text-align: right;\"><h6><a href=\"".PATH_TO_ROOT."articles/$r[7]\">Читать полностью...</a></h6></div>
            </div>";
            }    
        
?>
        
        
        
        
        
        

      
        





</div>
    <div class="span2">
	 
       <?php include "../_right_bar.php"; ?>
   
    </div>
    </div>
<?php
include_once '../template/footer.php';
?>


     










