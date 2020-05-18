<?php
// Originally viewed on https://www.youtube.com/watch?v=fKgZiCXb6zs&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=11

require_once("../../binary-tree/binary-tree-builder.php");
$a = [4, 2, 7, 1, 3, 6, 9];
$root = buildBinaryTreeFromArray($a);

// My solution
invertTree($root);
var_dump(bfsBinaryTree($root));

function invertTree($node) {
    // We don't invert leaf nodes
    if (!$node->left && !$node->right) {
        return;
    }

    if ($node->left) {
        invertTree($node->left);
    }

    if ($node->right) {
        invertTree($node->right);
    }

    $tmp = $node->left;
    $node->left = $node->right;
    $node->right = $tmp;
}
