<?php
// The idea is brought by https://dou.ua/lenta/articles/union-find/

$parent = [];

// Here we're finding root of current vertex
function root($p, $parent) {
    while($p != $parent[$p]) {
        $p = $parent[$p];
    }

    return $p;
}

// Here we're uniting 2 sets
function union($p, $q, $parent) {
    $pRoot = root($p, $parent);
    $qRoot = root($q, $parent);
    $parent[$qRoot] = $pRoot;
}

// Checking that our sets are connected
function connected($p, $q, $parent)
{
    return root($p, $parent) == root($q, $parent);
}