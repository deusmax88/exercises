<?php
// Originally viewed on https://www.youtube.com/watch?v=3N47yKRDed0&list=PLi9RQVmJD2fYckvJZSKA4YcUQ4eyNupuY&index=37&t=0s
$a = [1, 11, 5, 5];

// Expected output true [5,5,1] [11]
// Seems that this is about strategy of taking
// and not taking elements
$b = [1, 2, 3, 5];

var_dump(canPartition($a));

function canPartition($a)
{
    $total = 0;
    for($i = 0; $i < count($a); $i++) {
        $total += $a[$i];
    }

    if ($total % 2 != 0) {
        return false;
    }

    return canPartitionDeeper($a, 0, 0, $total, $map);
}

function canPartitionDeeper($a, $index, $sum, $total, &$map) {
    $current = $index.$sum;
    if (array_key_exists($current, $map)){
        return $map[$current];
    }

    if ($sum * 2 == $total) {
        return true;
    }
    if ($sum > $total / 2 || $index >= count($a)) {
        return false;
    }

    $foundPartition = canPartitionDeeper($a, $index+1, $sum, $total, $map) ||
        canPartitionDeeper($a, $index + 1, $sum + $a[$index], $total, $map);
    $map[$current] = $foundPartition;

    return $foundPartition;
}
