<?php
// Originally viewed on https://www.youtube.com/watch?v=pD3cHFNyW2I
// Microsoft most asked question
$arr = [
    "un", "iq", "ue"
];

$result = null;

maxUnique($arr, 0, "", $result);

var_dump($result);

function maxUnique($arr, $index, $current, &$result) {
    if ($index == count($arr) && uniqueCharCount($current) > $result) {
        $result = mb_strlen($current);
        return;
    }
    if ($index == count($arr)) {
        return;
    }

    maxUnique($arr, $index + 1, $current, $result);
    maxUnique($arr, $index + 1, $current . $arr[$index], $result);
}

function uniqueCharCount($current)
{
    $hashMap = [];
    for($i = 0; $i < mb_strlen($current); $i++) {
        $char = mb_substr($current, $i, 1);
        if (!array_key_exists($char, $hashMap)) {
            $hashMap[$char]= true;
        }
        else {
            // String consists of non-unique characters
            return -1;
        }
    }

    return count($hashMap);
}