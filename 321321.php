<?php
error_reporting(1);
include "../db_connect.php";

$models_for_output = "2573 2659 2459 1670-1";
$pars=explode (' ',$models_for_output);
foreach ($pars as $tt)
{
 $query="UPDATE `im_catalog` SET  `show` =  '1' WHERE  `nomer_mod` = '".$tt."';";
 $result=mysql_query($query); 
}
echo "ok";


?>