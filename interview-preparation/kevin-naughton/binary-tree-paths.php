<?php
// Originally viewed on https://www.youtube.com/watch?v=xqS8dyexaNM&list=PLi9RQVmJD2fYckvJZSKA4YcUQ4eyNupuY&index=40

require_once(__DIR__."/../../binary-tree/binary-tree-builder-new.php");

$a = [1, 2, 3, null , 5];

$root = buildBinaryTree($a);

$paths = [];
buildPaths($root);

var_dump($paths);

function buildPaths($node, $current = [])
{
    global $paths;

    if (!$node) {
        return;
    }

    $current[] = $node->val;
    if (!$node->left && !$node->right) {
        $paths[] = join("->", $current);
        return;
    }

    buildPaths($node->left, $current);
    buildPaths($node->right, $current);
}
