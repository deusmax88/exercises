<?php
// Originally viewed on https://www.youtube.com/watch?v=zaM_GLLvysw&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=51

$s = "aab";
// Expected output "aba"

//$s = "aaab";
// Expected output ""

$map = [];
for($i = 0; $i < mb_strlen($s); $i++) {
    $c = mb_substr($s, $i, 1);
    $map[$c]++;
}

$pq = new \SplPriorityQueue();
foreach($map as $c => $count) {
    $pq->insert($c, $count);
}

$result = "";
while($pq->count() > 1) {
    $current = $pq->extract();
    $next = $pq->extract();
    $result .= $current;
    $result .= $next;
    $map[$current]--;
    $map[$next]--;
    if ($map[$current] > 0) {
        $pq->insert($current, $map[$current]);
    }
    if ($map[$next] > 0) {
        $pq->insert($next, $map[$next]);
    }
}

if (!$pq->isEmpty()) {
    $last = $pq->extract();
    if ($map[$last] > 1) {
        $result = "";
    }
    else {
        $result .= $last;
    }
}

var_dump($result);