<?php

$result = sprintf('Today is %s %d', 'February', 8);
print_r($result); // => Today is February 8

$result = sprintf('Today is %s %04d', 'February', 8);
print_r($result); // => Today is February 0008

$d = 3; $m = 5; $y = 2010;
$result = sprintf('Curent date is: %02d-%02d-%04d', $d, $m, $y);
print_r($result); // => Curent date is: 03-05-2010
