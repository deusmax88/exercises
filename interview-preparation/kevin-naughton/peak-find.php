<?php
// Originally viewed on https://www.youtube.com/watch?v=CFgUQUL7j_c

// Here we gonna find peak element, whose value is greater then
// it's neighbours

$a = [1, 2, 3, 1]; // Should output 2 as $a[2]=3 and 3 is greater
                // than it's neighbours
$left = 0;
$right = count($a) - 1;
while ($left < $right) {
    $mid = $left + ($right - $left) / 2;
    if ($a[$mid] < $a[$mid + 1] ) {
        $left = $mid + 1;
    }
    else {
        $right = $mid;
    }
}

var_dump($left);