<?php
// Example array - [4, 2, 7, 1, 3, 6, 9]
function buildBinaryTreeFromArray($a)
{
    if (!$a) {
        return null;
    }

    $head = null;
    $parents = []; // This is our parents queue
    for($i = 0; $i < count($a); $i++) {

        if (!$a[$i]) {
            continue;
        }

        $node = new \stdClass();
        $node->val = $a[$i];
        $node->left = null;
        $node->right = null;

        // what is its parent?
        // we my just use queue in order to store previous level nodes
        // which are parents for current level nodes

        if ($parent = array_shift($parents)) {
            if ($i % 2 == 0) {
                $parent->right = $node;
            }
            else {
                $parent->left = $node;
                array_unshift($parents, $parent);
            }

            $parents[] = $node;
        }
        // Case for root node as it hasn't got any parents
        else {
            $parents[] = $node;
            $head = $node;
        }

        // is it left child of right child of parent node?
        // due to my observation it seems that odd indexes are
        // left child candidates and even indexes are right candidates

    }

    return $head;
}

function bfsBinaryTree($head) {
    if (!$head) {
        return [];
    }

    $result = [];
    $queue = [];
    $queue[] = $head;
    while($queue) {
        $node = array_shift($queue);
        // If what we've got from our queue is null
        // because we allowing nulls to be placed
        // on our queue for non-leaf nodes
        // we just taking into account that fact
        if (!$node) {
            $result[] = null;
            continue;
        }

        // We are not in the leaf node
        if ($node->left != null || $node->right != null) {
            $queue[] = $node->left;
            $queue[] = $node->right;
        }

        $result[] = $node->val;
    }

    return $result;
}