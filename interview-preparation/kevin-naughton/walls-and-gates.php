<?php
// Originally viewed on https://www.youtube.com/watch?v=Pj9378ZsCh4

// -1 - wall
// 0 - gate
// PHP_INT_MAX - means empty room
// populate each empty cell with
//

$grid = [
    [PHP_INT_MAX, -1, 0, PHP_INT_MAX],
    [PHP_INT_MAX, PHP_INT_MAX, PHP_INT_MAX, -1],
    [PHP_INT_MAX, -1, PHP_INT_MAX, -1],
    [0, -1, PHP_INT_MAX, PHP_INT_MAX]
];

// The result should be
// 3 -1  0  1
// 2  2  1 -1
// 1 -1  2 -1
// 0 -1  3  4

// So here we are gonna find gets
for($i = 0; $i < count($grid); $i++) {
    for($j = 0; $j < count($grid[$i]); $j++) {
        // current cell is gate
        if ($grid[$i][$j] == 0) {
            dfs($grid, $i, $j);
        }
    }
}

function dfs(&$grid, $i, $j, $distance = 0) {
    if ($i < 0 || $i >= count($grid)
        || $j < 0 || $j >= count($grid[$i])
        || $grid[$i][$j] < $distance) {
        return;
    }

    $grid[$i][$j] = $distance;

    dfs($grid, $i - 1, $j, $distance + 1);
    dfs($grid, $i + 1, $j, $distance + 1);
    dfs($grid, $i, $j - 1, $distance + 1);
    dfs($grid, $i, $j + 1, $distance + 1);
}