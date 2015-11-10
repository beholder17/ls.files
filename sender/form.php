<?php

function counter_winter() {
    include "db_connect.php";
//$query_count = "SELECT COUNT(*) FROM im_catalog WHERE `category`='$name';";
    $query_count = "SELECT DISTINCT COUNT(*) FROM sender WHERE `send`='1';";
    $result_count = mysql_query($query_count);
    $row = mysql_fetch_row($result_count);
    mysql_close($link);
    return $row[0];
}
?>

<div style="text-align: center; margin-top: 20px; padding-top: 20px; height: 240px; border: 4px #EC008C double;">
    <div id="senderformcontent">    
        <form name="45454" action="54" method="POST">
            <p>Будте в курсе обновлений модельного ряда,<br> акций и скидок!</p>
            <input id="email" type="text" placeholder="Ваш e-mail">
            <p><button id="click" class="btn btn-large" type="button"><i class="icon-envelope"> </i> Подписаться</button></p>
        </form>
        <?php echo "<h4>Подписчиков: " . counter_winter() . "</h4>"; ?>
        <p>Никакого спама!<br></p>
        <h7>Отписаться можно в один клик :)</h7>
    </div>
</div>


<script src="http://bootstrap.veliovgroup.com/assets/js/jquery.js"></script>
<script>
    $(document).ready(function(){
    
        $("#click").click(function(){
            $val=$('#email').val(); 
            var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
            if ($val.search(pattern)==0)
            {
                $.ajax({
                    type: "POST",
                    url: "sender/_write_subscriber.php",
                    data: "email="+$val,
                    success: function(msg){
                        $("#senderformcontent").html(msg);
                    }
                });
        
            }
            else alert('Вы указали некорректный e-mail');
        
    
        }
    ); 
                                        
    }
                           
);
                            
</script>
