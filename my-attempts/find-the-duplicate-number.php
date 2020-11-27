<?php
// array of n + 1 integers, where n is the length of the array
// each element is between 1 and n inclusive
// prove that at least one duplicate number exists
// original array must not be modified
// we can use only O(1) additional memory

$a = [1, 2, 3, 4, 3];

$low = 1;
$high = 4;

function findDuplicate($a) {
    $low = 1;
    $high = count($a) - 1;
    while ($low <= $high) {
        $mid = intdiv($high + $low, 2);

        $count = 0;
        foreach($a as $num) {
            if ($num <= $mid) {
                $count++;
            }
        }
        if ($count <= $mid) {
            $low = $mid + 1;
        }
        else {
            $high = $mid - 1;
        }
    }

    return $low;
}

var_dump(findDuplicate($a));