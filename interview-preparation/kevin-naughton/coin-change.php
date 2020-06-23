<?php
// Originally viewed on https://www.youtube.com/watch?v=1R0_7HqNaW0&t=25s

$coins = [1, 2, 5]; // I'am assuming that nominals are sorted
$amount = 11; // I'am assuming that amount is positive

$coins = [2];
$amount = 3;

$grandCount = 0;

for ($i = count($coins) - 1; $i >= 0 && $amount > 0; $i--) {
    $coin = $coins[$i];

    $count = 0;
    while ($amount - $coin >= 0) {
        $count++;
        $amount -= $coin;
    }

    $grandCount += $count;
}

if ($amount == 0) {
    var_dump($grandCount);
}
else {
    var_dump(-1);
}

// But as Kevin said this is the classical dynamic programming problem
$coins = [1, 2, 5];
$amount = 11;

//$coins = [2];
//$amount = 3;
$dp = array_fill(0, $amount + 1, $amount + 1);
$dp[0] = 0;
for ($i = 0; $i <= $amount; $i++) {
    for ($j = 0; $j < count($coins); $j++) {
        if ($coins[$j] <= $i) {
            $dp[$i] = min($dp[$i], 1 + $dp[$i - $coins[$j]]);
        }
    }
}

var_dump($dp[$amount] > $amount ? -1 : $dp[$amount]);

