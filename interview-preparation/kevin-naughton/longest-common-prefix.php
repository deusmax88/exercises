<?php
// Originally viewed on https://www.youtube.com/watch?v=1YQmI7F9dJ0&list=PLi9RQVmJD2faJPB39DQ3IOgYQUJxcj9g0

$a = [
    "flower",
    "flow",
    "flight",
];

$prefix = "";
$start = 0;

while( $char = check($a, $i)) {
    $prefix .= $char;
    $i++;
}

function check(&$a, $i)
{
    $b = mb_substr($a[0], $i ,1 );
    $c = mb_substr($a[1], $i, 1);
    $d = mb_substr($a[2], $i , 1);

    return (($b == $c) && ($c == $d)) ? $b : false;
}

var_dump($prefix);