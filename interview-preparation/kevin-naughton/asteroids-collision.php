<?php
// Originally viewed on https://www.youtube.com/watch?v=5AV33YdtDYw&list=PLi9RQVmJD2fbTqPjt-EbWt3EfAfIM_V_A

$asteroids = [-2, -1, 2, 1];
$lefts = [];

$result = [];
for($i = 0; $i < count($asteroids); $i++) {
    if ($asteroids[$i] > 0) {
        $lefts[] = $asteroids[$i];
        continue;
    }

    while($left = array_pop($lefts)) {
        if ($left + $asteroids[$i] < 0) {
            continue;
        }
        $lefts[] = $left;
        continue 2;
    }

    $result[] = $asteroids[$i];
}

while ($left = array_shift($lefts)) {
    $result[] = $left;
}

var_dump($result);

$i = 0;
$stack = [];
while($i < count($asteroids)) {
    if ($asteroids[$i] > 0) {
        $stack[] = $asteroids[$i];
    }
    else {
        while ((count($stack) > 0) && $stack[count($stack) - 1] > 0 && ($stack[count($stack) - 1] < abs($asteroids[$i]))) {
            array_pop($stack);
        }

        if ((count($stack) == 0) || $stack[count($stack) - 1] < 0) {
            $stack[] = $asteroids[$i];
        }
        elseif ($stack[count($stack) - 1] == abs($asteroids[$i])) {
            array_pop($stack);
        }
    }

    $i++;
}

var_dump($stack);