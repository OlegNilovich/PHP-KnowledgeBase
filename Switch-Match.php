<?php

// Конструкция Switch-Case

$i = 2;
switch ($i) {
	case 1:
		echo "One";
		break;
	case 2:
		echo "Two";
		break;
	case 3:
		echo "Three";
		break;
	default:
		echo "ERROR";
		break;
}


// Конструкция Match

$i = 2;
$result = match ($i) {
    1 => "One",
    2 => "Two",
    3 => "Three",
    default => "ERROR",
};

echo $result; // Выведет "Two"