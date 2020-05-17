<?php
// Example array - [4, 2, 7, 1, 3, 6, 9]
function buildTreeFromArray($a)
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