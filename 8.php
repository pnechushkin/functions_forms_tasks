<?php

$post = array();
if (!empty($_POST['commit']) && !empty($_POST['login'])) {
	$commit = $_POST['commit'];
	$login = $_POST['login'];
	$commit=strip_tags($commit, '<b></b>');
	if (bedwords($commit) !== false) {
		$post = array(
			'text' => $commit,
			'login' => $login,
		);
		ed_Commit($commit, $login);
	} else {
		echo 'В сообщении найдены нецензупные слова<br/><br/>';
	}

}
$post = posts();

if (!empty($post)) {
	foreach ($post as $text) {

		echo 'Пользователь <strong>' . $text['login'] . '</strong> оставил комментарий:<br/>';
		echo 'Комментарий: <br/>' . $text['text'] . '<br/>';
	}
}
function bedwords($post)
{
	$flag = true;
	$bedwords = null;
	include 'bedwords.php';
	$text = preg_split('/[0-9\s+\.,?!;:]/', $post);
	foreach ($text as $word) {
		if (in_array($word, $bedwords)) {
			$flag = false;
			return $flag;
		}
	}
}

function ed_Commit($mes, $user)
{
	$mes = preg_replace("/(\r\n)/", "<br/>", $mes);
	$arr = array(
		'text' => $mes,
		'login' => $user,
	);
	$mytext = serialize($arr) . PHP_EOL;
	$dir = __DIR__ . DIRECTORY_SEPARATOR . '7';
	$file = $dir . DIRECTORY_SEPARATOR . 'comits.txt';
	if (!is_dir($dir)) {
		mkdir($dir);
	} else {
		$fp = fopen($file, "a");
		fwrite($fp, $mytext);
		fclose($fp);
	}
}

function posts()
{
	$dir = __DIR__ . DIRECTORY_SEPARATOR . '7';
	$file = $dir . DIRECTORY_SEPARATOR . 'comits.txt';
	$rez = array();
	if (!is_file($file)) {
		return array();
	} else {
		$fo = fopen($file, 'r');

		while (false !== ($row = fgets($fo))) {

			$rez[] = unserialize($row);
		}
		fclose($fo);
print_r($rez);
		return $rez;

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
		<label>Login</label><br/>
		<input name="login" type="text"><br/>
		<label>Оставить комментарий</label><br/>
		<textarea name="commit" cols="30" rows="3"></textarea><br/>
		<input type="submit" value="Go">
	</form>
</div>

</body>
</html>
