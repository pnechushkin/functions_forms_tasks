<?php
$mes = null;
function vaildpasw($pasw1, $pasw2)
{
	if ($pasw1 === $pasw2) {
		return true;
	} else {
		return false;
	}
}

function uniqueness_login($login)
{
	$file = __DIR__ . DIRECTORY_SEPARATOR . 'users.txt';
	if (!is_file($file)) {
		return true;
	} else {
		$fo = fopen($file, 'r');
		while (false !== ($row = fgets($fo))) {
			$login = trim($login);
			$rez = unserialize($row);
			if ($rez['login'] === $login) {
				fclose($fo);
				return false;
			}
		}
		fclose($fo);
	}
	return true;
}

function edd_user($login, $pasw1, $email)
{
	$userinf = array(
		'login' => $login,
		'pasw' => md5($pasw1),
		'email' => $email,
	);
	$userinfval = serialize($userinf) . PHP_EOL;
	$file = __DIR__ . DIRECTORY_SEPARATOR . 'users.txt';
	$fp = fopen($file, "a");
	fwrite($fp, $userinfval);
	fclose($fp);
}


if (!empty($_POST)) {
	$er = 0;
	if (empty($_POST['login']) ||
		empty($_POST['pasw1']) ||
		empty($_POST['pasw2']) ||
		empty($_POST['email'])
	) {
		$mes .= 'Не все поля заполнены<br/>';
		$er += 1;
	}
	if (!uniqueness_login($_POST['login'])) {
		$mes .= 'Пользователь под логином ' . $_POST['login'] . 'уже есть<br/>';
		$er += 1;
	}
	if (!vaildpasw($_POST['pasw1'], $_POST['pasw2'])) {
		$mes .= 'Пароли не совпадают<br/>';
		$er += 1;
	}
	if (!empty($_POST['login']) &&
		!empty($_POST['pasw1']) &&
		!empty($_POST['pasw2']) &&
		!empty($_POST['email']) && $er == 0
	) {
		edd_user($_POST['login'], $_POST['pasw1'], $_POST['email']);
		$mes .= 'Регистрация прошла успешно<br/>';
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
	<h2>Форма регистрации</h2>
</div>
<div>
	<form method="post">
		<label>Login</label><br/>
		<input name="login" type="text"><br/>
		<label>Пароль</label><br/>
		<input name="pasw1" type="password"><br/>
		<label>Пароль еще раз</label><br/>
		<input name="pasw2" type="password"><br/>
		<label>Ваш email</label><br/>
		<input name="email" type="email"><br/>
		<input type="submit" value="Go">
	</form>
</div>
<div>
	<?= $mes ?>
</div>
</body>
</html>
