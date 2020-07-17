<?php
$list = [3, 2, 0, -4];
$pos = 1;

$list = buildListWithCycle($list, $pos);

var_dump($list);

var_dump(checkCycle($list));

function checkCycle($l) {
    if ($l === null) {
        return false;
    }

    $slow = $l;
    $fast = $l->next;
    while ($slow != $fast) {

        if ($fast == null || $fast->next == null) {
            return false;
        }

        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    return true;
}

function buildListWithCycle($a, $cycleIndex)
{
    if (!$a) {
        return null;
    }

    $i = 0;
    $head = null;
    $node = null;
    $prevNode = null;
    $cycleNode = null;
    while (null !== ($el = array_shift($a))) {
        $node = new \stdClass();
        $node->val = $el;
        $node->next = null;

        if (!$head) {
            $head = $node;
            $prevNode = $head;
        }
        else {
            $prevNode->next = $node;
            $prevNode = $node;
        }

        if ($i === $cycleIndex) {
            $cycleNode = $node;
        }

        $i++;
    }

    if ($node) {
        $node->next = $cycleNode;
    }

    return $head;
}