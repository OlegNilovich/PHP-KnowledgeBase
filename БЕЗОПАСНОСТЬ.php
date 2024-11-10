<?php

#ПРАВИЛА БЕЗОПАСНОСТИ


# 1. Выполнять проверку(валидацию) данных направленных в базу данных

#Если метод запроса ПОСТ, тогда переходим к следующей проверке
if ($_SERVER['REQUEST_METHOD'] === 'POST')

#Проверка имейла. Если имейл корректный - функция возвращает строку с имейлом, либо False
filter_var('user@mail.com', FILTER_VALIDATE_EMAIL); 

#Убираем пробелы функцией trim(), Проверяем мин длинну строки функцией strlen()
if (strlen(trim($_POST['body'])) === 0) {
	$errors['body'] = 'A body is required';
}

#Убираем пробелы функцией trim(), Проверяем макс длинну строки функцией strlen()
if (strlen(trim($_POST['body'])) > 1000) {
	$errors['body'] = 'The body can not be more than 1,000 characters';
}

#Если проверка не пройдена, тогда записываем текст ошибки в Массив ошибок
$errors = [];

#Если массив ошибок пуст, тогда выполняем запрос на отправку данных в базу данных
if (empty($errors)) {
	$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
	'body' => $_POST['body'],
	'user_id' => 1
	]);
}


# 2. Использовать подготовленные запросы (prepared statements) к базе данных

#Неправильно
$db->query("INSERT INTO notes(body, user_id) VALUES('{$_POST['body']}', 1)");

#Правильно
$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
	'body' => $_POST['body'],
	'user_id' => 1
]);

#Неправильно
$db->query("SELECT * FROM notes WHERE id = {$_GET['id']}")->fetch();

#Правильно
$db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->fetch();

?>


<!-- 3. Использовать функцию htmlspecialchars() для вывода данных на экран -->

<!-- Правильно -->
<p><?= htmlspecialchars($note['body']) ?></p>

<!-- Правильно -->
<ul>
	<?php foreach ($notes as $note) : ?>
		<li><?= htmlspecialchars($note['body']) ?></li>
	<?php endforeach; ?>
</ul>


<!-- 4. Если пользователь не прошел проверку, заполненные данные сохраняются в форме -->

<textarea name="body" rows="3" placeholder="Заполните поле формы">
	<!-- Если есть данные в массиве пост, тогда вывести их, иначе вывести пустую строку -->
	<?= $_POST['body'] ?? ''?>
</textarea>
<!-- Если в массиве ошибок есть ошибка, тогда вывести её -->
<?php if (isset($errors['body'])) : ?>
	<p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
<?php endif; ?>