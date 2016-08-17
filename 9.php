<?php
function relstr ($a)
{
    $rez=strrev($a);
    return $rez;
}

function myrelstr ($a)
{$c=strlen ($a);
    $rez=null;
    for ($i=$c;$i>=0;$i--)
    {$rez.=$a[$i];}
    return $rez;
}

if (!empty($_POST['str']))
{  $a= myrelstr ($_POST['str']).'<br/>';
    $b=  relstr ($_POST['str']).'<br/>';
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
        <input type="text" name="str" value="<?=$_POST['str']?>"><br/>
        <input type="submit" value="Go">
    </form>
</div>
<div><?= $a ?></div>
<div><?= $b ?></div>
</body>
</html>