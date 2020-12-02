<?php
$a = [1, 2, 4, 5];

$targetSum = (1 + count($a) + 1) * (count($a) + 1) / 2;
$sum = 0;
foreach($a as $num) {
    $sum += $num;
}

return $targetSum - $sum;

