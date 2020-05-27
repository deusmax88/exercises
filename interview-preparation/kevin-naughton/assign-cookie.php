<?php
// Originally viewed on https://www.youtube.com/watch?v=1JDh9O7GDyA

$g = [1,2,3];
$s = [1,1];

// In this case i'll be one
sort($g);
sort($s);

$i = count($g) - 1;
$j = count($s) - 1;
$contentChildren = 0;
while ($i >= 0 && $j >= 0) {
    if ($s[$j] >= $g[$i]) {
        $i--;
        $j--;
        $contentChildren++;
    }
    else {
        $i--;
    }
}

var_dump($contentChildren);