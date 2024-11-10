<?php

/* Создайте текстовый файл data.txt в директории с этим файлом скрипта. 

При создании экземпляра класса GuestBook в конструктор передается путь к
текстовому файлу ($path). Затем массив $records заполняется объектами
GuestBookRecord, созданными из строк, прочитанных из файла.

Метод getRecords() возвращает массив объектов GuestBookRecord,
представляющих записи в гостевой книге.

Метод append() добавляет новый объект GuestBookRecord в массив $records

Метод save() записывает содержимое массива $records в текстовый файл,
перезаписывая его содержимое */

#Гостевая книга
class GuestBook
{
	protected $path;
	protected $records = [];

	public function __construct($path)
	{	
		#Путь до текстового файла
		$this->path = $path;
		
		#Создаем массив $lines, где каждая строчка - эллемент массива
		$lines = file($this->path, FILE_IGNORE_NEW_LINES);

		#В массив $records записываем каждую строчеу в виде объекта
		foreach ($lines as $line) {
			$this->records[] = new GuestBookRecord($line);
		}
	}

	#Список строчек в виде массива объектов
	public function getRecords()
	{
		return $this->records;
	}

	#Добавление нового объекта(строчки) в массив $records
	public function append(GuestBookRecord $record)
	{
		$this->records[] = $record;
	}

	#Запись массива $records в текстовый файл
	public function save()
	{
		$lines = [];
		foreach ($this->records as $record) {
			$lines[] = $record->getMessage();
		}
		file_put_contents($this->path, implode("\n", $lines));
	}
}

#Класс, для представление каждой строчки гостевой книги в виде объекта
class GuestBookRecord
{
	public $message;

	public function __construct($message)
	{
		$this->message = $message;
	}

	public function getMessage()
	{
		return $this->message;
	}
}

$book = new GuestBook(__DIR__ . '/data.txt');

$record = new GuestBookRecord('6 новая запись');;
$book->append($record);
$book->save();


foreach ($book->getRecords() as $record) {
	echo $record->message;
	echo PHP_EOL;
}
