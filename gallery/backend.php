<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <title></title>
       <script type="text/javascript" src="js/jquery.js"></script>
       <script type="text/javascript" src="js/calendar.js"></script>
        <script>
            $(document).ready(function(){
                $('.action-write').click(function(){
                    window.location.reload();                    
                                                }
                                    )
                    $('#action-empty').click(function(){
                    //alert('Добавляем новый элемент в галерею');
                        $.ajax({
                                type: "POST",
                                url: "edit.php",
                                data: "action=add",
                                success: function(msg){
                                $('#string-empty').html(msg);
                                                    }
                                }); 
                                                }
                                    )                         
                                        }
                            ); 
          </script>
    </head>
    <body>
        <?php
          require_once "../db_connect.php";       
        ?>
        <br><a href="frontend.php">Перейти к фотогалерее :)</a><br>
        Добавление картинок
     <form name="upload" action="upload.php" method="POST" ENCTYPE="multipart/form-data">
         Select the file to upload: <input type="file" name="userfile">
         <input type="submit" name="upload" value="upload">
     </form>
        
<?php   
//$new_pic=$_GET['new_pic'];
    function build_empty_string()
    {
        echo "<div class=\"string\" id=\"string-empty\">
            <div class=\"cell\" id=\"id-empty\"></div>
            <div class=\"cell\" id=\"photo-empty\"></div>
            <div class=\"cell\" id=\"text-empty\"></div>
            <div class=\"cell\" id=\"date-empty\"></div>
            <div class=\"cell\" id=\"show-empty\"></div>
            <div class=\"cell\" id=\"pict-empty\"></div>            
            <div class=\"action\" id=\"action-empty\">Edit</div>
        </div>";  
    }

class galleryelement
{
    public $id="";
    public $photo="";
    public $text="";
    public $date="";
    public $show="";
 
    
    public function buildstringtop()
    {
        echo "<div class=\"string\">
            <div class=\"cell\">id</div>
            <div class=\"cell\">photo</div>
            <div class=\"cell\">text</div>
            <div class=\"cell\">data</div>
            <div class=\"cell\">show</div>
            <div class=\"cell\">pict</div>            
        </div>";
    }


    public function buildstring()
    {
        echo "<div class=\"string\" id=\"string-".$this->id."\">
            <div class=\"cell\" id=\"id\">".$this->id."</div>
            <div class=\"cell\" id=\"photo\">".$this->photo."</div>
            <div class=\"cell\" id=\"text\">".$this->text."</div>
            <div class=\"cell\" id=\"date\">".$this->date."</div>
            <div class=\"cell\" id=\"show\">".$this->show."</div>
            <div class=\"cell\" id=\"pict\"><img width=190px height=190px src='images/small/".$this->photo."'></div>            
            <div class=\"action\" id=\"action-".$this->id."\">Edit</div>
        </div>";  
    }
    
}

 




$query = "SELECT * FROM gallery;";
$result=mysql_query($query);
echo "<div id=\"container-editor-table\">";
echo "<div class=\"string\">
            <div class=\"cell\">id</div>
            <div class=\"cell\">photo</div>
            <div class=\"cell\">text</div>
            <div class=\"cell\">data</div>
            <div class=\"cell\">show</div>
            <div class=\"cell\">pict</div>            
        </div>";


while($r=mysql_fetch_array($result))
   {
    $obj = new galleryelement;
    $obj->id=$r[0];
    $obj->photo=$r[1];
    $obj->text=$r[2];
    $obj->date=$r[3];
    $obj->show=$r[4];
    $obj->buildstring();
    //скрипт ajax для возможности запуска редактирования существующего элемента
        echo "<script>
            $(document).ready(function(){
                $('#action-".$obj->id."').click(function(){
                    //$('#action-1').hide();
                    $(\"div[id^='action-']\").hide(); //выбираем все divы начинающиеся с action-
                        $.ajax({
                                type: \"POST\",
                                url: \"edit.php\",
                                data: \"id=".$obj->id."&action=edit\",
                                success: function(msg){
                                $('#string-".$obj->id."').html(msg);
                                                    }
                                });            
                                                }
                                    ) 
                                        }
                            ); 
                </script>";
    }
    build_empty_string(); //пустая строка для добавления элемента
echo "</div>"; //закрываем контейнер
        
      ?>       
        <style>
            .string {
                height: 200px;
                width: 100%;
                background-color: #f5f5f5;
                border: 1px blue dotted;
            }
            
            #container-editor-table{
                max-width: 1200px;
                min-width: 1200px;
                border: 1px gray solid;
                min-height: 500px;
            }
            #table-header{
                text-decoration: underline;
                font: 14pt georgia;
                text-align: center;
            }
            
            .cell{
                height: 100%;
                float: left;
                border: 1px white solid;
                width: 190px;
                word-wrap: break-word;
            }
            
            .action{
                background-color: red;
                color: black;
                width: 30px;
                height: 25px;
                float: left;
                cursor: pointer;
            }
              .action-write{
                background-color: green;
                color: black;
                width: 30px;
                height: 25px;
                float: left;
                cursor: pointer;
            }
        </style>
    </body>
</html>
