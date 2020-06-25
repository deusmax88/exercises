<?php

$a = [1,2,3];

$result = [];

function strategy(&$a, $start, $current)
{
    if ($start == count($a)) {
        global $result;
        $result[] = $current;
        return;
    }

    for($i = $start; $i < count($a); $i++) {
        $current[] = $a[$i];
        strategy($a, $i + 1, $current);
        array_pop($current);
    }
}

$current = [];
strategy($a, 0, $current);

var_dump($result);