<?php 
 session_start();
 define ("PAGE_IDENTIFY", "private");
 define ("TITLE_WORDS","Lady Style - личный кабинет");
 define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
 define ("KEY_WORDS", "Женская одежда российский производитель оптом в розницу опт розница ростов-на-дону новочеркасск платья юбкии акции скидки");
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/header.php';
if ($check->accepted>0 && $check->level==50) {
    ?>




<div class="row">
<div class="span2">
    
<?php include "sidebar_mngr.php";?>
    
</div>
<div class="span10">
<?php 
include "../im/_class.informator.php";
$anketa = new users();
$anketa->get_user_info($_SESSION['user_uniq']);
//echo $anketa->name."<br>";
//echo $anketa->famil."<br>";
//echo $anketa->otch."<br>";
//echo $anketa->email."<br>";



?> 
    
    
    
<br>
<?php 

    //   $tyty = new orders();
    //   $tyty->get_order($_SESSION['user_uniq']);
?>

<br><h2>Анкеты допущенных клиентов</h2><br>

<table class="table table-bordered table-stripped">
            <thead>
            <th>ФИО</th>
            <th>Адрес</th>
			<th>E-mail</th>
         <!--   <th>ИНН</th>
            <th>ОГРН</th>-->
            <!-- <th>Статус</th> -->
            <th>тел.</th>
			<th>дата</th>
			<th></th>
            </thead>
<?php 


                include "../db_connect.php";
                $query = "SELECT * FROM users WHERE level>0 AND level<10 ORDER BY id DESC";
                $result = mysql_query($query);
                while ($r = mysql_fetch_array($result)) {
                    if ($r[8]=='1') $status='Не одобрен';
					if ($r[8]=='2') $status='Одобрен';
                    echo "<tr>";
                    echo "<td> $r[5] $r[4] $r[6]</td>
                    <td>$r[12]</td>
                    <td>$r[7]</td>
					<!--<td>$r[13]</td>
                    <td>$r[14]</td>-->
                    <!--<td id='x$r[0]'>$status</td>-->
                    <td>$r[15]</td>
					<td>$r[9]</td>
					<td><div class='action_1' id='$r[0]'><i id='$r[0]' class='icon-eye-open icon-white'></i></td>
                                        ";
    echo "</tr>";
                }
?>
    
</table>
    <?php echo $tyty->num_rows;?>
    



    

</div>

</div>

<style>
.action_1{
width: 20px;
text-align: center;
line-height: 22px;
height: 20px;
cursor: pointer;
background-color: green;
border-radius: 10px;
-webkit-box-shadow: 0px 5px 8px -1px rgba(0, 0, 0, 0.75);
-moz-box-shadow: 0px 5px 8px -1px rgba(0, 0, 0, 0.75);
box-shadow: 0px 5px 8px -1px rgba(0, 0, 0, 0.75);
position: relative;
color: white;
}
.action_1:hover{
top: 1px;
background-color: red;
}

</style>
<script>
    //jQuery.noConflict();
$(document).ready(function(){
//Логин
	
	
	
	$('.action_1').click(function(event){
    //$('#content').load($(this).attr('href'));
	//var current_date = $(this).html();
    //alert(current_date);
	var id;
	id = $(this).attr('id');
	//alert(id);
	if (confirm("Удалить пользователя? Восстановление не возможно!")) {
		  
		  	$.ajax({
				type: "POST",		
				async: true,
				cache: false,
				timeout: 2000,
				data: 'id='+id,
				url: "http://www.ladystyle.su/cabinet/ajax_del_user.php",
				success: function(msg){
				alert(msg);
				//$('#'+ident).attr('class','icon-remove');
				//alert(mem);
				location.reload();
				}
			});
		  
		  
		  
		} else {
		 
		}
	//waiting1 = 'sdf';
	/*
	$.ajax({
        type: "GET",		
        async: true,
        cache: false,
        timeout: 2000,
        //data: 'num='+id,
       // url: "<?php echo DIRECT_NAME;?>/cabinet/ajax_file_searcher_mngr.php",
        success: function(msg){
        //if (msg=='busy') busylogin('spaninputli');
		$('.canvas_1').html(msg);
		//alert(msg);
		
        }
    });*/
	//return false; // эквивалентно вызову event.preventDefault(); и event.stopPropagation();
	});
	
	
	







});  
</script>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/template/footer.php';
} else echo "Access denied";
?>
