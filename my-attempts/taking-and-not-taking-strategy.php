<?php

$a = [1,2,3];

$subsets = [];

generateSubSets($a, 0,$subsets);

function generateSubSets(&$a, $index, &$subsets, $current = []) {
    $subsets[] = $current;

    for($i = $index; $i < count($a); $i++) {
        $current[] = $a[$i];
        generateSubSets($a, $i + 1, $subsets, $current);
        array_pop($current);
    }
}

var_dump($subsets);