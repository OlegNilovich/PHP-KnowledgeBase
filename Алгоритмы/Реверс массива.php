<?php

$nums = [11, 22, 33, 44];
$reversed = [];

for ($i = count($nums) - 1; $i >= 0; $i--) {

    $reversed[] = $nums[$i];
}

print_r($reversed);
