<?php

// This topological sort uses BFS traversal
function topologicalSortBFS($N, $adj) {
    $T = [];
    $visited = [];
    $in_degree = [];

    for ($i = 0; $i < $N; $i++) {
        $in_degree[$i] = 0;
        $visited[$i] = false;
    }

    for ($i = 0; $i < $N; $i++) {
        for ($j = 0; $j < $N; $j++) {
            if ($adj[$i][$j] === true) {
                $in_degree[$j] += 1;
            }
        }
    }

    $queue = [];
    for ($i = 0; $i < $N; $i++) {
        if ($in_degree[$i] == 0) {
            $queue[] = $i;
            $visited[$i] = true;
        }
    }

    while(!empty($queue)) {
        $vertex = array_shift($queue);
        $T[] = $vertex;
        for ($j = 0; $j < $N; $j++) {
            if ($adj[$vertex][$j] === true && $visited[$j] === false) {
                $in_degree[$j] -= 1;
                if ($in_degree[$j] === 0) {
                    $queue[] = $j;
                    $visited[$j] = true;
                }
            }
        }
    }

    return $T;
}

$N = 6;
$adj = [
    [0, true,    0,    true,    0,    0],
    [0,    0, true,    true,    0,    0],
    [0,    0,    0,    true, true, true],
    [0,    0,    0,       0, true, true],
    [0,    0,    0,       0,    0, true],
    [0,    0,    0,       0,    0,    0]
];

$T = [];
$visited = [];
for ($i = 0; $i < $N; $i++) {
    $visited[$i] = false;
}

// This topological sort uses DFS traversal
// This looks like original DFS but with
// capturing visited nodes
function topologicalSortDFS($currentVertex, $N, $adj) {
    global $visited;
    global $T;

    $visited[$currentVertex] = true;
    for ($i = 0; $i < $N; $i++) {
        if ($adj[$currentVertex][$i] === true && $visited[$i] === false) {
            topologicalSortDFS($i, $N, $adj);
        }
    }
    array_unshift($T, $currentVertex);
}

var_dump(topologicalSortBFS($N, $adj));
topologicalSortDFS(0, $N, $adj);
var_dump($T);