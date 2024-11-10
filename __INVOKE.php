<?php

#Магический метод __invoke срабатывает при обращении к объекту как к функции
class Student
{
    public function __invoke(...$params)
    {
        return 'Параметры: ' . print_r($params);
    }
}

$student = new Student();

echo $student(123, 'asfddf', 12334);
