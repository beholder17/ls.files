<?php 
 session_start();
 define ("PAGE_IDENTIFY", "gallery");
 define ("TITLE_WORDS","Сертификаты соответствия и прочие на продукцию ООО 'Леди Стайл'");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "сертификаты соответствия, сертификаты на продукцию, сертифицированная женская одежда, сертификаты ооо леди стайл");
 define ("DESCRIPTION", "В данном разделе представлены сертификаты соответствия и иные сертификаты, свидетельствующие о качестве продукции и о соответствии ее установленным в РФ и ТС стандартам");
?>
<?php include "../template/header.php"; ?>
<div class="row">
    <div class="span2">
<?php // 
if (isset ($_GET['category'])) $category=$_GET['category']; else $category='Показ "Модные пятницы"';

include '../db_connect.php';
$query="SELECT * FROM gallery_category WHERE `status` = '1' ORDER BY `date`";
        $result=mysql_query($query);
        echo "<ul class=\"nav nav-list\">";
        while($r=mysql_fetch_array($result))
            { 
            echo "<li><a href='gallery_detail.php?alias=$r[4]'>$r[1]</a></li>";
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


	<h1>Сертификаты ООО "Леди Стайл"</h1>
	
	

	

	
        <?php
		
		 /*function get_img_filename($alias,$offset)
		 {
			$query = "SELECT * FROM gallery WHERE `alias`='$alias' AND `show`='1' LIMIT $offset,1";
				$result=mysql_query($query);
				while($r=mysql_fetch_array($result))
					{
					echo $r[1];
					}
		 }*/
		 
		 function get_img($alias,$offset)
		 {
			$query = "SELECT * FROM gallery WHERE `alias`='$alias' AND `show`='1' LIMIT $offset,1";
				$result=mysql_query($query);
				while($r=mysql_fetch_array($result))
					{
					echo $r[1];
					}
		 }
		 
		 function get_img_count($alias)
		 {
			$query = "SELECT COUNT(*) FROM gallery WHERE `alias`='$alias' AND `show`='1';";
				$result=mysql_query($query);
				while($r=mysql_fetch_array($result))
					{
					$counter = $r[0];
					}
				if ($counter>14) $counter=14;
				return $counter;
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
		
		
		

        ?>
	
 
<!--		<a class="fancybox" href="images/big/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/small/1_s.jpg" alt="" /></a>

		<a class="fancybox" href="images/big/2_b.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="images/small/2_s.jpg" alt="" /></a>

		<a class="fancybox" href="images/big/3_b.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images/small/3_s.jpg" alt="" /></a>

		<a class="fancybox" href="images/big/4_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno"><img src="images/small/4_s.jpg" alt="" /></a>-->
                <?php
                
        $query="SELECT * FROM gallery WHERE alias='cerificates'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            { 
            echo "<div><a style='float: left' class=\"fancybox\" href=\"images/big/$r[1]\" data-fancybox-group=\"gallery\" title=\"$r[2]\"><img class='thumbnail' src=\"images/small/$r[1]\" alt=\"Сертификат соответствия\" /></a>";
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