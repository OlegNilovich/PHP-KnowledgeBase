<?php
Типы данных

1. String    -  (string) # привидение к типу данных стринг
# обратный слеш \ помогает экранировать символы ' " /
# {$fruit}s  фигурные скобки помогают отделить название переменной
$fruit = 'orange';
echo 'Hello a\'m orange';  # Hello a'm orange
echo "Hello a\'m $fruit";  # Hello a'm orange
echo "Hello we are {$fruit}s";  # Hello we are oranges

2. Integer   -  (int) # привидение к типу данных интеджер
var_dump((int)"10");       - числовая строка              # 10
var_dump((int)"10 Hello"); - префиксная числовая сторка   # 10
var_dump((int)"10 Hello"); - нечисловая строка            # 0

3. Float     -  (float) # привидение к типу данных флоат
var_dump(25);           # float(25)

4. Boolean   -  (bool) # привидение к типу данных булиан
true, false (1,0)

5. Null      -  "Пустое значение"
6. Array[]   -  "Массив"
7. Object    -  "Объект"
8. Callable  -	"Коллбэк функция"
9. Resourse  -  "ССылка на внешний ресурс"