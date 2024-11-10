<?php

// Поиск уникальных значений в неотсортированном массиве

$nums = [55, 11, 44, 33, 44, 11, 44, 55];

function uniqueArray($nums)
{
    $uniqueNumbers = [];
    $iterations = 0;

    foreach ($nums as $num) {
    	$iterations++;
        $alreadyExist = false;

        foreach ($uniqueNumbers as $uniqueNum) {
    		$iterations++;
            if ($num === $uniqueNum) {
                $alreadyExist = true;
                break;
            }
        }

        if ($alreadyExist === false) {
            $uniqueNumbers[] = $num;
        }
    }

   	echo "iterations: $iterations" . PHP_EOL;
    return $uniqueNumbers;
}

$uniqueNums = uniqueArray($nums);
print_r($uniqueNums);
