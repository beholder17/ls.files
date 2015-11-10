<?php
error_reporting(1);
include "../db_connect.php";
include "_class.informator.php";

$models_for_output = "1034 1039 1224 1273 1289 1305 1460 1502 1693 1803 1933 1948 1958 2114 2191 2299 2311 2321 2362 2373 0841 0942 1005 1100 1471 1512 2324 2328 2470";
$pars=explode (' ',$models_for_output);
foreach ($pars as $tt)
{
 $status = new informator();
 $status->model_existence($tt);
 echo "<div style='color: brown;'><b>model_existence - $status->model_existence</b></div> - ";
 echo "<div style='color: green;'><b>num_rows_model - $status->num_rows_model</b></div><br>";
 if ($status->model_existence == 0) $state  = "Модель скрыта";
 if ($status->model_existence == 1) $state  = "Модель на сайтe";
 //if (($status->model_existence > 0) OR ($status->model_existence < 0) ) $state  = "";
 if ($status->model_existence == NULL) $state  = "<div style='color: red; font-size: 16pt;'>Модели нет в БД сайта</div>";
 
 if ($status->num_rows_model>1) $state = $state." - вариаций: ".$status->num_rows_model." шт.";
 
 unset($status->model_existence);
 unset($status->num_rows_model);
 
 $query="UPDATE `im_catalog` SET  `show` =  '1' WHERE `nomer_mod` like '".$tt."%';";
 echo "<h3>".$query."</h3>";
 $result=mysql_query($query); 
 $ttt=mysql_affected_rows();
 if ($ttt==0) echo "<div style='color: red'>not affected: $tt</div> - $state<br>";
 if ($ttt==1) echo "<div style='color: green'>showned: $tt</div> - $state<br>";
 //$q++;
 echo "<hr>";
 unset ($status);
}
echo "<br><br>done";
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