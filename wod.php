<?php
include "../db_connect.php";
 //$query = "SELECT * FROM im_catalog WHERE `show`='1' AND nomer_mod LIKE '$artparts[0]%'"; 
 $query = "SELECT * FROM `im_catalog` WHERE `description`='' AND `show`=1";
                $result=mysql_query($query);
                //$numrows_such=mysql_num_rows($result);
                //if ($numrows_such>1){
					while($r=mysql_fetch_array($result))
                    {
                        echo "<a href='http://www.ladystyle.su/im/details/any/usual/$r[8]'><img src='http://www.ladystyle.su/im/image/80/$r[6]' alt='$r[2]' style='width: 43px; height: 100px'></a>";
                    }
                     


?>