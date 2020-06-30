<?php
// Originally viewed on https://www.youtube.com/watch?v=evesA3gr9BE

$s = "abc";
$t = "abcbc";

var_dump(shortestWay($s, $t));

function shortestWay($source, $target) {
    $numSubsequences = 0;
    $remaining = $target;
    while(mb_strlen($remaining) > 0) {
        $subsequence = "";
        $i = 0;
        $j = 0;
        while ($i < mb_strlen($source) && $j < mb_strlen($remaining)) {
            if (mb_substr($source, $i++, 1) == mb_substr($remaining, $j, 1)) {
                $subsequence .= mb_substr($remaining, $j++, 1);
            }
        }

        if (mb_strlen($subsequence) == 0) {
            return -1;
        }

        $numSubsequences++;
        $remaining = mb_substr($remaining, mb_strlen($subsequence));
    }

    return $numSubsequences;
}
