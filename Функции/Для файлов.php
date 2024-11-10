<?php

//  СОДЕРЖАНИЕ  ///////////////////////////////////////////////////////////////////

# copy - копирует файл
copy('file.txt', 'folder/file.txt'); return True/False

# file_exists - Проверяет существование файла или католога
file_exists('file.txt'); return True/False

# file_get_contents - Читает содержимое файла в строку
echo file_get_contents('file.txt'); return String/False

#	file_put_contents - Пишет данные в файл или создает новый файл
file_put_contents('file.txt', 'Новый текст'); return True/False

# file - Читает содержимое файла и помещает его в массив
file('file.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); return Array/False

# move_uploaded_file - Перемещает загруженный файл в новое место
move_uploaded_file('Откуда', 'Куда'); return True/False

# rename - Переименовывает файл или дерикторию
rename('file.txt', 'newfile.txt'); return True/False

# mkdir - Создает директорию
mkdir('folder'); return True/False

# rmdir - Удаляет директорию  
rmdir('folder'); return True/False

# unlink - Удаляет файл
unlink('file.txt'); return True/False


//  ЕЩЕ СПОСОБ ЗАПИСИ В ФАЙЛ  /////////////////////////////////////////////////////


# режим 'a' (append) добавляет текст в конец файла
# режим 'w' (write) полностью перезаписывает содержимое файла

#Создаем метку открытого файла
$openfile = fopen('Document.txt', 'a');

#Пишем в файл
fwrite($openfile, 'Hello');

#Закрываем в файл
fclose($openfile);