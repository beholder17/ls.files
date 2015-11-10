<?php 
 session_start();
 //include "../db_class.php";
  //$gallery = new gallery_info();
 //if ($_GET['alias']!=NULL) {$alias = $_GET['alias'];} else if ($alias=='NOT_DEFINED') {}
 /*$alias=$_GET['alias'];
 $gallery->get_gallery_info_by_alias($alias);
 
 $gallery->fulltext;*/
 
 //include_once "_gallery.class.php";

 if ($_GET['alias']!=NULL) 
  {
	$alias = $_GET['alias'];
  }
 else 
  {
	$alias=FALSE;
  }
 
 class gallery_category_info{
 public $id;
 public $name;
 public $description; 
 public $fulltext;
 public $alias;
 public $keywords;
 public $status;
 public $date;
 
 public function get_gallery_info_by_alias($alias)
 {
	$link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("Не могу подключиться");
    mysql_select_db("u0095203_ls", $link) or die ('Не могу выбрать БД');
    mysql_query("SET NAMES utf8");
	$query = "SELECT * FROM gallery_category WHERE `alias`='$alias'";
    $result=mysql_query($query);
    while($r=mysql_fetch_array($result))
        { 
        $this->id=$r[0];
        $this->name=$r[1];
		$this->description=$r[2];
		$this->fulltext=$r[3];
		$this->alias=$r[4];
		$this->keywords=$r[5];
		$this->status=$r[6];
		$this->date=$r[7];
		}
    //    mysql_close($link);    
 }
}

function ekranizator($tmp)
{
	$bodytag = str_replace('"', "'", $tmp);
	return $bodytag;
}

 $gallery_info_container = new gallery_category_info;
 if ($alias!=NULL) 
 {
 $gallery_info_container->get_gallery_info_by_alias($alias);
 $description = $gallery_info_container->description;
 $keywords = $gallery_info_container->keywords;
 $title = $gallery_info_container->name;
 define ("PAGE_IDENTIFY", "gallery");
 define ("TITLE_WORDS","$title");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "$keywords");
 define ("DESCRIPTION", "$description");
 
 } else {$main_gallery_page==1;
 define ("PAGE_IDENTIFY", "gallery");
 define ("TITLE_WORDS","Фотогалерея Российского производителя женской одежды Lady Style");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Фотогалерея, Российский производитель женской одежды, фото одежды Lady Style, фото женской одежды, леди стайл новочеркасск");
 define ("DESCRIPTION", "Фотографии различной тематики от Российского производителя женской одежды Lady Style из новочеркасска");
 }
 
 //$info_art->item_name;
 
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
	if (strrpos($foo, '?alias=', 0)!=FALSE) 
	{
		header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: http://www.ladystyle.su/gallery/$alias"); 
		exit();		
	}
 //получаем url страницы для определения его корректности (modrewrite), в противном случае - 301 редирект - конец
?>
<?php include "../template/header.php"; ?>
<div class="row">
    <div class="span2">
<?php // 
if (isset ($_GET['alias'])) $alias=$_GET['alias']; else $alias=NULL;

include '../db_connect.php';
$query="SELECT * FROM gallery_category WHERE `status` = '1' ORDER BY `date`";
        $result=mysql_query($query);
        echo "<ul class=\"nav nav-list\">";
        while($r=mysql_fetch_array($result))
            { 
            echo "<li><a href='http://www.ladystyle.su/gallery/$r[4]'>$r[1]</a></li>";
           // $category_description=$r[2];
            }
            echo "</ul>";
?>        
        <div class="magenta-strip"></div>
        <?php include "../articles/_bar_category.php"; ?>
		<br><br><br><br><br>		
		
    </div>
    <div class="span10">
        
    
	<!-- Add jQuery library -->
<!--	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>-->

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	


	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();

		});
	</script>


	<h1><?php echo $title;?></h1>
	
	<?php echo $gallery_info_container->fulltext; ?>

	

	
        <p><?php
        $query="SELECT * FROM gallery_category WHERE name='$alias'";
        $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
            { echo $r[2];}
        ?></p>
	
 
                <?php
                
        $query="SELECT * FROM gallery WHERE alias='$alias'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            { ?>
          
			<div><a style='float: left' class="fancybox" href="images/big/<?php echo $r[1];?>" data-fancybox-group="gallery" title="<?php echo ekranizator($r[2]); ?>"><img class='thumbnail' src="images/small/<?php echo $r[1];?>" alt="<?php echo ekranizator($r[2]);?>"/></a>
			<?php
            if ($check->accepted>0 && $check->level==80) { echo "<a id='$r[0]'>Удалить</a>";
          //  
            echo "
            <script>
                   $(document).ready(function(){
        $('#$r[0]').click(function(){
          
                        
$.ajax({
        type: \"POST\",
        async: true,
        cache: false,
        url: \"_del.php\",
        data: \"id=$r[0]&name=$r[1]\",
        success: function(msg){
        alert('Картинка -$r[1]- удалена');
        }
        });
   });
   });
            </script>";
            
            
            }
            echo "</div>";
            }    

                ?>
 
	
	
</div>
</div>
	

<?php include "../template/footer.php"; ?>