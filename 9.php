<?php
function myrelstr ($a)
{
    $rez=null;
    $arr= preg_split('//u', $a, null, PREG_SPLIT_NO_EMPTY);
    $c=count($arr);

    for ($i=$c;$i>=0;$i--)
    {$rez.=$arr[$i];}
    return $rez;
}

if (!empty($_POST['str']))
{  $a= myrelstr ($_POST['str']).'<br/>';

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
        <label>Перевернуть слово</label><br/>
        <input type="text" name="str" value="<?=$_POST['str']?>"><br/>
        <input type="submit" value="Go">
    </form>
</div>
<div><?= $a ?></div>

</body>
</html>