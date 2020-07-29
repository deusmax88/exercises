<?php
$a = [1, 2, 3];
// Expected output [1, 2, 3], [1, 3, 2], [2, 1, 3], [2, 3, 1], [3, 1, 2], [3, 2, 1]

$permutations = [];

function generatePermutations($arr, $prev = []) {
    global $permutations;

    if (count($arr) === 0) {
        $permutations[] = $prev;
        return;
    }

    for ($i = 0; $i < count($arr); $i++) {
        $copy = $arr;
        $prev[] = $arr[$i];
        array_splice($copy, $i, 1);
        generatePermutations($copy, $prev);
        array_pop($prev);
    }
}

generatePermutations($a);

var_dump($permutations);