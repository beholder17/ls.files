<br>
<h4 style="text-decoration: underline;">Последние отзывы</h4>
<br>


<?php
error_reporting(0);
//define ("PATH_TO_ROOT", "http://127.0.0.1/ls2013/");
        if (!include '../db_connect.php') include 'db_connect.php';
        $query = "SELECT * FROM opinion WHERE `show`=1 ORDER BY `date` DESC LIMIT 5;";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            echo "<div class=\"articles-show-radius\"><h5><a href=\"opinion/\">".$r[1]." - ".$r[2]."</a></h5>";
            echo "<p> ".$r[3];
            echo "</p>";
            echo "</div>";
            }
            
        
?>
<a href="opinion/">Оставьте свой отзыв</a>