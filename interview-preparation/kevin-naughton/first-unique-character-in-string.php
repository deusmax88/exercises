<?php
// Originally viewed on https://www.youtube.com/watch?v=St47WCbQa9M
// Find first non-repeating character and return it's index. If it doesn't exist, return -1.
$s1 = $s = "leetcode"; // Should return 0.
$s2 = $s = "loveleetcode"; // Should return 2.

// My Solution
$hash = [];
while($letter = mb_substr($s, 0,1)) {
    $hash[$letter]++;
    $s = mb_substr($s, 1);
}

$minimalPos = mb_strlen($s2);
foreach ($hash as $letter => $count) {
    if ($count > 1) {
       continue;
    }

    $pos = mb_strpos($s2, $letter);
    if ($pos < $minimalPos) {
        $minimalPos = $pos;
    }
}

if ($minimalPos == mb_strlen($s2)) {
    var_dump(-1);
}
else {
    var_dump($minimalPos);
}

// Original Solution
$s = $s2;
$hash = [];
$index = 0;
while($letter = mb_substr($s, 0, 1)) {
    if (!array_key_exists($letter, $hash)) {
        $hash[$letter] = $index;
    }
    else {
        $hash[$letter] = -1;
    }

    $s = mb_substr($s, 1);
    $index++;
}

$firstIndex = mb_strlen($s2);
foreach($hash as $letter => $index) {
    if ($index != -1 && $index < $firstIndex) {
        $firstIndex = $index;
    }
}

var_dump($firstIndex == mb_strlen($s2) ? -1 : $firstIndex);