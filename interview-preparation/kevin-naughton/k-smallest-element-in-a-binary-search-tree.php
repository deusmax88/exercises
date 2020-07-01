<?php
// Originally viewed on https://www.youtube.com/watch?v=C6r1fDKAW_o&list=PLi9RQVmJD2fYqfH-lttQ4V1AXLAK0etgr&index=3

require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");
$a = [3, 1, 4, null, 2];
$ka = 1; // meaning 1st smallest element
// Expected output is 1

$b = [5, 3, 6, 2, 4, null, null, 1];
$kb = 3; // meaning 3rd smallest element
// Expected output is 3

// The idea is in-order traversal of the tree and returning
// k-th element in list while traversing the tree
$t = buildBinaryTree($a);

var_dump(kthSmallest($t, $ka));

function kthSmallest($node, $k) {
    $nums = [];
    inorder($node, $nums, $k);
    return $nums[1];
}

function inorder($node, &$nums, $k) {
    if (!$node) {
        return;
    }

    inorder($node->left, $nums, $k);
    if (++$nums[0] == $k) {
        $nums[1] = $node->val;
        return;
    }
    inorder($node->right, $nums, $k);

}