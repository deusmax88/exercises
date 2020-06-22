<?php
// Originally viewed on https://www.youtube.com/watch?v=ptgykfAEax8&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=23

$s = ["eat", "tea", "tan", "ate", "nat", "bat"];

$map = [];

while ($str = array_shift($s)) {
    $i = 0;
    $a = [];
    while ($c = mb_substr($str, $i++, 1)) {
        $a[] = $c;
    }
    sort($a);
    $key = join('', $a);
    $map[$key][] = $str;
}

var_dump(array_values($map));