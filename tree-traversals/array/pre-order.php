<?php
require_once ('tree.php');

function preOrder($tree, $parentNodeValue = null) {
    $keys = array_keys($tree);
    $leftNodeValue = $keys[0] ?? null;
    $rightNodeValue = $keys[1] ?? null;

    if ($parentNodeValue) {
        echo $parentNodeValue;
    }

    if ($leftNodeValue) {
        preOrder($tree[$leftNodeValue], $leftNodeValue);
    }

    if ($rightNodeValue) {
        preOrder($tree[$rightNodeValue], $rightNodeValue);
    }
}

preOrder($tree);