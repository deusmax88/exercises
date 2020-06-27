<?php
// Originally viewed on https://www.youtube.com/watch?v=3B5gnrwRmOA&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=26

require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");

$a = [    5,
        4, 8,
     11, null, 13, 4,
    7, 2, null, null, null, null, 5, 1
];

$sum = 22;
$paths = [];
$root = buildBinaryTree($a);

buildPathSums($root, $sum);

function buildPathSums($node, $sum, $currentPath = []) {
    global $paths;

    if ($node == null) {
        return;
    }

    $currentPath[] = $node->val;
    if ($node->val == $sum && $node->left == null && $node->right == null) {
        $paths[] = $currentPath;
        return;
    }

    if ($sum - $node->val > 0) {
        buildPathSums($node->left, $sum - $node->val, $currentPath);
        buildPathSums($node->right, $sum - $node->val, $currentPath);
    }
}

var_dump($paths);