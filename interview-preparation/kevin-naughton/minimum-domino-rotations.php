<?php
// Originally viewed on https://www.youtube.com/watch?v=9Q73ScVu2GI&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=50
$a = [2, 1, 2, 4, 2, 2];
$b = [5, 2, 6, 2, 3, 2];

// This is counterexample
//$a = [3,5,1,2,3];
//$b = [3,6,3,3,4];

// First i check whether it task can be accomplished
$ah = [];
$bh = [];
$total = count($a);

for($i = 0; $i < count($a); $i++) {
    // rotation of equal domino doesn't make any sense
    if ($a[$i] == $b[$i]) {
        // we will effectively subtract this from total
        $total--;
        continue;
    }

    $ah[$a[$i]]++;
    $bh[$b[$i]]++;
}

$rotations = -1;
// Now check if that is our case
foreach($ah as $num => $times) {
    if ($bh[$num] + $times == $total) {
        $rotations = min($bh[$num], $times);
        break;
    }
}

var_dump($rotations);

// Kevin's solution is better because it doesn't needs additional memory
$minSwaps = min(
    minSwaps($a[0], $a, $b),
    minSwaps($a[0], $b, $a),
    minSwaps($b[0], $a, $b),
    minSwaps($b[0], $b, $a)
);

var_dump($minSwaps == PHP_INT_MAX ? -1 : $minSwaps);

function minSwaps($target, $a, $b) {
    $swaps = 0;
    for ($i = 0; $i < count($a); $i++) {
        if ($a[$i] != $target
            && $b[$i] != $target) {
            return PHP_INT_MAX;
        }

        if ($a[$i] != $target) {
            $swaps++;
        }
    }

    return $swaps;
}