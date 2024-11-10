<?php

namespace classes;

use interfaces\IPrintPublicate;

class BookProduct extends Product implements IPrintPublicate
{
	public $numPages;

	public function __construct ($name, $price, $numPages)
	{
		parent::__construct($name, $price); // Вызываем родительский конструктор
		$this->numPages = $numPages; // Устанавливаем свойство объекта в дочернем классе
		$this->setDiscount(10); // Устанавливаем скидку в %
	}

	public function getInfo()
	{	
		#дополняем родительский массив данными из дочернего класса
		$info = parent::getInfo();
		$info["Количество страниц"] = $this->numPages;
		$info["Скидка"] = $this->getDiscount() . " %";
		return $info;
	}

	public function getNumPages()
	{
		return $this->numPages;
	}

	public function addProduct($name, $price, $numPages = 0)
	{
		echo "Это реализация метода addProduct() из абстрактного класса Product";
	}

	public function getCover()
	{
		echo "Это реализация метода getCover() из интерфейса IBook";
	}
}