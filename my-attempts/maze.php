<?php

$maze = [
    [0, 0, 0],
    [0, 1, 0],
    [0, 0, 0]
];

$paths = [];

solve($maze, 0, 0);

var_dump($paths);

function solve(&$maze, $i, $j, $path = []) {
    global $paths;

    if ($i < 0 || $i >= count($maze) || $j < 0 || $j >= count($maze[$i]) || $maze[$i][$j] == 1) {
        return;
    }

    // Add current cell to path
    $path[] = [$i, $j];
    // We've reached our final destination
    // which is in out case is right bottom corner
    if ($i == count($maze) - 1 && $j == count($maze[$i]) - 1) {
        $paths[] = $path;
        return;
    }

    // Mark current cell as visited with 1
    $maze[$i][$j] = 1;
    // Try to go in square directions
    solve($maze, $i + 1, $j, $path);
    solve($maze, $i - 1, $j, $path);
    solve($maze, $i, $j + 1, $path);
    solve($maze, $i, $j - 1, $path);
}