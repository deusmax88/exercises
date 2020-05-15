<?php
require_once('graph.php');

$stack = [];

$nodeS->visited = true;
echo $nodeS->value;

$stack[] = $nodeS;
while(!empty($stack)) {
    $node = $stack[count($stack) - 1];
    foreach($node->adjacents as $adjacent) {
        if (!$adjacent->visited) {
            $adjacent->visited = true;
            echo $adjacent->value;
            $stack[] = $adjacent;
            continue 2;
        }
    }

    array_pop($stack);
}
