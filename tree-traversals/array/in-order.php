<?php
require_once ('tree.php');

function inOrder($tree, $parentNodeValue = null) {
    $keys = array_keys($tree);
    $leftNodeValue = $keys[0] ?? null;
    $rightNodeValue = $keys[1] ?? null;

    if ($leftNodeValue) {
        inOrder($tree[$leftNodeValue], $leftNodeValue);
    }

    if ($parentNodeValue) {
        echo $parentNodeValue;
    }

    if ($rightNodeValue) {
        inOrder($tree[$rightNodeValue], $rightNodeValue);
    }
}

inOrder($tree);