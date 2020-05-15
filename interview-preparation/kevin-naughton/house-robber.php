<?php
// Originally viewed on https://www.youtube.com/watch?v=xlvhyfcoQa4
// We are using dynamic programming

$houses = [1,2,3,1];

function robHouses($houses) {
    if (!$houses) {
        return 0;
    }

    if (count($houses) == 1) {
        return $houses[0];
    }

    if (count($houses) == 2) {
        return max($houses[0], $houses[1]);
    }

    $dp = [];
    $dp[0] = $houses[0];
    $dp[1] = max($houses[1], $dp[0]);
    for($i = 2; $i < count($houses); $i++) {
        $dp[$i] = max($dp[$i - 2] + $houses[$i], $dp[$i - 1]);
    }

    return $dp[count($houses) - 1];
}

var_dump(robHouses($houses));