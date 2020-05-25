<?php
// Originally viewed on https://www.youtube.com/watch?v=uHAToNgAPaM

// This is the number of stairs
$numOfStairs = 2;
// At each time we could step up
// for one or two steps at a time
// For this question to answer we could

$dp = [];
$dp[0] = 1;
$dp[1] = 1;

for ($i = 2; $i <= $numOfStairs; $i++) {
    $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
}

var_dump($dp[$i - 1]);