<?php
require_once ('tree.php');

function postOrder($tree, $parentNodeValue = null) {
    $keys = array_keys($tree);
    $leftNodeValue = $keys[0] ?? null;
    $rightNodeValue = $keys[1] ?? null;

    if ($leftNodeValue) {
        postOrder($tree[$leftNodeValue], $leftNodeValue);
    }

    if ($rightNodeValue) {
        postOrder($tree[$rightNodeValue], $rightNodeValue);
    }

    if ($parentNodeValue) {
        echo $parentNodeValue;
    }
}

postOrder($tree);