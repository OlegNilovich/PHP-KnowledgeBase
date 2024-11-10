<?php  

// Линейный поиск эллементов в массиве (алгоритм)
// в php есть встроенная функция array_scearch

function linear_search($arr, $fruit)
{
   $n = count($arr);
   for ($i = 0; $i < $n; $i++) {
      if ($arr[$i] === $fruit) {
         return $i;
      }
   }
   return null;
}


$index = linear_search($fruits, $search_fruit);

if ($index === null) {
   echo "$search_fruit not found in the array.";
} else {
   echo "$search_fruit found at index $index.";
}


$fruits = ['apple', 'banana', 'orange', 'kiwi', 'mango'];
$search_fruit = 'kiwi';

