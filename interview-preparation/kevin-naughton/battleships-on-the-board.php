<?php
// Originally viewed on https://www.youtube.com/watch?v=wBG6078g1gE

$b = [
    [1, 0, 0, 1],
    [0, 0, 0, 1],
    [0, 0, 0, 1],
    [0, 0, 0, 1]
];

//var_dump(count($b));
//var_dump(count($b[0]));


$numOfBattleships = 0;
for ($i = 0; $i < count($b); $i++) {
    for ($j = 0; $j < count($b[$i]); $j++) {
        if ($b[$i][$j] == 1) {
            $numOfBattleships++;
            sink($b, $i, $j);
        }
    }
}

function sink(&$b, $i, $j) {
    if ($i < 0 || $i >= count($b) || $j < 0 || $j >= count($b[$i]) || $b[$i][$j] != 1) {
        return;
    }

    $b[$i][$j] = 0;
    sink($b, $i + 1, $j);
    sink($b, $i - 1, $j);
    sink($b, $i, $j + 1);
    sink($b, $i, $j - 1);
}

for ($i = 0; $i < count($b); $i++) {
    for ($j = 0; $j < count($b[$i]); $j++) {
        if ($b[$i][$j] == 0) {
            continue;
        }
        if ($i > 0 && $b[$i - 1][$j] == 1) {
            continue;
        }
        if ($j > 0 && $b[$i][$j - 1] == 1) {
            continue;
        }
        $numOfBattleships++;
    }
}