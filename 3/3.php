<?php
error_reporting(E_ALL);
$q=null;

    function delWords($a)
    {
        $file="fileneme.txt";
       $fo= fopen($file, "r+");

        $file = iconv("windows-1251", "utf-8", $file);
        echo  file_get_contents($file);
        fclose($fo);
    }
if (!empty($_POST['coun']))
{   $mes1=$_POST['coun'];
    $q=delWords ($mes1);
}
?>
<!DOCTYPE html>
<html lang="UTF-8"
<head>
    <meta charset="UTF-8">
    <title>Задачи по функциям и формам</title>
</head>
<body>
<div>
<form method="post">
        <label>Удалить слова длиннее</label><br/>
    <input type="number"><br/>
        <input type="submit" name="coun" value="Go">
</form>
</div>
<div><?= $q ?></div>
</body>
</html>
