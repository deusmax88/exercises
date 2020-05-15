<?php
// Originally viewed on https://www.youtube.com/watch?v=ySTQCRya6B0
// Couldn't deeply understand what is going here need to google it
// once again

$tasks = ['A', 'B', 'C'];
$n = 3;


$numOfTasks = [];
while($task = array_shift($tasks)) {
    $numOfTasks[$task] += 1;
}

$maxHeap = new SplMaxHeap();
foreach(array_values($numOfTasks) as $taskCount)
    $maxHeap->insert($task);

$cycles = 0;
while (!$maxHeap->isEmpty()) {
    $temp = [];
    for($i = 0; $i < $n + 1; $i++) {
        if (!$maxHeap->isEmpty()) {
            $temp[] = $maxHeap->extract();
        }
    }

    while($i = array_shift($temp)) {
        if (--$i > 0 ) {
            $maxHeap->insert($i);
        }
    }

    $cycles += $maxHeap->isEmpty() ? count($temp) : $n + 1;
}