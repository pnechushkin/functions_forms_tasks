<?php
function unique_words ($a)
{$arr = explode(" ", $a);
    $unique_val = array_unique($arr );

return $b='В тексте '.count($unique_val).' уникальных слов';
}

if (!empty($_POST['str']))
{ $a= unique_words ($_POST['str']).'<br/>';

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
        <label>Количество уникальных слов в тексте</label><br/>

        <textarea cols="60" rows="5" name="str"><?=$_POST['str']?></textarea><br/>
        <input type="submit" value="Go">
    </form>
</div>
<div><?= $a ?></div>
</body>
</html>