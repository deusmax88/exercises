<?php
// Originally viewed on https://www.youtube.com/watch?v=ED4ateJu86I&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=34
$s = "ababcbacadefegdehijhklij";

$partitionLengths = [];
$lastIndexes = [];
for ($i = 0; $i < mb_strlen($s); $i++) {
    $lastIndexes[mb_substr($s, $i, 1)] = $i;
}

$i = 0;
while ($i < mb_strlen($s)) {
    $end = $lastIndexes[mb_substr($s, $i ,1)];
    $j = $i;
    while($j != $end) {
        $end = max($end, $lastIndexes[mb_substr($s, $j++ ,1)]);
    }

    $partitionLengths[] = $j - $i + 1;
    $i = $j + 1;
}

var_dump($partitionLengths);