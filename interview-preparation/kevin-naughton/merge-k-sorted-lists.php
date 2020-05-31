<?php
// Originally viewed on https://www.youtube.com/watch?v=zLcNwcR6yO4&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=22

// Candidate for multithreaded solution
$lists = [
    [1, 4, 5],
    [1, 3, 4],
    [2, 6]
];

// The result is gonna be [1, 1, 2, 3, 3, 4]

$result = [];
$minHeap = new SplMinHeap();
foreach($lists as $list) {
    while ($val = array_shift($list)) {
        $minHeap->insert($val);
    }
}

while (!$minHeap->isEmpty()) {
    $result[] = $minHeap->extract();
}

var_dump($result);