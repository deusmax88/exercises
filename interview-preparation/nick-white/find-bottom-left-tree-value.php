<?php
//Originally viewed on https://www.youtube.com/watch?v=OsnikyPMU3Q&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=38&t=0s

$a = [2, 1, 3];
// Expected answer is 1
$b = [1, 2, 3, 4, null, 5, 6, null, null, null, null, 7];
// Expected answer is 7

require_once(__DIR__."/binary-tree-builder.php");

$t = buildBinaryTree($b);

$prevLevel = -1;
$leftmostValue = null;
findBottomLeftTreeValue($t);
var_dump($leftmostValue);

function findBottomLeftTreeValue($node, $level = 0, $check = false) {
    global $prevLevel;
    global $leftmostValue;

    if (is_null($node)) {
        return false;
    }

    if ($check && $level > $prevLevel) {
        $prevLevel = $level;
        $leftmostValue = $node->val;
    }

    findBottomLeftTreeValue($node->left, $level + 1, true);
    findBottomLeftTreeValue($node->right, $level + 1, false);
}