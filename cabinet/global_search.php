<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","Lady Style поиск");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "");
?>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 ) {
    ?>




<div class="row">
<div class="span2">
    
<?php include "sidebar_mngr.php";?>
    
</div>
<div class="span10">
<h1>Поиск моделей</h1>
<br>



	<input id="show_mode2" type="radio" name="show_mode" value="2" checked>Показывать все<Br>
	<input id="show_mode0" type="radio" name="show_mode" value="0">Только скрытые<Br>
	<input id="show_mode1" type="radio" name="show_mode" value="1">Только опубликованные<Br>
<div class='reset_line'></div>

<?php
if (!include '../db_connect.php') include 'db_connect.php';
$date="2014-10-23";
$date_sec="2014-12-15";
$date_sec_2="2015-02-02";
/*$date_sec="2014-04-24";
$date2="2014-07-13";
$date3="2014-08-11";*/
echo "<h3>Фотосессии</h3><br>";
$query = "SELECT DISTINCT `date` FROM `im_catalog` ORDER BY `date` DESC";
//         SELECT DISTINCT name FROM driver_log ORDER BY name;
        $result=mysql_query($query);
        //define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
        while($r=mysql_fetch_array($result))
            {
			echo "<div class='date_item'>".$r[0]."</div>";
			}
?>
<div class='reset_line'></div>
<input id="nomermod" type="text" name="nomer_mod" value="" /><br>
<div class='reset_line'></div>		
<div class='canvas_1'></div>
<?php




  

?>
<style>
	.unshown_item{
width: 80px;
height: 180px;
float: left;
margin: 9px;
font-size: 11px;
border: 1px solid lightgray;
border-radius: 5px;
}
.unshown_item_img{
	
}
.unshown_item_caption{
	background-color: white;
	width: 40px;
	height: 20px;
	text-align: center;
	padding-left: 6px;
	position: relative;
	top: -20px;
	opacity: 0.9;
	color: white;
}

.date_item{
	float: left;
	width: 76px;
	height: 30px;
	background-color: lightgray;
	margin: 2px;
	font-size: 11px;
	text-align: center;
	line-height: 32px;
	cursor: pointer;
	border-radius: 3px;
}
	
.date_item:hover{
	color: white;
	background-color: gray;
}
	
.reset_line{
	display: inline-block;
	color: red;
	width: 100%;
}

.canvas_1{
	//background-color: lime;
	width: 100%;
	

}
.show_or_not_icon{
	width: 3px;
	height: 10px;
	position: relative;
top: -201px;
left: 64px;
cursor: pointer;
display: inline;
}

.opacity1{
opacity: 1;
}
.opacity0{
opacity: 0.6;
}
</style>







    



<script>
    //jQuery.noConflict();
$(document).ready(function(){
//Логин
	
	
	
	$('.date_item').click(function(event){
    //$('#content').load($(this).attr('href'));
	var current_date = $(this).html();
    //alert(current_date);
	var mode;
	//$('#show_mode1').setAttr('checked')
	if (($('#show_mode1').prop('checked')) == true) mode=1;
	if (($('#show_mode0').prop('checked')) == true) mode=0;
	if (($('#show_mode2').prop('checked')) == true) mode=2;
	waiting = "<img src='http://www.ladystyle.su/template/ajax-loaderw.gif'>";
	waiting1 = 'sdf';
	$('.canvas_1').html(waiting);
	$.ajax({
        type: "GET",		
        async: true,
        cache: false,
        timeout: 2000,
        data: 'date='+current_date+'&mode='+mode,
        url: "<?php echo DIRECT_NAME;?>/cabinet/ajax_file_searcher_mngr.php",
        success: function(msg){
        //if (msg=='busy') busylogin('spaninputli');
		$('.canvas_1').html(msg);
		//alert(msg);
		
        }
    });
	//return false; // эквивалентно вызову event.preventDefault(); и event.stopPropagation();
	});
	
	
	

	
$("#nomermod").blur(function(){
        $val=$('#nomermod').val();       
        $.ajax({        
        type: "POST",
        url: "http://www.ladystyle.su/cabinet/ajax_search_one_model.php",
        data: "nomer_mod="+$val,
        success: function(msg){       
           $(".canvas_1").html(msg);
        }
        });
                                    }
                        ); 





});  
</script>

    

</div>

</div>





<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
