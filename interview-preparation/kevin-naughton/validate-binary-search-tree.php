<?php
// Originally viewed on https://www.youtube.com/watch?v=Z_-h_mpDmeg&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=49

require_once(__DIR__."/../../binary-tree/binary-tree-builder.php");

$a = [2, 1, 3];
$t = buildBinaryTreeFromArray($a);

function validate($node, $max, $min) {
    if (!$node) {
        return true;
    }
    elseif ($max && $node->val >= $max || $min && $node->val <= $min) {
        return false;
    }
    else {
        return validate($node->left, $node->val,$min) && validate($node->right, $max, $node->val);
    }
}

var_dump(validate($t, null, null));