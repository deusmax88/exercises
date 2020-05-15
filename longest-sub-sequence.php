<?php
$a = [2, 6, 1, 9, 4, 5, 3];

function L(&$a, $length, &$grandMax) {
    if ($length == 1) {
        return 1;
    }

    $currentMax = 1;

    for($i = 1; $i < $length; $i++) {
        $res = L($a, $i, $grandMax);
        if ($a[$i - 1] < $a[$length - 1] && $res + 1 > $currentMax) {
            $currentMax = $res + 1;
        }
    }

    if ($grandMax < $currentMax) {
        $grandMax = $currentMax;
    }

    return $currentMax;
}

function LIS(&$a, $length) {
    $max = 1;

    L($a, $length, $max);

    return $max;
}

var_dump(LIS($a, count($a)));