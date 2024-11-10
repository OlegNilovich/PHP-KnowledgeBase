<?php


class ArrayMax
{
	public static function findMaxNumLessThanGiven($nums, $given)
	{
		$max = null;

		foreach ($nums as $num) {
			
			if ($num < $given) {
				$max = max($max, $num);
			}
		}
		
		return $max;
	}

	public static function findTopOfElements($array, $numberOfEllements)
	{
		$topOfEllements = [];
		$previousMax = PHP_INT_MAX;

		for ($i=0; $i < $numberOfEllements; $i++) { 
			
			$curentMax = self::findMaxNumLessThanGiven($array, $previousMax);

			$previousMax = $curentMax;

			$topOfEllements[$i] = $curentMax;
		}

		return $topOfEllements;
	}

}

$nums = [33, 22, 11, 66, 55, 44];

$top3nums = ArrayMax::findTopOfElements($nums, 3);

print_r($top3nums);

/*
    [0] => 66
    [1] => 55
    [2] => 44
*/
