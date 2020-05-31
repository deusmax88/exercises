<?php
// Originally viewed on https://www.youtube.com/watch?v=vYYNp0Jrdv0&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=33

$board = [
    ['A', 'B', 'C', 'E'],
    ['S', 'F', 'C', 'S'],
    ['A', 'D', 'E', 'E']
];

$words = [
    'ABCCED', // should return true
    'SEE', // should return true
    'ABCB', // should return false
];

$word = $words[0];
$found = false;
for( $i = 0; $i < count($board); $i++) {
    for( $j = 0; $j < count($board[$i]); $j++){
        if ($board[$i][$j] == mb_substr($word, 0, 1) && dfs($board, $i, $j, $word, 0)) {
            $found = true;
        }
    }
}

function dfs(&$board, $i, $j, &$word, $count) {
    if ($count == mb_strlen($word)) {
        return true;
    }

    if ($i < 0 || $i >= count($board)
        || $j < 0 || $j >= count($board[$i])
        || $board[$i][$j] != mb_substr($word, $count, 1)) {
        return false;
    }

    $temp = $board[$i][$j];
    $board[$i][$j] = ' ';
    $found = dfs($board, $i + 1, $j, $word, $count + 1) ||
        dfs($board, $i - 1, $j, $word, $count + 1) ||
        dfs($board, $i, $j + 1, $word, $count + 1) ||
        dfs($board, $i, $j - 1, $word, $count + 1);
    $board[$i][$j] = $temp;

    return $found;
}

var_dump($found);