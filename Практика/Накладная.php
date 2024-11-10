<?php

#Накладная
class Invoice
{	
	#Header
		protected $number, $date, $from, $to;

		public function setNumber($number) { $this->number = $number; }
		public function setDate($date) { $this->date = $date; }
		public function setFrom($from) { $this->from = $from; }
		public function setTo($to) { $this->to = $to; }

		public function getNumber() { return $this->number; }
		public function getDate() { return $this->date; }
		public function getFrom() { return $this->from; }
		public function getTo() { return $this->to; }

	#Table
		public function __construct()
		{
			$this->table = new Table();
		}

		public function getTable() { return $this->table; }

	#Footer
		protected $storekeeperSurname, $forwarderSurname, $totalPrice;

		public function setStorekeeperSurname($storekeeperSurname) { $this->storekeeperSurname = $storekeeperSurname; }
		public function setForwarderSurname($forwarderSurname) { $this->forwarderSurname = $forwarderSurname; }

		public function getStorekeeperSurname() { return $this->storekeeperSurname; }
		public function getForwarderSurname() { return $this->forwarderSurname; }

		public function getTotalPrice()
		{
		    foreach ($this->getTable()->getRows() as $row) {
		        $this->totalPrice += $row->getAmount();
		    }

		    return $this->totalPrice;
		}

	#Other

		public function getInfo()
		{
			echo 'Накладная №: ' . $this->getNumber() . PHP_EOL;
			echo 'Дата:        ' . $this->getDate() . PHP_EOL;
			echo 'От Кого:     ' . $this->getFrom() . PHP_EOL;
			echo 'Кому:        ' . $this->getTo() . PHP_EOL;

			echo PHP_EOL;

			foreach ($this->table->getRows() as $row) {
				echo 'Номер:       ' . $row->getRowNumber() . PHP_EOL;
				echo 'Описание:    ' . $row->getDescription() . PHP_EOL;
				echo 'Количество:  ' . $row->getQuantity() . PHP_EOL;
				echo 'Цена:        ' . $row->getPrice() . PHP_EOL;
				echo 'Сумма:       ' . $row->getAmount() . PHP_EOL;
				echo PHP_EOL;
			}

			echo 'Итого:       ' . $this->getTotalPrice() . PHP_EOL;
			echo 'Экспедитор:  ' . $this->getForwarderSurname() . PHP_EOL;
			echo 'Кладовщик:   ' . $this->getStorekeeperSurname() . PHP_EOL;
		}

}

#Таблица
class Table
{
    protected $rows = [];
    protected $rowCount = 0;

    #Индексация - доступ к защещенным свойствам $rows и $rowCount (только чтение)
    public function __get($name) {
        if ($name === 'rows') {
            return $this->rows;
        } elseif ($name === 'rowCount') {
            return $this->rowCount;
        } 
    }

    public function addRow($description, $quantity, $price)
    {   
        $this->rowCount++;
        $this->rows[] = new Row($this->rowCount, $description, $quantity, $price);
    }

    public function getRows() { return $this->rows; }
    public function getRow($number) { return $this->rows[$number]; }
    public function getRowCount() { return $this->rowCount; }
}

#Строчка
class Row
{
	protected $rowNumber, $description, $quantity, $price;

    public function __construct($rowNumber, $description, $quantity, $price)
    {
        $this->rowNumber = $rowNumber;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
    }

	public function setDescription($description) { $this->description = $description; }
	public function setQuantity($quantity) { $this->quantity = $quantity; }
	public function setPrice($price) { $this->price = $price; }

	public function getRowNumber() { return $this->rowNumber; }
	public function getDescription() { return $this->description; }
	public function getQuantity() { return $this->quantity; }
	public function getPrice() { return $this->price; }
	public function getAmount() { return $this->quantity * $this->price; }
}


$invoice1 = new Invoice();

$invoice1->setNumber('1');
$invoice1->setDate('21-04-2023');
$invoice1->setFrom('ООО МИР');
$invoice1->setTo('ИП ВЕСНА');

$invoice1->getTable()->addRow('Сахар', 5, 250);
$invoice1->getTable()->addRow('Мука', 10, 500);

$invoice1->setStorekeeperSurname('Петренко');
$invoice1->setForwarderSurname('Захарченко');

$invoice1->getInfo();

