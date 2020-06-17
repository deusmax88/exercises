<?php
// Originall viewed on https://www.youtube.com/watch?v=LdtQAYdYLcE&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=36

$n = [1,2,3];

// We need to build all possible subsets
// Expected output: [ [3], [2], [1], [1,2,3], [1,3], [2,3], [1,2], [] ]

$result = [];

function generateSubSets($index, &$nums, &$current, &$result) {
    $result[] = $current;
    for($i = $index; $i < count($nums); $i++) {
        $current[] = $nums[$i];
        generateSubSets($i + 1, $nums, $current, $result);
        array_pop($current);
    }
}

$b = [];
generateSubSets(0, $n, $b, $result);
var_dump($result);