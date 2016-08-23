<?php
error_reporting(E_ALL);
$q=null;

  function upFil()
    {$upDir=__DIR__.'/uploads/';
        $c= count($_FILES['img']['name']);
        for ($i=0; $i<$c; $i++) {

        $uploadFile = $upDir.basename($_FILES['img']['name'][$i]);
            if ($_FILES['img']['type'][$i] == 'image/jpeg'||$_FILES['img']['type'][$i] == 'image/png'||$_FILES['img']['type'][$i] == 'image/gif')
            {
                if (copy($_FILES['img']['tmp_name'][$i], $uploadFile))
            {
                echo 'Файл '.$_FILES['img']['name'][$i].' успешно загружен на сервер<br/>';
            }
            }
          else {echo 'Файл '.$_FILES['img']['name'][$i].' имеет не тот формат<br/>';}
    }
    }


function showFile()
{
    $q='';
    $upDir=__DIR__.'/uploads/';
    if ($papka = scandir($upDir)) {
        $c= count($papka);
        for ($i=2;$i<$c; $i++)
        {
            $pic[]='/uploads/'.$papka[$i];

        }

        $cp=count($pic);
        if ($cp>0)
        {
            $n=$cp;

            $q.= '<table align="center" width="80%">';
            $f=0;
            while($n >=-4){

                $q.= "<tr>";
                if ($c-2>$f) {$q.= "<td width='20%'><img src=\"".$pic[$f]."\" width=\"250\" height=\"200\" /></td> "; $f++;} else { $q.= "<td width='25'></td>";}
                if ($c-2>$f) {$q.= "<td width='20%'><img src=\"".$pic[$f]."\" width=\"250\" height=\"200\" /></td> "; $f++;} else { $q.= "<td width='25'></td>";}
                if ($c-2>$f) {$q.= "<td width='20%'><img src=\"".$pic[$f]."\" width=\"250\" height=\"200\" /></td> "; $f++;} else { $q.= "<td width='25'></td>";}
                if ($c-2>$f) {$q.= "<td width='20%'><img src=\"".$pic[$f]."\" width=\"250\" height=\"200\" /></td> "; $f++;} else { $q.= "<td width='25'></td>";}
                $q.= "</tr>";
                $n=$n-4;}
            $q.= "</table>";

        }



    }
return $q;

}

if (!empty($_FILES))
{
    upFil ();
  //  showFile();
}
//showFile();
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Задачи по функциям и формам</title>
</head>
<body>
<div>
<form method="post" enctype="multipart/form-data">
        <label>Загрузить файлы:</label><br/>
    <input type="file" name="img[]" multiple>
        <input type="submit" value="Go">
</form>
</div>
<div><?= showFile(); ?></div>
</body>
</html>
