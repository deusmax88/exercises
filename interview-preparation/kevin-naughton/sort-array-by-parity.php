<?php
// Originally viewed on https://www.youtube.com/watch?v=KMaQjKaeBIE&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=31

$a = [1,2,3,4,5];

$i = 0;
$j = count($a) - 1;
while($i < $j) {
    if ($a[$i] % 2 == 0) {
        $i++;
        continue;
    }
    if ($a[$j] % 2 == 1) {
        $j--;
        continue;
    }

    $t = $a[$i];
    $a[$i] = $a[$j];
    $a[$j] = $t;
    $i++;
    $j--;
}

var_dump($a);

// Solution of Kevin
$a = [1, 2, 3, 4, 5];

$index = 0;
for($i = 0; $i < count($a); $i++) {
    if ($a[$i] % 2 == 0) {
        $t = $a[$index];
        $a[$index++] = $a[$i];
        $a[$i] = $t;
    }
}

var_dump($a);