<?php
// Originally viewed on https://www.youtube.com/watch?v=Hg82DzMemMI

require_once ("tree.php");

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

var_dump(pathSum(buildBinaryTree(), $sum));