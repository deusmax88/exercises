<?php
require_once ('tree.php');

function postOrder($tree) {
    if (!$tree) {
        return;
    }

    if ($tree->left) {
        postOrder($tree->left);
    }

    if ($tree->right) {
        postOrder($tree->right);
    }

    echo $tree->value;
}

postOrder($tree);