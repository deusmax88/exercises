<?php
// Originally viewed on https://www.youtube.com/watch?v=D2cFSDfg0So&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=29&t=0s
require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");
$a = [3, 9, 20, null, null, 15, 7];

$t = buildBinaryTree($a);

$depth = 0;
dfs($t);

function dfs($node, $currentDepth = 0) {
    global $depth;

    $currentDepth++;
    if (!$node->left && !$node->right) {
        $depth = max($depth, $currentDepth);
        return;
    }


    dfs($node->left, $currentDepth);
    dfs($node->right, $currentDepth);
}

var_dump($depth);