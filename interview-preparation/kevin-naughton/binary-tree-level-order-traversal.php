<?php
// Originally viewed on https://www.youtube.com/watch?v=XZnWETlZZ14&list=PLi9RQVmJD2fYckvJZSKA4YcUQ4eyNupuY&index=22

require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");

$a = [3, 9, 20, null, null, 15, 7];
// Expected output
// [
//  [3],
//  [9, 20],
//  [15, 7],
// ]

$root = buildBinaryTree($a);

$levels = [];
levelTraversal($root);
var_dump($levels);

function levelTraversal($root)
{
    global $levels;
    if (!$root) {
        return;
    }

    $queue = [];
    $queue[] = $root;
    while(!empty($queue)) {
        $size = count($queue);
        $currentLevel = [];
        for($i = 0; $i < $size; $i++) {
            $node = array_shift($queue);
            $currentLevel[] = $node->val;
        }

        if ($node->left) {
            $queue[] = $node->left;
        }
        if ($node->right) {
            $queue[] = $node->right;
        }

        $levels[] = $currentLevel;
    }
}