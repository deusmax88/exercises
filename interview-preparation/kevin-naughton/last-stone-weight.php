<?php
// Originally viewed on https://www.youtube.com/watch?v=fBPS7PtPtaE&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=46

$a = [2, 7, 4, 1, 8, 1];
$mh = new SplMaxHeap();
while($i = array_shift($a)) {
    $mh->insert($i);
}

while($mh->count() > 1) {
    $res = $mh->extract() - $mh->extract();
    if ($res) {
        $mh->insert($res);
    }
}

var_dump($mh->count() ? $mh->extract() : 0);