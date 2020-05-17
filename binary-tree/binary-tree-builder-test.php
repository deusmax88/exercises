<?php
require_once ("binary-tree-builder.php");

$a = [4, 2, 7, 1, 3, 6, 9];
$a = [2, 1, 3, null, 4, null, 7];

$head = buildTreeFromArray($a);
// To test that we did your tree building procedure
// correctly we would do a breadth first traversal
$b = bfsTree($head);

var_dump($a);
//var_dump($head);
var_dump($b);

function bfsTree($head) {
    if (!$head) {
        return [];
    }

    $result = [];
    $queue = [];
    $queue[] = $head;
    while($queue) {
        $node = array_shift($queue);
        // If what we've got from our queue is null
        // because we allowing nulls to be placed
        // on our queue for non-leaf nodes
        // we just taking into account that fact
        if (!$node) {
            $result[] = null;
            continue;
        }

        // We are not in the leaf node
        if ($node->left != null || $node->right != null) {
            $queue[] = $node->left;
            $queue[] = $node->right;
        }

        $result[] = $node->val;
    }

    return $result;
}