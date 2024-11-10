<?php

namespace classes;

class CdProduct extends Product
{
	public $playLen;

	public function __construct ($name, $price, $playLen)
	{	
		parent::__construct($name, $price); // Вызываем родительский конструктор
		$this->playLen = $playLen; // Устанавливаем свойство объекта в дочернем классе
		$this->setDiscount(5); // Устанавливаем скидку в %
	}

	public function getInfo()
	{  
		#дополняем родительский массив данными из дочернего класса
		$info = parent::getInfo();
		$info["Время звучания"] = $this->playLen;
		$info["Скидка"] = $this->getDiscount() . " %";
		return $info;
	}

	public function getPlayLen()
	{
		return $this->playLen;
	}

	public function addProduct($name, $price, $numPages = 0)
	{
		// code...
	}
}