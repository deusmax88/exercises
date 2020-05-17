<?php
// Originally viewed on https://www.youtube.com/watch?v=ItjZdu6jEMs

$grid = [
    [1,3,1],
    [1,5,1],
    [4,2,1]
];
// The answer should be equals to 7
// we can only move down or to the right at any point

function minPathSum($grid) {
    if (!$grid) {
        return 0;
    }

    $dp = [];
    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            $dp[$i][$j] = $grid[$i][$j];
            if ($i > 0 && $j > 0) {
                $dp[$i][$j] += min($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
            elseif ($i > 0) {
                $dp[$i][$j] += $dp[$i - 1][$j];
            }
            elseif ($j > 0) {
                $dp[$i][$j] += $dp[$i][$j - 1];
            }
        }
    }

    return $dp[count($dp) - 1][count($dp[0]) - 1];
}

var_dump(minPathSum($grid));