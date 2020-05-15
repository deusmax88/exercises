<?php
require_once ("tree.php");

function postOrderIterative($tree) {
    $values = [];
    if (!$tree) {
        return $values;
    }

    $stack = [];
    $stack[] = $tree;
    while(!empty($stack)) {
        $current = array_pop($stack);
        array_unshift($values, $current->value);
        if ($current->left) {
            $stack[] = $current->left;
        }

        if ($current->right) {
            $stack[] = $current->right;
        }
    }

    return $values;
}

echo join('', postOrderIterative($tree));