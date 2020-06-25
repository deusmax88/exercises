<?php
// Originally viewed on https://www.youtube.com/watch?v=3dqR2nYElyw&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=47

$a = [2,3,4];
// Expected output 14

$mh = new SplMinHeap();
for($i = 0; $i < count($a); $i++) {
    $mh->insert($a[$i]);
}

$cost = 0;
while($mh->count() > 1) {
    $currentPrice = $mh->extract() + $mh->extract();
    $mh->insert($currentPrice);
    $cost += $currentPrice;
}

var_dump($cost);