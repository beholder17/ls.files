<h4 style="text-decoration: underline;">Последние статьи</h4>



<?php
error_reporting(0);
///вывод статей
function crop_str($string, $limit)  
{
$substring_limited = substr($string,0, $limit);        //режем строку от 0 до limit
return substr($substring_limited, 0, strrpos($substring_limited, ' ' ));    //берем часть обрезанной строки от 0 до последнего пробела
}


        if (!include '../db_connect.php') include 'db_connect.php';
        $query = "SELECT * FROM articles WHERE `show`=1 ORDER BY `date` DESC LIMIT 6;";
        
        $result=mysql_query($query);
        define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
        while($r=mysql_fetch_array($result))
            { 
            $r[3]=strip_tags($r[3]);
            $article_croped = crop_str($r[3], 300);
            echo "<div class=\"articles-show-radius\"><h5><a href=\"".PATH_TO_ROOT."articles/$r[7]\">".$r[1]."</a></h5>";
            echo "<div style=\"font: 9pt cursive; color: graytext;\"><i class=\"icon-pencil\"></i> Опубликовано: ".$r[4]." | <i class=\"icon-folder-close\"></i> $r[8]</div>";

           // echo "<div style=\"margin: 2px 8px 0px 0px; width: 70px; height: 70px; float: left; background-color: black; border: 2px gray solid;\">.</div>";
            echo "<p> ".$article_croped."...";
            echo "</p>
            <div style=\"padding-right: 4%; alignment-adjust: right; text-align: right;\"><a href=\"".PATH_TO_ROOT."articles/$r[7]\">Читать полностью...</a></div>
            </div>";
            }    
        
?>