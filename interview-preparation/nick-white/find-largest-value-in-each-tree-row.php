<?php
// Originally viewed on https://www.youtube.com/watch?v=91Gok_PQY24&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=33&t=0s

require_once (__DIR__."/binary-tree-builder.php");

$a = [1, 3, 2, 5, 3, null, 9];

$t = buildBinaryTree($a);

$largestValues = [];
$levelsValues = [];
collectLevelValues($t);
foreach ($levelsValues as $level =>  $levelValues) {
    $largestValues[$level] =  max($levelValues);
}

var_dump($largestValues);

function collectLevelValues($node, $level = 0) {
    global $levelsValues;

    if (is_null($node)) {
        return [];
    }

    $levelsValues[$level][] = $node->val;

    collectLevelValues($node->left, $level + 1);
    collectLevelValues($node->right, $level + 1);

}