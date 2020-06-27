<?php
function buildBinaryTree($a)
{
    $queue = [];
    $root = array_shift($a);
    $rootNode = makeNode($root);

    $queue[] = $rootNode;

    while(!empty($queue) && !empty($a)) {
        $parent = array_shift($queue);
        // For each parent node we need process 2 child nodes
        // because of binary tree structure

        $left = array_shift($a);
        $leftNode = makeNode($left);
        if ($left) {
            $parent->left = $leftNode;
        }
        $queue[] = $leftNode;


        $right = array_shift($a);
        $rightNode = makeNode($right);
        if ($right) {
            $parent->right = $rightNode;
        }
        $queue[] = $rightNode;
    }

    return $rootNode;
}

function makeNode($val)
{
    $node = new \stdClass();

    $node->val = $val;
    $node->left = null;
    $node->right = null;

    return $node;
}

function bfsBinaryTree($root) {
    $result = [];
    $queue = [];
    $queue[] = $root;
    while(!empty($queue)) {
        $node = array_shift($queue);
        if (!$node) {
            $result[] = null;
            continue;
        }
        $result[] = $node->val;
        $queue[] = $node->left;
        $queue[] = $node->right;
    }

    while (($el = array_pop($result)) == null);

    $result[] = $el;

    return $result;
}
