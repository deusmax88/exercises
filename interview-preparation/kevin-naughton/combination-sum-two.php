<?php
// Originally viewed on https://www.youtube.com/watch?v=IER1ducXujU&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=33&t=51s

$candidates = [10,1,2,7,6,1,5];
$target = 8;

// Expected output
// [[1,7], [1,2,5], [2,6], [1,1,6]]

$result = [];
sort($candidates);

$current = [];
findCombinations($candidates, 0, $target, $current, $result);

var_dump($result);

function findCombinations(&$candidates, $index, $target, $current, &$result) {
    if ($target == 0) {
        $result[] = $current;
        return;
    }

    if ($target < 0) {
        return;
    }

    for($i = $index; $i < count($candidates); $i++) {
        if ($i == $index || $candidates[$i] != $candidates[$i - 1]) {
            $current[] = $candidates[$i];
            findCombinations($candidates, $i + 1, $target - $candidates[$i], $current, $result);
            array_pop($current);
        }
    }
}