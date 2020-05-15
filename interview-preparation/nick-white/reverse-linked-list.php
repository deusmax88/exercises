<?php
// Originally viewed on https://www.youtube.com/watch?v=NCilGMhdYPY&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=4

// My solution
function buildLinkedList($a = [5,4,3,2,1])
{
    $head = $prev = new stdClass();
    $prev->val = array_shift($a);
    while($val = array_shift($a)) {
        $node = new stdClass();
        $node->val = $val;
        $node->next = null;
        $prev->next = $node;
        $prev = $node;
    }

    return $head;
}

$head2 = $head1 = buildLinkedList();

$stack = [];
$stack[] = $head1->val;
while ($node = $head1->next) {
    $stack[] = $node->val;
    $head1 = $node;
}

while ($value = array_pop($stack)) {
    echo $value;
}

// Solution from youtube

$node = $head2;
$prev = null;

while($node) {
    $next = $node->next;
    $node->next = $prev;
    $prev = $node;
    $node = $next;
}

$start = new stdClass();
$start->next = $prev;
while($start = $start->next) {
    echo $start->val;
}