<h4 style="text-decoration: underline;">Новости</h4>
<table>
    <?php
    if (!include '../db_connect.php')
        include 'db_connect.php';
  //  $query = "SELECT * FROM articles WHERE `show`=1 AND `category`='Новости Рока' ORDER BY `date` DESC LIMIT 3;";

    $result = mysql_query($query);

    while ($r = mysql_fetch_array($result)) {
        $mas = explode('-', $r[4]);
        $tmp = array();
        array_push($tmp, $mas[2]);
        array_push($tmp, $mas[1]);
        array_push($tmp, $mas[0]);
        $datenews = implode('.', $tmp);
        echo '<tr>
               <td valign="top"><div class="mylabeltime">' . $datenews . '</div></td>
               <td><div class="mylabelbody"><a href="articles/show.php?alias=' . $r[7] . '">' . $r[1] . '</td>
               </tr>';
    }
    echo "</table>";
    ?>