<?php

use interfaces\IPrintPublicate;
use classes\BookProduct;
use classes\CdProduct;



function classAutoloader($class)
{	
	$file = __DIR__ . "/{$class}.php";
	if(file_exists($file)){
		require_once $file;
	}
}

spl_autoload_register('classAutoloader');




function offerCover(IPrintPublicate $product)
{
	echo "Предлагаем обложку для {$product->getName()}";
}

$book = new BookProduct('Azbuka', 50, 300);
$cd = new CdProduct('Vivaldi', 70, 180);



