<?php
// Originally viewed on https://www.youtube.com/watch?v=77LJc56bwnE&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=35&t=0s

require_once (__DIR__."/binary-tree-builder.php");

$t = [1, null, 0, null, null,0, 1];
$t1 = [1, 0, 1, 0, 0, 0, 1];
$t = buildBinaryTree($t1);

removeZeroSubtrees($t);

var_dump($t);

function removeZeroSubtrees($node) {
    if (is_null($node)) {
        return null;
    }

    $node->left = removeZeroSubtrees($node->left);
    $node->right = removeZeroSubtrees($node->right);

    if ($node->val == 0 && $node->left == null && $node->right == null) {
        return null;
    }

    return $node;
}



