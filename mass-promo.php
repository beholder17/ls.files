<?php
error_reporting(1);
include "../db_connect.php";

$models_for_output = "2347*750 1853*750 2035*750 2066*650 0914*450 2040*750 2010*750 1659*850 1146*750 2059*850 1590*850 1341*450 1839*450 0870*450 2150*750 1713*750 0795*650 1172*450 0720*450 0838*450 1034*350 2235*850 1816*650 1190*450 2268*1200 0395*90 0289*90 1211*250 0757*450 0655*450 1722*450 1617*450 1637*450 0862*950 1234*750 0717*450 2168*800 0669*350 2307*800 0716*550 1670*550 1012*350 1236*350 1899*950 1817*800 1510*800 2003*800 1978*800 1377*800 1938*800 2079*800 2024*800 2015*800 2033*1200 2034*1200 2026*1200 2004*800 1954*800 1309*800 2009*650 1909*800 0777*300 0797*300 0918*800 1152*500 1196*500 1209*500 1224*500 1341*500 1365*250 1437*350 1481*350 1557*950 1618*500 1628*350 1663*900 1686*350 1710*500 1793*850 1794*550 1900*550 1990*550 2036*900 2037*900 2337*750 2536*950 2266*750 0530*200 0867*200 0215*200 1697*400 2235*880 1575*350 1275*250 1981*550 1615*550 1523*250 1879*500 0385*200 2120*150 1501*600 0341*200 1466*800 1010*400 2557*1000 1826*1250 2299*880";
$pars=explode (' ',$models_for_output);
foreach ($pars as $tt)
{
 //$query="UPDATE `im_catalog` SET  `season` =  'Весна-лето' WHERE  `nomer_mod` = '".$tt."';";
 //$result=mysql_query($query); 
 //$q++;
 //echo $q."<br>";
 $ht=explode ('*',$tt);
 write_to_db($ht[0],$ht[1]);
// echo "модель: ".$ht[0]."price: ".$ht[1]."<br>";
}
echo "<br><br><br>__ok";
function write_to_db($art,$price)
{
 $query="UPDATE `im_catalog` SET  `price_new` =  '".$price."', `promo`='4',`show`='1' WHERE `nomer_mod` like '".$art."%';";
 
 $result=mysql_query($query);
 echo $query."<br>";
}
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