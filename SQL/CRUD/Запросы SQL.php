$pdo - является экземпляром(объектом) класса PDO и служит для подключения к БД
$statement - объект класса PDOStatement, подготавливает и выполняет запрос к БД
_________________________________________________________________________________

INSERT INTO tasks (колонка1, колонка2, ...) VALUES (значение1, значение2, ...) добавить новую запись в таблицу tasks с указанными значениями столбцов.

<?php

$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
$statement = $pdo->prepare($sql);

$title = $_POST['title'];
$content = $_POST['content'];

$statement->bindParam(':title', $title);
$statement->bindParam(':content', $content);

$statement->execute();

?>
__________________________________________________________________________________

SELECT * FROM tasks - Выбрать ВСЕ данные из таблицы tasks.

<?php

$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");
$sql = "SELECT * FROM tasks";
$statement = $pdo->prepare($sql);

$statement->execute(); 
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

_________________________________________________________________________________

SELECT * FROM tasks WHERE id=:id - Выбрать ОДНУ запись по айди;

<?php

$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");
$statement = $pdo->prepare("SELECT * FROM tasks WHERE id=:id");
$statement->bindParam(":id", $_GET['id']);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);

?>

_________________________________________________________________________________

UPDATE table SET column1=value1, column2=value2, ... WHERE condition - обновить значения столбцов указанной записи в таблице table, которая удовлетворяет условию condition.

<?php

$pdo = new PDO("mysql:host=localhost;dbname=firstappdb", "root", "");
$sql = 'UPDATE tasks SET title=:title, content=:content WHERE id=:id';
$statement = $pdo->prepare($sql);

$id = $_GET['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->bindParam(':title', $title, PDO::PARAM_STR);
$statement->bindParam(':content', $content, PDO::PARAM_STR);

$statement->execute();

header("Location: /"); exit;

?>

_________________________________________________________________________________

DELETE FROM tasks WHERE id=:id - удалить запись из таблицы tasks по айди;

<?php

$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");
$sql = 'DELETE FROM tasks WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $_GET['id']);
$statement->execute();

header('Location: /');
// header("refresh: 5; url=/"); вернет назад через 5 сек

?>