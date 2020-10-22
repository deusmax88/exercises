<?php

// И так сортировка слиянияем или mergesort
// 2 стадии - стадия деления и стадия слияния

// Cлияние 2-х массивов

function merge($a, $b)
{
    $i = $j = 0;
    $merged = [];

    // Так или иначе нам нужно слить все элементы из 2-х массивов

    while ($i < count($a) && $j < count($b)) {
        if ($a[$i] < $b[$j]) {
            $merged[] = $a[$i];
            $i++;
        } else {
            $merged[] = $b[$j];
            $j++;
        }
    }

    while ($i < count($a)) {
        // Проходим до конца первый массив
        $merged[] = $a[$i++];
    }

    while ($j < count($b)) {
        // Проходим до конца второй массив
        $merged[] = $b[$j++];
    }

    return $merged;
}

$c = [1,3];
$d = [2,4];

var_dump(merge($c, $d));

function merge_sort($a)
{
    // Базовый сценарий - массив из одного элемента отсортирован
    if (count($a) == 1) {
        return $a;
    }

    // Делим попалам
    $middle = intdiv(count($a) , 2);
    $leftHalf = array_slice($a, 0, $middle);
    $rightHalf = array_slice($a, $middle);

    $leftSorted = merge_sort($leftHalf);
    $rightSorted = merge_sort($rightHalf);

    return merge($leftSorted, $rightSorted);
}

var_dump(merge_sort([2,1, 10, 256, 17, 44, 55]));