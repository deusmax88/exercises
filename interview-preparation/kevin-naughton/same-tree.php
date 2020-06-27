<?php
//Originally viewed on https://www.youtube.com/watch?v=sheA4rbbDlQ&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=28&t=0s
require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");

$a = [1,2,3];
$b = [1,2,3];

$a = [1, 2];
$b = [1, null, 2];

$ta = buildBinaryTree($a);
$tb = buildBinaryTree($b);

function same($ta, $tb) {
    if (!$ta && !$tb) {
        return true;
    }

    return $ta->val == $tb->val
        && same($ta->left, $tb->left)
        && same($ta->right, $tb->right);
}

var_dump(same($ta, $tb));