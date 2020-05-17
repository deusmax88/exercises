<?php
require_once ('../binary-tree/binary-tree-builder.php');
$a = ['A','B','C','D','E','F','G'];
postOrder(buildBinaryTreeFromArray($a));

function postOrder($root) {
    if (!$root) {
        return;
    }

    if ($root->left) {
        postOrder($root->left);
    }

    if ($root->right) {
        postOrder($root->right);
    }

    echo $root->val;
}