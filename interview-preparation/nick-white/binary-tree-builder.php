<?php
function buildBinaryTree($a)
{
    $queue = [];
    $root = array_shift($a);
    $rootNode = makeNode($root);

    $queue[] = $rootNode;

    while(!empty($queue) && !empty($a)) {
        $parent = array_shift($queue);
        if (is_null($parent)) {
            array_shift($a);
            array_shift($a);
            continue;
        }
        // For each parent node we need process 2 child nodes
        // because of binary tree structure

        $left = array_shift($a);
        if (!is_null($left)) {
            $leftNode = makeNode($left);
            $parent->left = $leftNode;
            $queue[] = $leftNode;
        }
        else {
            $queue[] = null;
        }

        $right = array_shift($a);
        if (!is_null($right)) {
            $rightNode = makeNode($right);
            $parent->right = $rightNode;
            $queue[] = $rightNode;
        }
        else {
            $queue = null;
        }

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
        if ($node == 'NULL') {
            $result[] = null;
            $queue[] = 'NULL1';
            $queue[] = 'NULL1';
            continue;
        }
        if ($node == 'NULL1') {
            $result[] = null;
            continue;
        }

        $result[] = $node->val;
        $queue[] = $node->left ?: 'NULL';
        $queue[] = $node->right ?: 'NULL';
    }

    while (($el = array_pop($result)) === null);

    $result[] = $el;

    return $result;
}
