<?php
 ________users__________
| id |   name   |  age  |  INSERT - Создать
|____|__________|_______|  SELECT - Выбрать
| 1  |   Alex   |  35   |	 UPDATE - Обновить
|____|__________|_______|	 DELETE - Удалить
| 2  |   John   |  30   |  FROM   - Откуда
|____|__________|_______|  WHERE  - Условие
| 3  |   Lisa   |  25   |  SET    - Установить значение
|____|__________|_______|


//  РАБОТА С МОДУЛЕМ MySQLi  ////////////////////////////////////////////////////////

# 0. Включаем выведение ошибок
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

# 1. Подключение к базе данных (функция возвращает Объект подключения к бд или False)
$db = mysqli_connect('localhost', 'имя пользователя', 'пароль', 'название бд');

# 2. Выполнение запроса к базе данных (функция возвращает рузультирущий набор)
$result = mysqli_query($db, "SELECT * FROM users LIMIT 10");

# 3. Выбираем все строки из результирующего набора и помещаем в массив
# Важно: Нужно использовать LIMIT в запросе к бд или если мало записей в таблице
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

# 4. Выбираем по одной строке из результирующего набора в виде ассоциативного массива
# Важно: Каждый вызов функции выбирает следующую запись из результирующего набора
$row = mysqli_fetch_assoc($result);

# 5. С помощью цикла выводим каждую строку на экран
while ($row = mysqli_fetch_assoc($result)) {
	echo $row['id'] | $row['name'] | $row['age'];
}

# 6. Подготавливаем INSERT-запрос в таблицу с приминением защиты от SQL-инъекций
# Вместо маркера '%s' подставляется mysqli_real_escape_string($db, $name)
# А вместо маркера %d подставляется (int)$age) соответственно
$name = "Bob"; $age = 35;
$query = sprintf("INSERT INTO users (name, age) VALUES ('%s', %d)",
	mysqli_real_escape_string($db, $name), (int)$age);

# 7. Выполняем безопасный подготовленный INSERT-запрос
mysqli_query($db, $query);

# 8. Подготавливаем безопасный UPDATE-запрос 
$name2 = "Marry"; $age2 = 30;
$query2 = sprintf("UPDATE users SET name = '%s', age = %d WHERE id = 4",
	mysqli_real_escape_string($db, $name2), (int)$age2);

# 9. Выполняем безопасный подготовленный UPDATE-запрос
mysqli_query($db, $query2);

# 10. Выполняем DELETE-запрос
mysqli_query($db, "DELETE FROM users WHERE id = 4");