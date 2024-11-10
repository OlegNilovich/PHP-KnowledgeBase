<?php
 ________users__________
| id |   name   |  age  |  INSERT - Создать
|____|__________|_______|  SELECT - Выбрать
| 1  |   Alex   |  35   |	 UPDATE - Обновить
|____|__________|_______|	 DELETE - Удалить
| 2  |   John   |  30   |  FROM   - Откуда
|____|__________|_______|  WHERE  - Условие
| 3  |   Lisa   |  25   |  SET    - Установить значение
|____|__________|_______|  LIMIT  - Ограничение вывода записей


SELECT * FROM `users`  #выведет все записи из таблицы `users`
SELECT * FROM `users` WHERE id = 2  #выведет вторую запись
SELECT * FROM `users` WHERE id > 1  #выведет вторую и третью запись
SELECT * FROM `users` WHERE id > 1 LIMIT 1 #выведет только вторую запись
INSERT INTO `users` (`name`, `age`) VALUES ('Lisa', 25)  #добавит новую запись
UPDATE `users` SET `name`='Lisa', `age`=25 WHERE id = 3  #изменит запись
DELETE FROM `users` WHERE id = 4  #удалит четвертую запись