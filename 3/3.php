<?php error_reporting(E_ALL);
function delWords($a)
{
    $q = null;
    $file_name = __DIR__ . "/fileneme.txt";
    $r = fopen($file_name, 'r');
    $text = mb_convert_encoding(fread($r, filesize($file_name)), 'UTF-8', 'Windows-1251');
    $q .= $text . '<br/><br/><br/>';
    $text = preg_replace('/\w{' . $a . ',}/u', '*', $text);
    $q .= $text;
    $file_name = __DIR__ . "/fileneme1.txt";
    $w = fopen($file_name, 'w');
    fwrite($w, $text);
    fclose($w);
    fclose($r);
    return $q;
}

if (!empty($_POST['coun'])) {
    $mes1 = $_POST['coun'];
    $q = delWords($mes1);
} ?> <!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Задачи по функциям и формам</title></head>
<body>
<div>
    <form method="post">
        <label>Удалить слова длиннее</label><br/>
        <input type="number" name="coun"><br/>
        <input type="submit" value="Go">
    </form>
</div>
<div><?= $q ?></div>
</body>
</html>
