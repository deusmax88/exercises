<?php
// Originally viewed on https://www.youtube.com/watch?v=1NXs_idViuQ&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=43

$s = "hello";

$s = str_split($s);

$vowels = ['a', 'e', 'i', 'o', 'u'];
$vowels = array_flip($vowels);

$i = 0;
$j = count($s) - 1;
while($i < $j) {
    if (!$vowels[$s[$i]]) {
        $i++;
        continue;
    }

    if (!$vowels[$s[$j]]) {
        $j--;
        continue;
    }

    $t = $s[$i];
    $s[$i] = $s[$j];
    $s[$j] = $t;
    $i++;
    $j--;
}

var_dump($s);