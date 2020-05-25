<?php
// Originally viewed on https://www.youtube.com/watch?v=cQX3yHS0cLo

// The purpose is we need to decode a string of numbers
// and output how many ways there to decode a number
// e.g. string "12" we could possibly decode as
// AB and L which gives us 2 ways to decode such string

$s = "12";

$dp = [];
$dp[0] = 1;
$dp[1] = mb_substr($s,0, 1) == '0' ? 0 : 1;
for ($i = 2; $i <= strlen($s); $i++) {
    $oneDigit = mb_substr($s, $i - 1, 1);
    $twoDigits = mb_substr($s, $i - 2, 2);
    if ($oneDigit) {
        $dp[$i] += $dp[$i - 1];
    }

    if ($twoDigits >= 10 && $twoDigits <= 26) {
        $dp[$i] += $dp[$i - 2];
    }
}

var_dump($dp[count($dp) - 1]);