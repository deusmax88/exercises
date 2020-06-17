<?php
// Originally viewed on https://www.youtube.com/watch?v=sRKByfozeEg&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=9&t=0s

$a = [3, 2, 2, 3];
$val = 3;

$index = 0;
for($i = 0; $i < count($a); $i++) {
    if ($a[$i] != $val) {
        $a[$index++] = $a[$i];
    }
}

var_dump($index);