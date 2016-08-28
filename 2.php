<?php
$mes = null;
function getLongWords($a)
{
    $arra = explode(" ", $a);
    foreach ($arra as $var) {
        $tmparr[] = strlen($var);
    }
    arsort($tmparr);
    foreach ($tmparr as $key => $val) {
        $arra1[] = $arra[$key];
    }
    $coun = count($arra1);
    if ($coun < 3) {
        $mes = 'Должно быть больше 3-х слов';
    } else {
        $mes = 'Три самы большие слова:<br/>' . $arra1[0] . '<br/>' . $arra1[1] . '<br/>' . $arra1[2] . '<br/>';
    }
    return $mes;
}

if (!empty($_POST['w1'])) {
    $mes1 = $_POST['w1'];
    $q = getLongWords($mes1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задачи по функциям и формам</title>
</head>
<body>
<div>
    <form method="post">
        <label>Word 1</label><br/>
        <textarea name="w1" cols="30" rows="3"></textarea><br/>
        <input type="submit" value="Go">
    </form>
</div>
<div><?= $q ?></div>
</body>
</html>
