<?php

# fopen('Folder/Document.txt', 'a') - первый аргумент содержит путь к файлу
# режим 'a' (append) добавляет текст в конец файла
# режим 'w' (write) полностью перезаписывает содержимое файла

# Запись в файл в процедурном стиле
if (is_writable('Document.txt')) {
	$openfile = fopen('Document.txt', 'a');
	fwrite($openfile, 'Hello');
	fclose($openfile);
	echo "Успешная запись в файл";
} else {
	echo "Нельзя записать в файл";
}

// Запись в файл в стиле ООП
class FileManager
{
	public $file;
	public $fp;

	public function __construct($file)
	{
		$this->file = $file;
		if (!is_writable($this->file)) { #Проверка файла на пригодность к записи
			echo "Файл {$this->file} недоступен для записи";
			exit;
		}
		$this->fp = fopen($this->file, 'a'); #Создаем метку открытого файла
	}

	public function __destruct() #Закрываем файл
	{
		fclose($this->fp);
	}

	public function write($text) #Пишем в файл
	{
		if (fwrite($this->fp, $text) === false) {
			echo "Не могу записать в файл {$this->file}";
			exit;
		}
	}
}