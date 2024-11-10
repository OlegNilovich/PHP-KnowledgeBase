<?php

#отображение массива
function debug($data)
{
	echo '<pre>' . print_r($data, 1) . '</pre>';
}

#регистрация пользователя
function registration(): bool
{
	global $pdo;

	#Валидируем логин и пароль при регистрации пользователя
	$login = !empty($_POST['login']) ? trim($_POST['login']) : '';
	$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';
	if (empty($login) || empty($pass)) {
		$_SESSION['errors'] = 'Введите логин и пароль';
		return false;
	}

	#Проверяем уникальность логина при регистрации пользователя
	$res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE login = ?");
	$res->execute([$login]);
	if ($res->fetchColumn()) {
		$_SESSION['errors'] = 'Данное имя уже используется';
		return false;
	}

	#Хешируем пароль
	$pass = password_hash($pass, PASSWORD_DEFAULT);
	$res = $pdo->prepare("INSERT INTO users (login, pass) VALUES (?,?)");
	if ($res->execute([$login, $pass])) {
		$_SESSION['success'] = 'Успешная регистрация';
		return true;
	} else {
		$_SESSION['errors'] = 'Ошибка регистрации';
		return false;
	}
}

#Авторизация пользователя
function login(): bool
{
	global $pdo;

	#Валидируем логин и пароль при авторизации пользователя
	$login = !empty($_POST['login']) ? trim($_POST['login']) : '';
	$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';
	if (empty($login) || empty($pass)) {
		$_SESSION['errors'] = 'Введите логин и пароль';
		return false;
	}

	#...
	$res = $pdo->prepare("SELECT * FROM users WHERE login = ?");
	$res->execute([$login]);
	if (!$user = $res->fetch()) {
		$_SESSION['errors'] = 'Неверный логин или пароль';
		return false;
	}

	if (!password_verify($pass, $user['pass'])) {
		$_SESSION['errors'] = 'Неверный логин или пароль';
		return false;
	} else {
		$_SESSION['success'] = 'Вы успешно авторизовались';
		$_SESSION['user']['name'] = $user['login'];
		$_SESSION['user']['id'] = $user['id'];
		return true;
	}
}

#Добавление сообщения
function add_message(): bool
{
	global $pdo;

	#Валидируем сообщение пользователя
	$message = !empty($_POST['message']) ? trim($_POST['message']) : '';

	#Проверка авторизации пользователя
	if (!isset($_SESSION['user']['name'])) {
		$_SESSION['errors'] = 'Необходима авторизация';
		return false;
	}

	#Проверка на пустое поле сообщения
	if (empty($message)) {
		$_SESSION['errors'] = 'Введите текст сообщения';
		return false;
	}

	#Подготовка запроса на добавление сообщения
	$res = $pdo->prepare("INSERT INTO messages (name, message) VALUES (?,?)");
	if ($res->execute([$_SESSION['user']['name'], $message])) {
		$_SESSION['success'] = 'Сообщение успешно добавлено';
		return true;
	} else {
		$_SESSION['errors'] = 'Ошибка добавления сообщения';
		return false;
	}
}

#Вывод сообщений
function get_messages(): array
{
	global $pdo;
	$res = $pdo->query("SELECT * FROM messages");
	return $res->fetchAll();
}