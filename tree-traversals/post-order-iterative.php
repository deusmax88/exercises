<?php
require_once ('../binary-tree/binary-tree-builder.php');
$a = ['A','B','C','D','E','F','G'];
var_dump(postOrderIterative(buildBinaryTreeFromArray($a)));

function postOrderIterative($root) {
    $values = [];
    if (!$root) {
        return $values;
    }

    $stack = [];
    $stack[] = $root;
    while(!empty($stack)) {
        $current = array_pop($stack);
        array_unshift($values, $current->val);
        if ($current->left) {
            $stack[] = $current->left;
        }

        if ($current->right) {
            $stack[] = $current->right;
        }
    }

    return $values;
}