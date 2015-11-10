<?php
error_reporting(0);
include "../db_connect.php";

        $query = "SELECT tel FROM users WHERE level='2';";
        $result=mysql_query($query);
        if ($result!=NULL){
        while($r=mysql_fetch_array($result))
            {
			//echo $r[0]."<br>";
            
        mysql_close($link);    
    }}
?>
