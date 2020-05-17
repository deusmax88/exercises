<?php
require_once ('../binary-tree/binary-tree-builder.php');
$a = ['A','B','C','D','E','F','G'];
preOrder(buildBinaryTreeFromArray($a));

function preOrder($root) {
    if (!$root) {
        return;
    }

    echo $root->val;

    if ($root->left) {
        preOrder($root->left);
    }

    if ($root->right) {
        preOrder($root->right);
    }
}