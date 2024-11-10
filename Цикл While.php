<?php

#Практическое применение цикла While

#Открываем текстовый файл с параметром 'чтение'
$document = fopen(__DIR__ . '\document.txt', 'read');

#Читаем каждую строку файла
while (!feof($document)) {
	$line = fgets($document);
	echo $line;
}

#Альтернативная запись
while ( false !== ($line = fgets($document)) ) {
	echo $line;
}

#Закрываем текстовый файл
fclose($document);
