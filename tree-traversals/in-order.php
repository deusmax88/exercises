<?php
require_once ('../binary-tree/binary-tree-builder.php');
$a = ['A','B','C','D','E','F','G'];
inOrder(buildBinaryTreeFromArray($a));

function inOrder($root) {
    if (!$root) {
        return;
    }

    if ($root->left) {
        inOrder($root->left);
    }

    echo $root->val;

    if ($root->right) {
        inOrder($root->right);
    }
}