<?php
// Originally started viewed at https://www.hackerearth.com/practice/algorithms/graphs/minimum-spanning-tree/tutorial/#:~:text=Time%20Complexity%3A,Time%20Complexity%20of%20the%20algorithm.
// Why time complexity of kruskals algorithm is E*logV ?
// Continued reviewing review on
// https://www.geeksforgeeks.org/kruskals-minimum-spanning-tree-algorithm-greedy-algo-2/

// Algorithm steps
// 1. Sort edges by their weight in non-decreasing order
// 2. Pick the smallest edge. Check if it forms a cycle with the spanning tree formed so far.
//    If cycle is not formed, include this edge. Else, discard it.
// 3. Repeat step #2 until there are (V-1) edges in the spanning tree.
// Step #2 uses Union-Find algorithm

// I'am gonna utilize simple union-find algorithm for now

// So our graph at first
$edges = [
    // this is src vertex - dst vertex and edge weight
    [0, 1, 4],
    [0, 7, 8],
    [1, 7, 11],
    [1, 2, 8],
    [2, 8, 2],
    [7, 8, 7],
    [7, 6, 1],
    [6, 5, 2],
    [8, 6, 6],
    [2, 5, 4],
    [2, 3, 7],
    [3, 5, 14],
    [3, 4, 9],
    [5, 4, 10]
];

// Next let's sort edges by their weight
usort($edges, function($edge1, $edge2) {
    return $edge1[2] - $edge2[2];
});

//var_dump($edges);
// Ok now we've got sorted edges
// Time for implementing step #2
// First we implementing simple union-find algorithm
// so that if we've found cycle, we have to discard
// current edge
$parent = [];
for($i = 0; $i < 9; $i++) {
    // So each vertex belongs to it's own subset
    $parent[$i] = -1;
}

// Determining subset vertex belongs to
function find($parent, $i) {
    if ($parent[$i] == -1) {
        return $i;
    }

    return find($parent, $parent[$i]);
}

// Union 2 subsets after determining vertex subset
function union(&$parent, $x, $y)
{
    $parent[$x] = $y;
}

$mst = [];
// Smallest edges are at the beginning of the array
while ($edge = current($edges)) {
    $srcVertex = $edge[0];
    $dstVertex = $edge[1];
    // Next we're gonna find subsets each vertex belongs
    $srcSubset = find($parent, $srcVertex);
    $dstSubset = find($parent, $dstVertex);
    // if they are equal - then discard current edge as
    // it forms cycle and proceeding to next edge
    if ($srcSubset == $dstSubset) {
        next($edges);
        continue;
    }
    // if not we union our subsets
    union($parent, $srcSubset, $dstSubset);
    // adding edge to mst
    $mst[] = $edge;
    // and adjusting sorted edges array internal pointer
    next($edges);
}

// We've got our mst
echo "finished";






