<?php

namespace classes;

abstract class Product
{	
	protected $name;
	protected $price;
	private $discount = 0;

	public function __construct ($name, $price)
	{
		$this->name = $name;
		$this->price = $price;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getInfo()
	{	
		$info = [
		"Наименование" => $this->name,
		"Начальная Цена" => $this->price,
		"Итоговая Цена" => $this->getPrice(),
		];
		return $info;
	}

	public function getPrice() #цена с учетом скидки 
	{ 
		return $this->price - ($this->discount / 100 * $this->price);
	}

	public function getDiscount()
	{
		return $this->discount;
	}

	public function setDiscount($discount)
	{
		$this->discount = $discount;
	}

	abstract protected function addProduct($name, $price);

}