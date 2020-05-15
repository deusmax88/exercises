<?php
// Originally viewed on https://www.youtube.com/watch?v=TI3e-17YAlc

$heights = [1, 8, 6, 2, 5, 4, 8, 3, 7];
// first solution
$max = 0;
for ($i = 0; $i < count($heights); $i++) {
    for ($j = $i + 1; $j < count($heights); $j++) {
        $min = min($heights[$i], $heights[$j]);
        $area = $min * ($j - $i);
        $max = max($max, $area);
    }
}
echo $max;

// second solution
$max = 0;
$i = 0;
$j = count($heights) - 1;
while($i < $j) {
    $min = min($heights[$i], $heights[$j]);
    $area = $min * ($j - $i);
    $max = max($max, $area);
    if ($heights[$i] < $heights[$j]) {
        $i++;
    }
    else {
        $j--;
    }
}

echo $max;