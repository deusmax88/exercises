<?php
// Originally viewed on https://www.youtube.com/watch?v=wdt3_BeF3d0

$n = 15;
$output = [];
for($i = 1; $i <= $n; $i++) {
    $elem = "";
    if ($i % 3 == 0) {
        $elem = "Fizz";
    }

    if ($i % 5 == 0) {
        $elem .= "Buzz";
    }

    if(strlen($elem) == 0) {
        $elem = (string) $i;
    }

    $output[] = $elem;
}

var_dump($output);