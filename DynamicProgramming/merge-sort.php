<?php

$a = [1,5,3,2,5];

$c = [14, 7, 3, 12, 9, 11, 6, 2];

function mergeSort($a, $p, $r)
{
    // Массив состоит из одного элемента, поэтому он уже
    // отсортирован
    if ($p == $r) {
        return $a;
    }

    // Найдем средний индекс по которому будем производить разбиение
    $q = floor(($p + $r) / 2);
    // Разделим по этому индексу на 2 подмассива
    $i = $p;
    $b = [];
    while($i <= $q) {
        $b[] = $a[$i];
        $i++;
    }
    $b = mergeSort($b, 0, count($b) - 1);

    $c = [];
    $i = $q + 1;
    while($i <= $r){
        $c[] = $a[$i];
        $i++;
    }

    $c = mergeSort($c, 0, count($c) - 1);

    $d = [];

    $e = array_shift($b);
    $f = array_shift($c);

    while (!is_null($e) || !is_null($f)) {

        if (is_null($e) && !is_null($f)) {
            $d[] = $f;
            $f = array_shift($c);
            continue;
        }

        if (!is_null($e) && is_null($f)) {
            $d[] = $e;
            $e  = array_shift($b);
            continue;
        }

        if ($e <= $f) {
            $d[] = $e;
            $e = array_shift($b);
        }
        else {
            $d[] = $f;
            $f = array_shift($c);
        }
    }


    return $d;
}

//$a = [2,1];

var_dump(mergeSort($a, 0, count($a) - 1));