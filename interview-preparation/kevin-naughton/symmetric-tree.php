<?php
// Originally viewed on https://www.youtube.com/watch?v=K7LyJTWr2yA&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=30&t=0s
require_once(__DIR__."/../../binary-tree/binary-tree-builder-new.php");
// This is symmetric tree
$a = [1,2,2,3,4,4,3];

// This is not
$b = [1,2,2, null,3, null, 3];

$t = buildBinaryTree($a);

var_dump(isSymmetric($t));

function isSymmetric($node) {
   if (!$node) {
       return true;
   }

   return isDeepSymmetric($node->left, $node->right);
}

function isDeepSymmetric($left, $right) {
    if (!$left && !$right) {
        return true;
    }

    if ($left->val != $right->val) {
        return false;
    }

    return isDeepSymmetric($left->left, $right->right) && isDeepSymmetric($left->right, $right->left);
}