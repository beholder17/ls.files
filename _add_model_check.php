<?php
include "../db_connect.php";
$nomer_mod=$_POST['nomer_mod'];
     $query = "SELECT * FROM im_catalog WHERE nomer_mod LIKE '$nomer_mod%'"; 
                $result=mysql_query($query);
                while($r=mysql_fetch_array($result))
                    {
                        echo "<a href='details.php?art=$r[8]'><img src='image/80/$r[6]' alt='$r[2]' width=43px height=100px></a><br>";
                    }
                    
?>
Это все модели
