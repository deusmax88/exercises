<?php
// Originally viewed on https://www.youtube.com/watch?v=21OuwqIC56E&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=11&t=0s

// return all possible letter combinations that the number
// could represent
// This is a problem of generating sequences

$input = "23";
$output = ["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"];

$keypad = [
    [],
    [],
    ['a', 'b', 'c'],
    ['d', 'e', 'f'],
    ['g', 'h', 'i'],
    ['j', 'k', 'l'],
    ['m', 'n', 'o'],
    ['p', 'q', 'r', 's'],
    ['t', 'u', 'v'],
    ['w', 'x', 'y', 'z']
];

$keys = [];
for($i = 0; $i < mb_strlen($input); $i++) {
    $keys[] = mb_substr($input, $i, 1 );
}

$result = [];
letterCombinationRecursive($result, $keys, "", 0, $keypad);
var_dump($result);

function letterCombinationRecursive(&$result, &$keys, $current, $index, &$keypad)
{
    if ($index == count($keys)) {
        $result[] = $current;
        return;
    }

    $letters = $keypad[$keys[$index]];
    for ($i = 0; $i < count($letters); $i++) {
        letterCombinationRecursive($result, $keys, $current.$letters[$i], $index + 1, $keypad);
    }
}

