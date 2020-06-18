<?php
// Originally viewed on https://www.youtube.com/watch?v=SIdrJwWp3H0&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=45

require_once(__DIR__."/../../binary-tree/binary-tree-builder.php");

$tree = [10, 5, 15, 3, 7, null, 18];
$L = 7;
$R = 15;

$root = buildBinaryTreeFromArray($tree);

$queue = [];
$queue[] = $root;
$sum = 0;
while(!empty($queue)) {
    $node = array_shift($queue);
    if ($node->val >= $L &&
        $node->val <= $R
    ) {
        $sum += $node->val;
    }

    if ($node->right && $node->val < $R) {
        $queue[] = $node->right;
    }

    if ($node->left && $node->val > $L) {
        $queue[] = $node->left;
    }
}

var_dump($sum);