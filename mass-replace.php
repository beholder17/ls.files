<?php
error_reporting(1);
include "../db_connect.php";

$models_for_output = "1834 1869 1000 1395 1669 1703 1716 1908 1961 1976 1983 2050 2146 2191 2201 2224 2248 2351 2379 2459 2477 2496 2624 2633 2670 2782 2806 2832 2840 2510 2518 2519 2520 2524 2526 2527 2529 2538 2559 2566 2911 2912 2913 2924 2885 2888 2567 2615 2946 2957 3026 3066";
$pars=explode (' ',$models_for_output);
foreach ($pars as $tt)
{
 $query="UPDATE `im_catalog` SET  `show` =  '1' WHERE  `nomer_mod` like '".$tt."%';";
 $result=mysql_query($query); 
 //$q++;
 //echo $q."<br>";
}
echo "ok";
/*function write_to_db($art,$price)
{
 $query="UPDATE `model` SET  `price-opt` =  '".$price."' WHERE  `nomer_mod` = '".$art."';";
 $result=mysql_query($query);
}*/
/*$models=explode (' ',$models_for_output);
foreach ($models as $val)
{
   unshownfunc($val);
}
echo 'end';
*/
/*
function unshownfunc($val2)
{
  $query="UPDATE `model` SET  `show` =  '0' WHERE  `nomer_mod` = '".$val2."';";
 // echo $query.'<br>';
  
}

function output_models($query,$category,$models_for_output)
{
$one_model = explode(" ", $models_for_output);
//echo count($one_model)+1;
$query="SELECT * FROM `model` WHERE (";
foreach ($one_model as $a)
   {  $rere=explode("+",$a);
     $query = $query."`nomer_mod` LIKE  '".$rere[0]."' OR ";
    //e=$rere[1];
	$dasprice['price'][$rere[0]]=$rere[1];
	//$_SESSION ['tiu']=$dasprice;
	//echo $_SESSION ['tiu'];
   }
$query = substr($query, 0, strlen($str)-3);
//$query = $query.") AND (`name`='$category') AND (`show`=1);";
//$query = $query.") ORDER BY `price-99` ASC;";
$query = $query.");";
//echo $query;





//echo "<div style='width: 100%'>";

$result=mysql_query($query);
while($r=mysql_fetch_array($result))
   {
	echo " 
	
	<div style=\"height: 250px; width: 300px; border:1px solid #F2F2F2; float: left; padding: 3px; margin: 5px; background-image: url('../image/info_block_bg.jpg'); background-position: bottom; background-repeat: repeat-x; background-color: white; display: inline; \">
 
       <p><a href='details.php?nomer_mod=$r[2]'><img border=0  style='margin-right: 5px' src=$r[8] width=100 align=left></a></p>
	   
	   ";
	   
	   /*if ($r[13]==0) 
	   echo "<div style=\"height: 129px; width: 129px; overflow: auto;  background-image: url('saled.png'); background-repeat: no-repeat; position: relative; top: -7px; left: -111px; margin-bottom: -129px;\"></div>";
	   */
	/*   $r[1]=str_replace('Блузка','Bluse',$r[1]);
	   $r[1]=str_replace('Жакет','Blaser',$r[1]);
	   $r[1]=str_replace('Юбка','Rock fur Damen',$r[1]);
	   $r[1]=str_replace('Брюки','Hose fur Damen',$r[1]);
	   $r[1]=str_replace('Платье','Kleid',$r[1]);
	   $r[1]=str_replace('Сарафан','Kleid',$r[1]);
	   $r[1]=str_replace('Жилет','Weste',$r[1]);
	   echo "
	   $r[1]<br /><br />
	   Model: $r[2]<br /><br />
   	   ";
   	   if ($r[4]!=NULL || $r[4]!='') {
	   //перевод размеров
//	   echo "Sizes: $r[4]<br /><br />\n";
	   $sizes=explode (' ',$r[4]);
	   echo "Sizes: ";
	   foreach($sizes as $tt){
	   $tt=$tt-6;
	   echo $tt.' ';
	   }
	   echo '<br>';
	   
	   }
	  // echo "Состав:<br /> $r[5]<br /><br />";
	   if ($r[10]==6) {echo "Дата выхода: <br /><b>$r[14]</b><br><br />";}
   	   if ($r[10]==7) {echo "<b>$r[14]</b><br /><br>";}
	   $r[5]=str_replace('Эластан','Elastan',$r[5]);
	   $r[5]=str_replace('Вискоза','Viskose',$r[5]);
	   $r[5]=str_replace('Шерсть','Wolle',$r[5]);
	   $r[5]=str_replace('Полиэстер','Polyester',$r[5]);
	   $r[5]=str_replace('Хлопок','Baumwolle',$r[5]);
	   $r[5]=str_replace('Лавсан','Polyester',$r[5]);
	   $r[5]=str_replace('Полиамид','Polyamid',$r[5]);
	  // $r[5]=str_replace(' ','',$r[5]);
	   //echo "<small>".$r[5]."</small><br><br>";
	   echo $r[5]."<br><br>";
       //if ($r[15]!=0) {if ($r[15]!=NULL OR $r[15]!=0) { $temp=$r[15]+1; echo "Количество фото: $temp"."шт.<br /><br />";}}
       //отображаем цены - начало
       		////если цена указана
  /*	   if ($r[16]!=NULL OR $r[16]!=0)
  	     {
  	     	//если пользователь - розничник
  	     	if ($_SESSION['s_level']==1 OR $_SESSION['s_level']==3 OR $_SESSION['s_level']==100)
  	     	 {
  	     	   echo "Розничная цена: <b>$r[16] руб.</b><br><br>";
  	     	 }
  	   	 }*/
	/*	if (isset($dasprice['price'][$r[2]])) {echo "Preis: <b>".$dasprice['price'][$r[2]]." EUR</b><br><br>";}
		
      echo "
	  	  
	  </div>\n";
   }

}*/

?>