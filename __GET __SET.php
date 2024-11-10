<?php

/*
  Благодаря методам __get и __set мы можем создать 'Резиновые' объекты
  которые могут хранить неограниченное количество атребутов, без явного
  объявления свойст класса
*/

class Student
{
	private $attributes = [];

	#При обращении к неопределенному атребуту, мы получаем его из массива $attributes, если такой атребут находится в массиве 
	public function __get($name)
	{
		return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
	}

	#При сохранении неопределенного атребута, мы помещаем его в массив $attributes
	public function __set($name, $value)
	{
		$this->attributes[$name] = $value;
	}
}

$student = new Student();
$student->name = 'Alex';
$student->age = 23;

echo "$student->name $student->age";
