<?php
error_reporting(E_ALL);
$q=null;

    function delWords($a)
    {
        $file_name=__DIR__."/fileneme.txt";

        $r=fopen($file_name,'r');

        $text=mb_convert_encoding(fread($r,filesize($file_name)),'UTF-8', 'Windows-1251');

        $text=preg_replace('(\$[,]\w*)u','*',$text);
        echo $text;
        //$w=fopen($file_name,'w'); // 6

       // fwrite($w,$text);  // 7

       // fclose($w);  // 8

        fclose($r);  // 4
    }
if (!empty($_POST['coun']))
{   $mes1=$_POST['coun'];
    $q=delWords ($mes1);
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Задачи по функциям и формам</title>
</head>
<body>
<div>
<form method="post">
        <label>Удалить слова длиннее</label><br/>
    <input type="number" name="coun"><br/>
        <input type="submit" value="Go">
</form>
</div>
<div><?= 'sdnb' ?></div>
</body>
</html>
