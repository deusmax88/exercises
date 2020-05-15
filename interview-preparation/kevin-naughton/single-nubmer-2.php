<?php
// Originally viewed on https://www.youtube.com/watch?v=LnB2DbxuREo
// Input
$a = [2, 2, 3, 2];
// Output
// 3

// Input
$b = [0, 1, 0, 1, 0, 1, 99];
// Output
// 99

$nums = [];
$i = 0;
while($i < count($a)) {
   $nums[$a[$i]]++;
   $i++;
}

foreach($nums as $num => $counts) {
    if ($counts == 1) {
        echo $num;
        die();
    }
}