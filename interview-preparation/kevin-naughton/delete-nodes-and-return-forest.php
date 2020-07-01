<?php
// Originally viewed on https://www.youtube.com/watch?v=aaSFzFfOQ0o&list=PLi9RQVmJD2fapKJ4DnZzAn55NJfo5IM1c&index=54

require_once (__DIR__."/../../binary-tree/binary-tree-builder-new.php");
$root = [1,2,3,4,5,6,7];
$toDelete = [3,5];
// Expected output [[1,2,null, 4],[6],[7]]

$t = buildBinaryTree($root);

$remaining = [];
$toDelete = array_flip($toDelete);

removeNodes($t, $toDelete, $remaining);
if (!isset($toDelete[$t->val])) {
    $remaining[] = $t;
}

var_dump($remaining);

function removeNodes($node, &$toDelete, &$remaining) {
    if (!$node) {
        return null;
    }

    $node->left = removeNodes($node->left, $toDelete, $remaining);
    $node->right = removeNodes($node->right, $toDelete, $remaining);
    if (array_key_exists($node->val, $toDelete)) {
        if ($node->left) {
            $remaining[] = $node->left;
        }
        if ($node->right) {
            $remaining[] = $node->right;
        }

        return null;
    }

    return $node;
}

