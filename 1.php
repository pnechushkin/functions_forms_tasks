<?php
function getCommonWords($a, $b)
{
    if (isset ($_POST['w1'])&&isset($_POST['w2']))
    {   $mes1=$_POST['w1'];
        $mes2=$_POST['w2'];
        $a   = explode(" ", $mes1);
        $b   = explode(" ", $mes2);
        $result = array_intersect($a, $b);
        if (empty($result)) {
            $mes='Совпадений не найдено';
        }
        else {$mes='Одинаковые слова:<br/>'.implode("<br/>", $result);}
        return $mes;
    }

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
        <label>Word 2</label><br/>
    <textarea name="w2" cols="30" rows="3"></textarea><br/>
    <input type="submit" value="Go">
</form>
</div>
<div><?= getCommonWords($a, $b) ?></div>
</body>
</html>
