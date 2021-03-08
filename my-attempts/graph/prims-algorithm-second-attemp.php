<?php
// Original article located at https://www.geeksforgeeks.org/prims-minimum-spanning-tree-mst-greedy-algo-5/
// Minimum Spanning Tree algorithm

// Initialize our vertexes
$V = [];
for($i = 0; $i < 9; $i++) {
    $v = new stdClass();
    $v->idx = $i;
    $v->key = $i == 0 ? 0 : PHP_INT_MAX;
    $V[$i] = $v;
}

// Construct edges with their weight as second argument
// Is their any need in including already mentioned edges?
// according to the algorithm definition we only need
// adjacent vertexes - so no need in defining edges twice
// for vertex from which the edge outgoes and for vertex
// to which edge goes
// i think i am wrong because maybe we are loosing information
$V[0]->edges = [
    [$V[1], 4],
    [$V[7], 8]
];

$V[1]->edges = [
    [$V[0], 4],
    [$V[7], 11],
    [$V[2], 8]
];

$V[7]->edges = [
    [$V[0], 8],
    [$V[1], 11],
    [$V[8], 7],
    [$V[6], 1]
];

$V[2]->edges = [
    [$V[1], 8],
    [$V[8], 2],
    [$V[5], 4],
    [$V[3], 7]
];

$V[8]->edges = [
    [$V[2], 2],
    [$V[7], 7],
    [$V[6], 6],
];

$V[6]->edges = [
    [$V[7], 1],
    [$V[8], 6],
    [$V[5], 2]
];

$V[5]->edges = [
    [$V[6], 2],
    [$V[2], 4],
    [$V[3], 14],
    [$V[4], 10]
];

$V[3]->edges = [
    [$V[2], 7],
    [$V[5], 14],
    [$V[4], 9]
];

$V[4]->edges = [
    [$V[3], 9],
    [$V[5], 10]
];

function findVertexWithMinKey($V, $mstSet)
{
    $min = PHP_INT_MAX;
    $minVertex = null;
    foreach($V as $v) {
        // Skipping vertexes included in mstSet
        if ($mstSet->contains($v)) {
            continue;
        }

        if ($v->key < $min) {
            $min = $v->key;
            $minVertex = $v;
        }
    }

    return $minVertex;
}

function updateAdjacentVertexKeys($v, $mstSet)
{
    foreach($v->edges as $edge) {
        // Skipping updating keys of vertexes
        // in mstSet
        if ($mstSet->contains($edge[0])) {
            continue;
        }

        $adjacentVertex = $edge[0];
        $adjacentVertexWeight = $edge[1];
        $adjacentVertex->key =
        $adjacentVertex->key > $adjacentVertexWeight ? $adjacentVertexWeight : $adjacentVertex->key;
    }
}

function findAdjacentVertexWithWeight($v) {
    foreach($v->edges as $edge) {
        if ($edge[1] == $v->key) {
            return $edge[0];
        }
    }
}

$mstSet = new SplObjectStorage();

$mstEdges = [];
while (count($mstSet) < 9) {
    $v = findVertexWithMinKey($V, $mstSet);
    if ($v->key != 0) {
        $u = findAdjacentVertexWithWeight($v);
        $mstEdges[] = [
            $u->idx, $v->idx
        ];
    }
    $mstSet[$v] = true;
    updateAdjacentVertexKeys($v, $mstSet);
}

echo "finished";
