<?php

function ed_commit()
{
    $mes = null;
    if (!empty($_POST['commit'])) {
        $mes = $_POST['commit'];
    }
    return $mes;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задачи по функциям и формам</title>
</head>
<body>
<div><?= ed_commit() ?></div>
<div>
    <form method="post">
        <label>Оставить комментарий</label><br/>
        <textarea name="commit" cols="30" rows="3"></textarea><br/>
        <input type="submit" value="Go">
    </form>
</div>

</body>
</html>
