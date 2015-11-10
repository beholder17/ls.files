

<!--  <div class="modal-body">-->

      <?php 
      error_reporting(1);
      session_start();
      
      
      define ("PATH_TO_ROOT", "http://www.ladystyle.su/");
?>
<script src="<?php echo PATH_TO_ROOT; ?>js/zurb.js"></script>
<?php
      //количество покупок
        $firstable_buy_limits=$_SESSION['firstable_buy_limits'];
        //проверка: есть ли в корзине модель, на странице которой мы сейчас находимся?
        //выборка количества моделей
//        $addict=0;                                                                                                //  \------/   \------/
//        
//Загадка №1
//Внимание вопрос! Сколько моделей в наборе? :)
//дано: количество покупок: 5шт.
//echo "Внимание вопрос! Сколько моделей в наборе? :)";
//$buys=13;

$arr[]=0;
for ($i=1; $i<$firstable_buy_limits+1; $i++)
{   
    if ($_SESSION['name'][$i]!=NULL){
    $somevalue=$_SESSION['name'][$i];
    //echo "<p><u>$somevalue</u></p>";
    if (!in_array($somevalue, $arr)){
     $arr[]=$_SESSION['name'][$i];   
    }
    }
}
$models=count($arr)-1;
//echo " Ответ: $models";
//echo "=".$_SESSION['name'][1]."=";
//echo "<br><br><br><br><br>";




//////-----------------------------------------------------------------------------------






//Загадка №2
//Внимание вопрос: Сколько размеров каждой модели в массиве?

//$arr2[][]=0; //[A][B] - A - номер модели, B - количество размеров;
unset($arr2); //[A][B] - A - номер модели, B - количество размеров;
$yy=0; //вспомогательная переменная

for ($i=1; $i<$models+1; $i++)
{
    $temp=$arr[$i];
    $yy=0;
    $indexes=array(); //массив с индексами
    for ($o=1; $o<$firstable_buy_limits+1; $o++)   //$firstable_buy_limits - переменная для обозначения максимального количества покупок за сессию. нужна для сканирования всего диапазона корзины и успешного построения сложной таблицы.
        {
          
          if ($temp==$_SESSION['name'][$o])  //считаем количество покупок с одним номером модели.
              {$yy++;
              //получаем индексы
              
              array_push($indexes, $o);
              }
          
        }
    $arr2[$temp]['num']=$yy;
    $arr2[$temp]['ind']=$indexes;
}

//print_r($arr2);
//unset ($arr2);
/****/
//$arr2[][]=0;
//$arr2['2559']['num']=1;
//$arr2['2559']['ind']=array('2');
//$arr2['2612-1']['num']=2;
//$arr2['2612-1']['ind']=array('3','4');
/****/


//вывод таблицы
$counter=0;  //ключ для вывода данных из сессий. выступает в роли количества покупок
error_reporting(0);
if ($arr2==NULL) {echo "<h2>Ваша корзина пуста, но нам есть что Вам предложить!</h2>Обратите внимание на наши <a href=\"".PATH_TO_ROOT."im/novelty.php\">новинки</a>";} else {

  echo "<table class=\"table table-bordered table-stripped\">
  <caption>В вашей корзине следующие товары</caption>
  <thead>
    <tr>
      
      <th>Фото</th>
      <th>Номер модели</th>
      <th>Размер</th>
      <th>Кол-во</th>
      <th>Цена * шт</th>
      <th>Убрать?</th>
    </tr>
  </thead>
  <tbody>
    ";
    
}
foreach ($arr2 as $temp){
    $temp['num'];
  //  print_r($temp);
    $flag=0;
    for ($i=0; $i<$temp['num'];$i++)
    {   $counter++;
        echo "<tr>";
        if ($flag==0){
        $nomatter=$i+1;
        //print_r ($arr2[2559][ind][2]);
    //    echo "<td rowspan='".$temp['num']."'>".$nomatter."</td>";
        //echo "<td rowspan='".$temp['num']."'>".$_SESSION[][]."</td>";
        //echo "<td id=\"$counter\" rowspan='".$temp['num']."'><a href=\"http://www.ladystyle.su/im/details.php?art=".$_SESSION['name'][$temp[ind][$i]]."\"><img height='100px' src = '".PATH_TO_ROOT."/im/image/80/".$_SESSION['name'][$temp[ind][$i]].".jpg'/></a></td>";
		echo "<td id=\"$counter\" rowspan='".$temp['num']."'><a href=\"http://www.ladystyle.su/im/details/any/usual/".$_SESSION['name'][$temp[ind][$i]]."\"><img height='100px' src = '".PATH_TO_ROOT."/im/image/80/".$_SESSION['name'][$temp[ind][$i]].".jpg'/></a></td>";
        echo "<td rowspan='".$temp['num']."'>".$_SESSION['name'][$temp[ind][$i]]."<br><br><span class=\"label label-important\">Цена: ".$_SESSION['price'][$temp[ind][$i]]." руб.</span></td>";
        
        }
        
        echo "<td>".$_SESSION['size'][$temp[ind][$i]]."</td>";
        if ($_SESSION['quantity'][$temp[ind][$i]]==NULL) {$_SESSION['quantity'][$temp[ind][$i]]=1;}
        echo "<td>
                <div id=\"kolvoselector\" class=\"input-prepend input-append\">
                <input class=\"span1\" id=\"counter".$counter."\" size=\"6\" valueAsNumber=\"\" type=\"number\" min=\"1\" max=\"50\" value=\"".$_SESSION['quantity'][$temp[ind][$i]]."\"><span class=\"add-on\">шт.</span>
                </div>
                </td>";
        //echo "<td id='".$_SESSION['name'][$counter]."x".$_SESSION['size'][$counter]."'>".$_SESSION['price'][$counter]."</td>";
        $tmp_price_x_quantity=$_SESSION['price'][$temp[ind][$i]] * $_SESSION['quantity'][$temp[ind][$i]];
        echo "<td id='price".$counter."'>".$tmp_price_x_quantity."</td>";
        echo "<td><a id=\"unset_position".$temp[ind][$i]."\" class='btn btn-danger' href='#'>Убрать <i class='icon-remove'></i></a></td>";
        echo "</tr>";
        $flag=1;
        
        echo "<script>
        $(document).ready(function(){
        $(\"#counter$counter\").bind('textchange', function (event, previousText) {
        var multiplier=$(\"#counter$counter\").attr(\"value\");
        //alert(sdf);
        //получить цену
        var price=".$_SESSION['price'][$temp[ind][$i]]."
        //alert ('цена '+price+'....');
        var newprice;
        newprice=price*multiplier;
        
        $(\"#price$counter\").html(newprice);
                

        
         //пересчет суммы товаров по строкам
         temp=0;
         for (var i = 1; i < 1+".$firstable_buy_limits."; i++) {
         
         currentprice=$(\"#price\"+i).html();
         if (!currentprice){ 
           //alert(currentprice);
         } else {
         //parseInt(currentprice); //чтобы считало сумму а не конкатенацию
         temp+=parseInt(currentprice);
         }
            }
         // alert(temp);
        
         
         //пересчет количества товаров по строкам
         tempquantity=0;
         for (var i = 1; i < 1+".$firstable_buy_limits."; i++) {
         currentquantity=$(\"#counter\"+i).val();
         //tempquantity+=currentquantity;
         if (!currentquantity){
            //alert('Количество отсутствует в одной или нескольких позицияx');
            } else {
         //parseInt(currentquantity); //чтобы считало сумму а не конкатенацию
         tempquantity+=parseInt(currentquantity);
         }
            }
         //alert(tempquantity);
         


        $(\"#cartsumm\").html(temp);
        $(\"#summ\").html(temp);
       // $(\"#items\").html(tempquantity);
        $(\"#cartitems\").html(tempquantity);
        

        //теперь изменение цен и количества надо запечатлеть и в сессии. для этого сей аякс запрос
         $.ajax({
        type: \"GET\",
        async: false,
        url: \"http://www.ladystyle.su/im/ajax_price_change.php\",
        data: \"temp=\"+temp+\"&temp2=\"+tempquantity+\"&index=".$temp[ind][$i]."&quantity=\"+multiplier+\"&size=".$_SESSION['price'][$temp[ind][$i]]."\",
        success: function(msg){
         //  alert( msg +'..........');
        }
        });


                                    }
                        ); 
                                        }
                            );                 
        </script> ";
        
        //код для вызова скрипта удаления товарной позиции из корзины. аякс
        echo "<script>
        $(document).ready(function(){
        $(\"#unset_position".$temp[ind][$i]."\").click(function(){
        //alert('Будет удалена следующая : '+'".$_SESSION['name'][$temp[ind][$i]]."-".$_SESSION['size'][$temp[ind][$i]]."');
        
        tempquant=$(\"#items\").html();
        tempquant=tempquant-1;
        //alert(tempquant);
        $(\"#items\").html(tempquant);


        $.ajax({
        type: \"GET\",
        async: false,
        url: \"http://www.ladystyle.su/im/unset_position.php\",
        data: \"index=".$temp[ind][$i]."&price=".$_SESSION['price'][$temp[ind][$i]]."&quantity=".$_SESSION['quantity'][$temp[ind][$i]]."\",
        success: function(msg){
           //alert( \"Data Saved: \" + msg );
        }
        });

        
        
        $('.modal-body').load('http://www.ladystyle.su/im/cartcontent.php'); 
        $('.modal-footer').load('http://www.ladystyle.su/im/footercartfill.php'); 
        $('#summ').load('http://www.ladystyle.su/im/ajax_cart_interface.php'); 
    

                                    }
                        ); 
                                        }
                            );                 
        </script> 
            ";
        
    }
}







        ?>


<script>
//$(document).ready(function(){
//        $("#counter1").change(function(){
//        var multiplier=$("#counter1").attr("value");
//        //alert(sdf);
//        //получить цену
//        var price=<?php //echo $_SESSION['price']['1']?>
//        //alert ('цена '+price);
//        var newprice;
//        newprice=price*multiplier;
//        $("#price1").html(newprice);
//                                    }
//                        ); 
//                                        }
//                            );                 
</script> 


  </tbody>
</table>

  

