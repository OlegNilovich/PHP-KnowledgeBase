<?php

$firstName = 'Joffrey';
$greeting = 'Hello';

// Обратите внимание на ограничители строки — это двойные кавычки
// Интерполяция не работает с одинарными кавычками
print_r("{$greeting}, {$firstName}s!"); // => Hello, Joffreys!