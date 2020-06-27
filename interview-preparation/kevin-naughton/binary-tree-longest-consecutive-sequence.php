<?php
// Originally viewed on https://www.youtube.com/watch?v=oSYGjIq6ZM4&list=PLi9RQVmJD2fYckvJZSKA4YcUQ4eyNupuY&index=49&t=0s

require_once(__DIR__."/../../binary-tree/binary-tree-builder-new.php");

$a = [1, null, 3, null, null, 2, 4, null, null, null, null, null, null, null, 5];
// Expected output 3 because longest consecutive sequence is 3-4-5
$b = [2, null, 3, null, null, 2, null, null, null, null, null, 1, null, null, null];
// Expected output 2 because longest consecutive sequence is 2-3

$root = buildBinaryTree($a);

$max = 0;
longestConsecutiveSequence($root, 0, 0, $max);
var_dump($max);

function longestConsecutiveSequence($root, $count, $target, &$max)
{
    if ($root == null) {
        return;
    }

    if ($root->val == $target) {
        $count++;
    }
    else {
        $count = 1;
    }

    $max = max($max, $count);

    longestConsecutiveSequence($root->left, $count, $root->val + 1, $max);
    longestConsecutiveSequence($root->right, $count, $root->val + 1, $max);
}