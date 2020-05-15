<?php
// Originally viewed on https://www.youtube.com/watch?v=IhJgguNiYYk&list=PLi9RQVmJD2fY_-QarOPWzUepqEkHda2UY

$a = ['a','a','b','b','b','c','c','c'];

$i = 0;
$index = 0;
while($i < count($a)) {
    $j = $i;

    while($j < count($a) && $a[$i] == $a[$j]) {
        $j++;
    }

    $a[$index++] = $a[$i];
    if ($j - $i > 1) {
        $chars = (string) $j - $i;
        while ($char = mb_substr($chars, 0, 1)) {
            $a[$index++] = $char;
            $chars = mb_substr($chars, 1);
        }
    }

    $i = $j;
}


var_dump($a);
var_dump($index);