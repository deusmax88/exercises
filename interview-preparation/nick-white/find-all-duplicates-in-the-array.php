<?php
// Originally viewed on https://www.youtube.com/watch?v=aMsSF1Il3IY

// Given an array of integers, 1 <= $a[$i] <= $n, where $n is the size of array
// some elements appear twice and others appear once.

// Find all elements that appear twice in this array

$a = [4, 3, 2, 7, 8, 2, 3, 1];
// Expected output
// [2, 3]

// The trick is that each element is also represents valid index in the array
// by subtracting 1 and we mark that number negative so next time we could
// conclude that we've seen number we are currently scanning earlier

function findAllDuplicates($a)
{
    $duplicates = [];

    for ($i = 0; $i < count($a); $i++) {
        $num = abs($a[$i]);
        $idx = $num - 1;
        if ($a[$idx] < 0 ) {
            $duplicates[] = $num;
        }
        $a[$idx] = -$a[$idx];
    }

    return $duplicates;
}

var_dump(findAllDuplicates($a));