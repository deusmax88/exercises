<?php
// Originally viewed on https://www.youtube.com/watch?v=kulWKd3BUcI&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=12&t=0s
require_once (__DIR__."/../../binary-tree/binary-tree-builder.php");

$a = [6, 2, 8, 0, 4, 7, 9, null, null, 3, 5];
$head = buildBinaryTreeFromArray($a);

// My Solution
$p = 2;
$q = 4;
$queue = [];
$queue[] = $head;
$value = null;
while(!empty($queue)) {
    $node = array_shift($queue);
    if ($node->val > $p &&
    $node->val > $q && $node->left) {
        $queue[] = $node->left;
        continue;
    }

    if ($node->val < $p &&
        $node->val < $q && $node->right) {
        $queue[] = $node->right;
        continue;
    }

    if ($node->val >= $p &&
        $node->val <= $q) {
        $value = $node->val;
        break;
    }
}

var_dump($value);

// Solution of Kevin
function commonLowestAncestor($node, $p, $q)
{
    if ($node->val < $p && $node->val < $q) {
        return commonLowestAncestor($node->right, $p, $q);
    }
    elseif ($node->val > $p && $node->val > $q) {
        return commonLowestAncestor($node->left, $p, $q);
    }
    else {
        return $node->val;
    }
}

var_dump(commonLowestAncestor($head, $p, $q));
