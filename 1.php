<?php
$mes='';
function getCommonWords($a, $b)
{
        $arra   = explode(" ", $a);
        $arrb   = explode(" ", $b);
        $result = array_intersect($arra, $arrb);
        if (empty($result)) {
            $mes='Совпадений не найдено';
        }
        else {$mes='Одинаковые слова:<br/>'.implode("<br/>", $result);}
        return $mes;
}
if (!empty($_POST['w1'])&&!empty($_POST['w2']))
{   $mes1=$_POST['w1'];
    $mes2=$_POST['w2'];
   $q=getCommonWords ($mes1,$mes2);
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
<div><?= $q ?></div>
</body>
</html>
