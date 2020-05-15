<?php
// Originally viewed on https://www.youtube.com/watch?v=jCqIr_tBLKs

require_once ("tree.php");

$root = buildBinaryTree();

$visibleValues = [];

$queue = [];
$queue[] = $root;
while($queue) {
    $size = count($queue);
    for ($i = 0; $i < $size; $i++) {
        $current = array_shift($queue);
        if ($i == $size - 1) {
            $visibleValues[] = $current->val;
        }
        if ($current->left) {
            $queue[] = $current->left;
        }
        if ($current->right) {
            $queue[] = $current->right;
        }
    }
}

var_dump($visibleValues);