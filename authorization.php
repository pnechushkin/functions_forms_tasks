<?php
$mes = null;
function find_user($user)
{
	$userdata = array();
	$file = __DIR__ . DIRECTORY_SEPARATOR . 'users.txt';
	$fo = fopen($file, 'r');
	while (false !== ($row = fgets($fo))) {
		$login = trim($user);
		$rez = unserialize($row);
		if ($rez['login'] === $login) {
			$userdata = $rez;
			fclose($fo);
			return $userdata;
		}
	}
	fclose($fo);
	return $userdata;
}

if (!empty($_POST)) {
	find_user($_POST['login']);
	$userdata = find_user($_POST['login']);
	$er = 0;
	if (empty($_POST['login']) || empty($_POST['pasw1'])) {
		$mes .= 'Вы что-то забыли :)<br/>';
		$er += 1;
	}

	if (count($userdata) == 0) {
		$mes .= 'Пользователь под логином ' . $_POST['login'] . 'не найден<br/>';
		$er += 1;
	} else {
		if (md5($_POST['pasw1']) != $userdata['pasw']) {
			$mes .= 'Не верный пароль<br/>';
			$er += 1;
		}
	}
	if (!empty($_POST['login']) && !empty($_POST['pasw1']) && $er == 0) {
		$mes .= 'Добро пожаловать, <b>' . $userdata['login'] . '</b><br/>';
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
	<h2>Форма авторизации</h2>
</div>
<div>
	<form method="post">
		<label>Login</label><br/>
		<input name="login" type="text"><br/>
		<label>Пароль</label><br/>
		<input name="pasw1" type="password"><br/>
		<input type="submit" value="Go">
	</form>
</div>
<div>
	<?= $mes ?>
</div>
</body>
</html>
