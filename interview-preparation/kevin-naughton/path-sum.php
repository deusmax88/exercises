<?php
// Originally viewed on https://www.youtube.com/watch?v=Hg82DzMemMI

require_once (__DIR__."/../../binary-tree/binary-tree-builder.php");

$a = [5, 4, 8, 11, null, 13, 4, 7, 2, null, 1];

$sum = 22;

function pathSum($node, $sum) {
    if (!$node) {
        return false;
    }

    if (!$node->left && !$node->right && ($sum - $node->val) == 0) {
        return true;
    }

    return pathSum($node->left, $sum - $node->val) || pathSum($node->right, $sum - $node->val);
}

var_dump(pathSum(buildBinaryTreeFromArray($a), $sum));