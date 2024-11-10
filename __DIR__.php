<?php

__DIR__  Это константа содержащая полный путь к файлу

Примеры:

file_put_contents('newfolder/file.txt', 'Новый текст'); # без __DIR__ 

file_put_contents(__DIR__ . '/newfolder/file.txt', 'Новый текст'); # c __DIR__