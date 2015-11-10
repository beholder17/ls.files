<!--Ajax авторизация-->
<!--<script src="http://www.ladystyle.su/js/jquery.js"></script>-->
<script>
    $(document).ready(function(){
             
        $('#auth_button').click(function(){
            li=$("form input[name=li]").val(); //получение данных из формы
            pw=$("form input[name=pw]").val();
			//checkbox=$("form input[name=checkbox]").val();
			if($("#checkbox").is(":checked"))
			{
			checked = 1;
			} else {
			checked = 0;
			}
			
			
            $('#auth_canvas').html(' ');
			//alert('debug: '+checked);
            $.ajax({
                type: "POST",
                url: "http://www.ladystyle.su/auth/welcome-auth.php",
                data: "li="+li+"&pw="+pw+"&checkbox="+checked,
                success: function(msg){
                    $('#auth_canvas').html(msg);
					//alert('debug: fin');
                }
            }); 
        }
    )
                                         
    }
); 
</script>
<?php
//echo $check->accepted."<<<<";
if ($check->accepted == '')
    echo '<div class="pull-right"><a href="#myModal_auth" role="button" class="btn" data-toggle="modal">Вход</a></div>';
if ($check->accepted == '1')
    echo '<div class="pull-right">Здравствуйте,' . $check->name . ' <a href="http://www.ladystyle.su/auth/exit.php" role="button" class="btn"><i class="icon-lock"></i> Выход</a></div>';
?>


<?php //<div class="modal hide fade out" style="width: 400px;" id="myModal_auth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"> ?>
<div class="modal hide fade out" style="width: 400px;" id="myModal_auth" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <!--<h3 id="myModalLabel_auth">Представьтесь, пожалуйста</h3>-->
		<div id="myModalLabel_auth">Представьтесь, пожалуйста</div>
    </div>
    <div class="modal-body_auth">
        <?php
        $form = file_get_contents('http://www.ladystyle.su/auth/form.php');
        echo $form;		
        ?>

    </div>
    <div class="modal-footer_auth">
        <!--    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>-->
			
    </div>
</div>

