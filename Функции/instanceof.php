<?php

#Оператор instanceof проверяет пренадлежность объекта к какому-либо классу

$book = new BookProduct('Azbuka', 50, 300);

var_dump($book instanceof BookProduct);  //  True
var_dump($book instanceof Product);      //  True