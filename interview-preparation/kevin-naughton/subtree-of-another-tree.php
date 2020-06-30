<?php
// Originally viewed on https://www.youtube.com/watch?v=HdMs2Fl_I-Q&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=53
require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");

// This is expected to be true
$s = [3, 4, 5, 1, 2];
$t = [4, 1, 2];

//$s2 and $t expected answer is false
$s2 = [3, 4, 5, 1, 2, null, null, null, null, 0, null];

$st = buildBinaryTree($s);
$tt = buildBinaryTree($t);

var_dump(isSubtree($s, $t));

function isSubtree($s, $t) {
    if ($s == null) {
        return false;
    }
    elseif (isSameTree($s, $t)) {
        return true;
    }
    else {
        return isSubtree($s->left, $t) || isSubtree($s->right, $t);
    }
}

function isSameTree($s, $t) {
    if (!$s || !$t) {
        return !$s && !$t;
    }
    elseif($s->val == $t->val) {
        return isSameTree($s->left, $t->left) && isSameTree($s->right, $t->right);
    }
    else {
        return false;
    }
}