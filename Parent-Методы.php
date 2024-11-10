<?php

#Использование методов классов-родителей  parent::getInfo()

class Item
{	
	public $name;
	public $color;
	public $price;

	public function __construct($name, $color, $price)
	{
		$this->name = $name;
		$this->color = $color;
		$this->price = $price;
	}

	public function getInfo()
	{
		return 'Наименование: ' . $this->name
		. PHP_EOL .
		'Цена: ' . $this->price
		. PHP_EOL .
		'Цвет: ' . $this->color;
	}
}

class Table extends Item
{
	public $legs;

	public function __construct($name, $color, $price, $legs)
	{	
		$this->legs = $legs;
		parent::__construct($name, $color, $price);
	}

	function getInfo()
	{
		return parent::getInfo()
		. PHP_EOL .
		'Ножки: ' . $this->legs
		. PHP_EOL;
	}
}

class Cabinet extends Item
{
	public $doors;

	public function __construct($name, $color, $price, $doors)
	{	
		$this->doors = $doors;
		parent::__construct($name, $color, $price);
	}

	function getInfo()
	{
		return parent::getInfo()
		. PHP_EOL .
		'Дверцы: ' . $this->doors
		. PHP_EOL;
	}
}

$cabinet = new Cabinet('cabinet', 'black', 2000, 2);

$table = new Table('table', 'red', 1000, 4);

echo $cabinet->getInfo();
echo PHP_EOL;
echo $table->getInfo();
