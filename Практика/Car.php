<?php

class Car
{
	public static $countCar = 0;
	public $brand;
	public $color;
	public $wheels;
	public $speed;

	public function __construct($brand, $color, $wheels = 4, $speed = 180)
	{
		$this->brand = $brand;
		$this->color = $color;
		$this->wheels = $wheels;
		$this->speed = $speed;
		self::$countCar++;
	}

	public static function getCount()
	{
		echo "Количество созданных машин: " . self::$countCar;
	}

	function getCarInfo()
	{
		echo "Брэнд: $this->brand \n";
		echo "Цвет: $this->color \n";
		echo "Колеcа: $this->wheels \n";
		echo "Скорость: $this->speed \n";
	}
}
