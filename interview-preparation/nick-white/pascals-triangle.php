<?php
// Originally viewed on https://www.youtube.com/watch?v=icoql2WKmbA&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=3&t=0s

$rows = 5;

var_dump(makeTriangle($rows));

function makeTriangle($rows) {
    $result = [];

    if ($rows == 0) {
        return $result;
    }

    $result[] = [1];

    $prevRow = [1];
    for($i = 1; $i < $rows; $i++) {
        $row = [];

        $row[] = 1;
        for ($j = 1; $j < $i; $j++) {
            $row[] = $prevRow[$j - 1] + $prevRow[$j];
        }
        $row[] = 1;

        $result[] = $row;
        $prevRow = $row;
    }

    return $result;
}