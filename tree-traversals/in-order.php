<?php
require_once ('tree.php');

function inOrder($tree) {
    if (!$tree) {
        return;
    }

    if ($tree->left) {
        inOrder($tree->left);
    }

    echo $tree->value;

    if ($tree->right) {
        inOrder($tree->right);
    }
}

inOrder($tree);