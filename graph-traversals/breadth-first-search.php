<?php
require_once('graph.php');

$queue = [];

$nodeS->visited = true;
echo $nodeS->value;

$queue[] = $nodeS;
while(!empty($queue)) {
    $node = $queue[0];
    foreach($node->adjacents as $adjacent) {
        if (!$adjacent->visited) {
            $adjacent->visited = true;
            echo $adjacent->value;
            $queue[] = $adjacent;
        }
    }

    array_shift($queue);
}
