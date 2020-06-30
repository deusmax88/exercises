<?php
// Originally viewed on https://www.youtube.com/watch?v=PZYTs9y4f4o&list=PLi9RQVmJD2fapKJ4DnZzAn55NJfo5IM1c&index=10
require_once (__DIR__.'/../../binary-tree/binary-tree-builder-new.php');
$a = [-10, -3, 0, 5, 9];

var_dump(buildBST($a));


function buildBST($a) {
    if (!$a) {
        return null;
    }

    $mid = intdiv(count($a), 2);
    $node = makeNode($a[$mid]);
    $left = array_slice($a, 0, $mid);
    $right = array_slice($a , $mid + 1);

    $node->left = buildBST($left);
    $node->right = buildBST($right);

    return $node;
}