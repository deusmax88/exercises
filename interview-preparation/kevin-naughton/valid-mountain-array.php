<?php
// Originally viewed on https://www.youtube.com/watch?v=WWysBX-N2Ak&list=PLi9RQVmJD2fapKJ4DnZzAn55NJfo5IM1c&index=52

$a = [2,1];
$b = [3,5,5];
$c = [0,3,2,1];

var_dump(validMountain2($c));

function validMountain($a) {
    if (count($a) < 3) {
        return false;
    }

    $i = 0;
    $j = count($a) - 1;
    while ($i < $j) {
        if ($a[$i] < $a[$i + 1]) {
            $i++;
        }
        else {
            break;
        }
    }

    while ($j > $i) {
        if ($a[$j] < $a[$j - 1]) {
            $j--;
        }
        else {
            break;
        }
    }

    return $i == $j;
}

function validMountain2($a) {
    if (count($a) < 3) {
        return false;
    }

    $i = 0;
    $j = count($a) - 1;
    $iIncStop = false;
    $jDecStop = false;
    while ($i <= $j) {
        if ($a[$i] < $a[$i + 1]) {
            $i++;
        }
        else {
            $iIncStop = true;
        }

        if ($a[$j] < $a[$j - 1]) {
            $j--;
        }
        else {
            $jDecStop = true;
        }

        if ($iIncStop && $jDecStop) {
            return $i == $j;
        }
    }
}