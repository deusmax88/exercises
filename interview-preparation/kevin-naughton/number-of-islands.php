<?php
// Originally viewed https://www.youtube.com/watch?v=o8S2bO3pmO4

$m = [
    [1, 1, 0, 0, 0],
    [1, 1, 0, 0, 0],
    [0, 0, 1, 0, 0],
    [0, 0, 0, 1, 1]
];

$islands = 0;
for ($i = 0; $i < count($m); $i++) {
    for ($j = 0; $j < count($m[$i]); $j++) {
        if ($m[$i][$j] == 1) {
            sink($m, $i, $j);
            $islands++;
        }
    }
}

var_dump($islands);

function sink(&$m, $i, $j) {
    if ($i < 0 || $i >= count($m) || $j < 0 || $j >= count($m[$i]) || $m[$i][$j] == 0) {
        return;
    }

    $m[$i][$j] = 0;
    sink($m, $i + 1, $j);
    sink($m , $i - 1, $j);
    sink($m, $i, $j + 1);
    sink($m, $i, $j - 1);
}