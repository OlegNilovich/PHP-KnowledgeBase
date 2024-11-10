<?php

// функция call_user_func(), вызывает метод нужного нам класса, для этого
// передаем в параметрах массив с названием класса и названием метода
// дополнительно можно указывать параметры, если того требует метод

class MyClass {
    public static function myMethod() {
        echo "Hello from myMethod()!";
    }
}

// Вызов статического метода myMethod() класса MyClass
call_user_func(['MyClass', 'myMethod']);


// Создание объекта MyClass и вызов его метода myMethod()
$obj = new MyClass();
call_user_func([$obj, 'myMethod']);


class MyClassWithParameters {
    public static function myMethod($param1, $param2) {
        echo "Hello from myMethod() with parameters: $param1, $param2!";
    }
}

// Вызов статического метода myMethod() класса MyClass с передачей параметров
call_user_func(['MyClassWithParameters', 'myMethod'], 'param1_value', 'param2_value');