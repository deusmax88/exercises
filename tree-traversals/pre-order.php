<?php
require_once ('tree.php');

function preOrder($tree) {
    if (!$tree) {
        return;
    }

    echo $tree->value;

    if ($tree->left) {
        preOrder($tree->left);
    }

    if ($tree->right) {
        preOrder($tree->right);
    }
}

preOrder($tree);