<?php$f = isset($_GET['filename']) ? htmlspecialchars($_GET['filename']) : '';// w - ширниа изображения$w = isset($_GET['w']) ? htmlspecialchars($_GET['w']) : '';// h - высота изображения (если н указан - квадрат)$h = isset($_GET['h']) ? htmlspecialchars($_GET['h']) : $w;// Тип преобразования$typ = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : ''; if ($f=='') // если файл не указан  {    header("Content-type: image/jpeg");    $src = imagecreatetruecolor($w, $h);    $color = imagecolorallocate($src, 200, 200, 200);    // Закрашенный прямоугольник    imagefilledrectangle($src,0,0,$w,$h,$color);    imagepng($src);    imagedestroy($src);    exit;  } // Дополняем имя файла полным путем//////////////////////$f=$_SERVER['DOCUMENT_ROOT'].'/upload/'.$f;echo $f;// создаём исходное изображение на основе// исходного файла и опеределяем его размерыlist($w_src, $h_src, $type) = getimagesize($f);$types = array('','gif','jpeg','png');$ext = $types[$type];if ($ext)  {    $func = 'imagecreatefrom'.$ext;    $src = $func($f);  }else  {    echo '<br>No Image';    return;  }header("Content-type: image/jpeg");    // операции для получения прямоугольного файла    if ($typ==2)      {        // Проверяем меньшую сторону        if ($h_src<$w_src) // горизонтальная          {            // вычисление пропорций            $ratio = $h_src/$h;            $w_dest = round($w_src/$ratio);            $h_dest = round($h_src/$ratio);            if ($w_dest < $w) // если вдруг ширина стала меньше нужной              {                // вычисление пропорций                $ratio = $w_src/$w;                $w_dest = round($w_src/$ratio);                $h_dest = round($h_src/$ratio);                // создаём пустую картинку                // важно именно truecolor!, иначе будем иметь 8-битный результат                $tmp = imagecreatetruecolor($w_dest,$h_dest);                imagecopyresized($tmp, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);                $dest = imagecreatetruecolor($w,$h);                $obrez=round(($h_dest-$h)/2);                imagecopyresized($dest, $tmp, 0, 0, 0, $obrez, $w, $h, $w_dest, $h_dest-$obrez*2);                imagedestroy($tmp);              }            else // если все норм              {                // создаём пустую картинку                // важно именно truecolor!, иначе будем иметь 8-битный результат                $tmp = imagecreatetruecolor($w_dest,$h_dest);                imagecopyresized($tmp, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);                $dest = imagecreatetruecolor($w,$h);                $obrez=round(($w_dest-$w)/2);                imagecopyresized($dest, $tmp, 0, 0, $obrez, 0, $w, $h, $w_dest-$obrez*2, $h_dest);                imagedestroy($tmp);              }          }        else // вертикальная          {            // вычисление пропорций            $ratio = $w_src/$w;            $w_dest = round($w_src/$ratio);            $h_dest = round($h_src/$ratio);            if ($h_dest < $h) // если вдруг высота стала меньше нужной              {                // вычисление пропорций                $ratio = $h_src/$h;                $w_dest = round($w_src/$ratio);                $h_dest = round($h_src/$ratio);                // создаём пустую картинку                // важно именно truecolor!, иначе будем иметь 8-битный результат                $tmp = imagecreatetruecolor($w_dest,$h_dest);                imagecopyresized($tmp, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);                $dest = imagecreatetruecolor($w,$h);                $obrez=round(($w_dest-$w)/2);                imagecopyresized($dest, $tmp, 0, 0, $obrez, 0, $w, $h, $w_dest-$obrez*2, $h_dest);                imagedestroy($tmp);              }            else // если все норм              {                // создаём пустую картинку                // важно именно truecolor!, иначе будем иметь 8-битный результат                $tmp = imagecreatetruecolor($w_dest,$h_dest);                imagecopyresized($tmp, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);                $dest = imagecreatetruecolor($w,$h);                $obrez=round(($h_dest-$h)/2);                imagecopyresized($dest, $tmp, 0, 0, 0, $obrez, $w, $h, $w_dest, $h_dest-$obrez*2);                imagedestroy($tmp);              }          }      }    else // операции для получения квадратного файла      {        // создаём пустую квадратную картинку        // важно именно truecolor!, иначе будем иметь 8-битный результат        $dest = imagecreatetruecolor($w,$w);        // вырезаем квадратную серединку по x, если фото горизонтальное        if ($w_src>$h_src)          imagecopyresized($dest, $src, 0, 0, round(($w_src-$h_src)/2), 0, $w, $w, $h_src, $h_src);        // вырезаем квадратную верхушку по y,        // если фото вертикальное (хотя можно тоже серединку)        if ($w_src<$h_src)          imagecopyresized($dest, $src, 0, 0, 0, 0, $w, $w, $w_src, $w_src);        // квадратная картинка масштабируется без вырезок        if ($w_src==$h_src)          imagecopyresized($dest, $src, 0, 0, 0, 0, $w, $w, $w_src, $w_src);      }    // вывод картинки и очистка памяти    imagejpeg($dest,'',100);    imagedestroy($dest);    imagedestroy($src);  ?>