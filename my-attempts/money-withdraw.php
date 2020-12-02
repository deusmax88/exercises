<?php

$initialNomsCounts = [
    2 => 2,
    5 => 2
];

$noms = array_keys($initialNomsCounts);
$counts = array_values($initialNomsCounts);

function withdraw($amount, $nomIdx, $noms, $counts)
{
    if ($amount == 0) {
        return true;
    }

    if ($nomIdx >= count($noms)) {
        return false;
    }

    $i = 1;
    $curNom = $noms[$nomIdx];
    while ($amount >= $curNom * $i
        && $i <= $counts[$nomIdx]) {
        $i++;
    }
    $i--;
    $newAmount = $amount - $curNom * $i;
    return withdraw($newAmount, $nomIdx + 1, $noms, $counts);
}

function composition($amount, $noms, $nomIdx, $counts, &$composition) {
    if ($amount == 0) {
        return;
    }

    if ($nomIdx >= count($noms)) {
        $composition = [];
        return;
    }

    $i = 1;
    $curNom = $noms[$nomIdx];
    while ($amount >= $curNom * $i && $i <= $counts[$nomIdx]) {
        $i++;
    }
    $i--;
    $composition[$curNom] = $i;
    composition($amount - $curNom * $i, $noms, $nomIdx + 1, $counts, $composition);
}

$amount = 14;

composition($amount, $noms, 0, $counts, $composition);
var_dump($composition);

var_dump(withdraw($amount, 0, $noms, $counts));
