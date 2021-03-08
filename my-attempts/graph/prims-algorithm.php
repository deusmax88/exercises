<?php
// Here's my implementation on finding minimum spanning tree algorithm

$V = [1,2,3,4,5,6];
$E = [
    [1, 2, 4],
    [1, 3, 2],
    [2, 3, 4],
    [3, 4, 3],
    [3, 6, 2],
    [3, 5, 4],
    [6, 5, 3],
    [4, 5, 2]
];

$v = 1;

function findMinEdge($v, &$Е)
{
    $minEdge = null;
    $minEdgeIdx = null;
    foreach($E as $idx => $e) {
        if ($e[0] == $v) {
            if (is_null($minEdge) || $e[2] < $minEdge[2]) {
                $minEdge = $e;
                $minEdgeIdx = $idx;
            }
        }
    }

    return [$minEdge, $minEdgeIdx];
}

function vertexIdx($v, &$V)
{
    $idx = null;

    foreach($V as $idx => $_v) {
        if ($_v == $v) {
            break;
        }
    }

    return $idx;
}

[$minEdge, $minEdgeIdx] = findMInEdge($v, $E);
$SE[] = $minEdge;
$SV[] = $v;

unset($E[$minEdgeIdx]);
if ($idx = vertexIdx($v, $V)) {
    unset($V[$idx]);
}

