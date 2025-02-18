<?php

//  СВОЙСТВА И МЕТОДЫ ОБЪЕКТА  //////////////////////////////////////////////////////

class Car
{	
	#Свойства объектов
	public $brand;
	public $speed;

	#Магический метод срабатывает автоматически при создании экземпляра класса
	public function __construct($brand, $speed = 180)
	{
		#Псевдопеременная $this ссылается на свойства и экземпляров класса
		$this->brand = $brand;
		$this->speed = $speed;
	}

	#Метод объектов
	function getCarInfo()
	{
		echo "Брэнд: $this->brand | Скорость: $this->speed км/ч";
	}
}

#Создаем объект класса
$myCar = new Car('Audi', 200);

#Выводим значение свойства объекта
echo $myCar->brand; // Audi

#Используем метод объекта
$myCar->getCarInfo(); // Брэнд: Audi | Скорость: 200 


//  СТАТИЧЕСКИЕ СВОЙСТВА И МЕТОДЫ КЛАССА  ///////////////////////////////////////////

class Counter 
{
	#Статическое свойство класса
	public static $count = 0;

	#Статический метод класса
	public static function upCount()
	{
		#Псевдопеременная self ссылается на свойства самого класса
		self::$count += 1;
	}

  #Статический метод класса
	public static function getCount() 
	{
		echo self::$count;
	}
}

#Использование статических методов класса
Counter::upCount();   #Увеличиваем счетчик на еденицу
Counter::upCount();   #Еще раз увеличиваем счетчик на единицу
Counter::getCount();  #Выводим значение счетчика (2)


//  КОНСТАНТЫ КЛАССА  //////////////////////////////////////////////////////////////

class Circle {

	#бъявляем константу
	const PI = 3.14;

	public static function area($radius) 
	{
		echo "Площадь круга равна: " . $radius * $radius * self::PI ;
	}
}

#Использование статического метода класса
Circle::area(5); #Площадь круга равна: 78.5

#Вывод значение константы класса
echo Circle::PI; // 3.14


//  НАСЛЕДОВЕНИЕ  //////////////////////////////////////////////////////////////////

#Наследование помогает избежать дублирования кода.
#Сначала подключается родительский класс, а затем дочерние классы.
#Суперкласс содержит общие параметры и методы.
#Дочерние классы содержат более специфичные параметры и методы.
#Дочерние классы могут переопределять методы родительского класса.
#Дочерние классы могут также добавлять новые параметры и методы.


//  МОДИФИКАТОРЫ ДОСТУПА  ///////////////////////////////////////////////////////////

class Scope
{
   public $pub;     #доступ в классе где объявлен, в классах-наследниках, в объектах.
	protected $prot; #доступ в классе где объявлен, в классах-наследниках.
	private $priv;   #доступ в классе где объявлен
}


//  АБСТРАКТНЫЕ КЛАССЫ  /////////////////////////////////////////////////////////////

#Абстрактный класс служит только для наследования. Создание эго экземпляров - запрещено
abstract class Product
{	
	#Область видимости дочерних классов не может быть жесче чем у абстрактного класса
	protected $name;
	protected $price;

	#Абстрактная функция не содержит тела и обязывает дочерние классы реализовать метод
	abstract protected function addProduct($name, $price);
}


//  ИНТЕРФЕЙСЫ и КОНТРОЛЬ ТИПОВ  /////////////////////////////////////////////////////

#Название интерфейса начинается с большой буквы 'I', пример: 'IMyInterface'
#Класс может быть наследован только от одного класса, но интерфейсов может быть много
#Файл содержащий интерфейс должен подключатся первее чем файл где он реализуется
#От интерфейса нельзя создать объект
#Методы интерфейса не должны иметь реализацию
#Бинарный оператор instanceof может проверить пренадлежность объекта к классу


#Класс 'Книга' наследуется от класса 'Продукт' и реализует интерфейс 'IPrintPublicate'
class BookProduct extends Product implements IPrintPublicate
{}
#Класс 'Журнал' наследует класса 'Продукт' и реализует интерфейс 'IPrintPublicate'
class MagazineProduct extends Product implements IPrintPublicate
{}

#Создаем объект книгу
$book = new BookProduct('Azbuka', 50, 300);

#Создаем объект журнал
$magazine = new MagazineProduct('Murzilka', 45, 120);

#Создаем функцию, которая может принимать только объекты типа IPrintPublicate
function offerCover(IPrintPublicate $product)
{
	echo "Предлагаем обложку для {$product->getName()}";
}

offerCover($book);

#ИТОГ: благодаря интерфейсу IPrintPublicate мы добавляем новый тип нашим объектам
# $book и $magazine, теперь функция предлагающая обложки offerCover(), может быть
# уверенна, что в неё попадут только объекты только печатного типа


//  АВТОЗАГРУЗКА КЛАССОВ  ///////////////////////////////////////////////////////////

# Автозагрузка помогает подключить классы все вместе без подключения каждого отдельно
# Помогает соблюдать порядок подключения классов

# Кодга в коде встречается неподключенный требуемый класс, PHP автоматически вызывает
# все зарегестрированные функции-автозагрузчики и передает им в аргументы имя класса

#Самодельная функция-автозагрузчик классов (формирует путь и подключает класс)
function autoloader($class)
{
	$file = __DIR__ . "/classes/{$class}.php";
	if(file_exists($file)){
		require_once $file;
	}
}

#Функция регестрирует нашу функцию-автозагрузчик классов
spl_autoload_register('autoloader');


//  ПРОСТРАНСТВА ИМЕН  //////////////////////////////////////////////////////////////

# После слова namespace указывается путь от корневой папки, до папки с нужным классом.
# В качестве разделителя используется " \ " обратный слеш
'namespace folder\classes';
class MyClass{}

$myObject = new \folder\classes\MyClass;

# Теперь имя класса будет содержать полный путь \folder\classes\MyClass
# Мы по сути переименовали класс, добавив к имени путь до него
# Можно пользоваться только одним автозагрузчиком
# Исключен конфликт одинаковых имен классов


//  COMPOSER  ///////////////////////////////////////////////////////////////////////

# 1. Создаем в корне проекта файл composer.json и прописываем путь до папки с классами
# "classes\" и "app\" - означают пространства имен
# "vendor/classes" и "app" - это папки, где будет искать классы автозагрузчик
{
	"require": {},
	"autoload": {
		"psr-4": {
			"classes\\": "vendor/classes",
			"app\\": "app"
		}
	}
}

# 2. Вводим консольные команды
'composer self-update'  // Обновляет композер
'composer install'      // Создание автозагрузчика

# 3. Подключаем в индексном фале созданный автозагрузчик композера

require_once __DIR__ . 'vendor/autoload.php';

# 4. Если внесли какие-то изменения в автозагрущчик, то используем команду
'composer dump-autoload'  // перезагружает автозагрузчик


//  ТРЕЙТЫ  /////////////////////////////////////////////////////////////////////////

# Название трейта начинается с большой буквы 'T', пример: 'TMyTrait'
# Трейт содержит методы с реализацией, которые мы хотим включить в другие классы
# Трейт не меняет тип объекта, он просто переносит свои методы в другие классы
# Для использования прописываем в теле класса: use TMyTrait;

trait TMyTrait
{
	$trait = 'Свойство трейта'; 

	public function
	{
		echo 'Функция трейта';
	}
}

class MyClass
{
	use TMyTrait; // используем трейт в теле класса (используем код из тела трейта)
}


//  ПОЗДНЕЕ СТАТИЧЕСКОЕ СВЯЗЫВАНИЕ  /////////////////////////////////////////////////

# Ключевое слово self ссылается только класс в котором оно было определено, и не учитывает переопределение свойств и методов в классах-наследниках.
# Ключевое слово static позволяет обращаться к свойствам и методам родительского класса, но уже в переопределенном виде в дочернем классе-наследнике

class Animal
{
	protected static $name = 'Animal';

	public static function getName() 
	{
	  // return self::$name; #не будет учитывать переопределение в дочернем классе
	  return static::$name;  #будет учитывать переопределение в дочернем классе
	}
}

class Cat extends Animal
{
	protected static $name = 'Cat'; #переопределяем свойство родительского класса
}

echo Animal::getName();  //  "Animal"
echo Cat::getName();     //  "Cat"


//  ЦЕПОЧКА МЕТОДОВ  ////////////////////////////////////////////////////////////////

# На каждом звене цепочки методов мы меняем свойства объекта
# И в конце получаем итоговый объект с конечными свойствами

# Чтобы использовать цепочку методов $obj->method1()->method2()->method3();
# Нужно в каждом методе прописать логику изменения свойств объекта
# Затем вернуть объект с помощью (return $this)

class Example
{
   private $number1 = 0;

   public function setNumber1($number1) #Устанавливаем знаение $number1
   {
      $this->number1 = $number1;
      return $this;
   }

   public function sum($number2) #Складываем $number1 и $number2
   {
      $this->number1 += $number2;
      return $this;
   }

   public function multiply($number2) #Умнажаем #number1 на $number2
   {
      $this->number1 *= $number2;
      return $this;
   }

   public function getResult() #Получаем результат
   {
      return $this->number1;
   }
}

$object = new Example();
$result = $object->setNumber1(2)->sum(3)->multiply(10)->getResult();

echo $result; // 50

#Альтернативная запись
$result = $object
   ->setNumber1(2)
   ->sum(3)
   ->multiply(10)
   ->getResult();

echo $result; // 50


//  МАГИЧЕСКИЕ МЕТОДЫ  //////////////////////////////////////////////////////////////

__construct() #Автоматически срабатывает при создании объекта
__distruct() #Автоматически срабатывает при удалении объекта
__toString() #Автоматически срабатывает при привидении объекта к строке
__set() #Автоматически срабатывает при установке значения неопределенному свойству
__get() #Автоматически срабатывает при получении значение неопределенного свойства

#Пример 
class Construct
{
	public function __construct()
	{
		echo "Объект был создан";
	}
}

$test = new Construct(); #Создаем (объект) экземпляр класса

#Пример
class Distruct {
    public function __destruct()
    {
        echo "Объект был уничтожен";
    }
}

$test = new Distruct();
unset($test); #Явно удаляем объект

#Пример
class ToString
{	
	public function __toString()
	{
		return "Объект приведен к строке";
	}
}

$test = new ToString;
echo $test; #Приводим объект к строке с помощью оператора echo

#Пример
class SetGet
{
	#В параметр попадает имя неопределенного свойства и устанавливоемое значение
   public function __set($name, $value)
	{
		echo "Вы не можете установить значение $value неопределенному свойству $name";
	}

	#В параметр попадает имя неопределенного свойства
	public function __get($name)
	{
		echo "Не могу получить значение неопределенного свойства $name";
	}
}

$test = new SetGet();

#Пытаемся получить и установить значение неопределенного свойства
$test->Property = 'Some Text'; # Сработает магический метод __set
echo $test->Property; # Сработает магический метод __get


//  ШАБЛОНЫ (ПАТТЕРНЫ) ПРОЕКТИРОВАНИЯ  ///////////////////////////////////////////////

# 1. Одиночка (Singleton) Запрещает создание более одного экземпляра класса
# Например когда мы создаем объект открывающий соединение с базой данных
# В контексте ООП слово 'Instance' означает объект(экземпляр класса)

#Пример
class SingletonClass
{
	private static $object;

	private function __construct()
	{

	}

	public static function createObject()
	{
		if(self::$object === null) {
	  		self::$object = new self();
		}
		return self::$object;
	}
}

$myObject = new SingletonClass; #Мы не можем создать экземпляр класса таким образом

$myObject1 = SingletonClass::createObject(); #Создаем единственный доступный объект
$myObject2 = SingletonClass::createObject(); #Получаем ссылку на созданный объект

