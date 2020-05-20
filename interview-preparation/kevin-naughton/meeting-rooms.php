<?php
// Originally viewed on https://www.youtube.com/watch?v=PWgFnSygweI
// Find minimum number of meeting rooms to hold
// such conversations
$t1 = [
    [0, 30],
    [5, 10],
    [15, 20]
];
// Expected output 2
$t2 = [
    [7, 10],
    [2, 4]
];
// Expected output 1

var_dump(minMeetingRooms($t1));
var_dump(getRooms($t1));

// Solution by Kevin Naughton
function minMeetingRooms($t)
{
    if (!$t) {
        return 0;
    }

    // Sorting out intervals by start time
    usort($t, function($t1, $t2) {
        return $t1[0] - $t2[0];
    });

    $priorityQueue = new IntervalPriorityQueue();
    $priorityQueue->insert($t[0], $t[0][1]);

    for ($i = 1; $i < count($t); $i++) {
        $current = $t[$i];
        $earliest = $priorityQueue->extract();
        if ($current[0] >= $earliest[1]) {
            $earliest[1] = $current[1];
        }
        else {
            $priorityQueue->insert($current, $current[1]);
        }

        $priorityQueue->insert($earliest, $earliest[1]);
    }

    return $priorityQueue->count();
}

class IntervalPriorityQueue extends SplPriorityQueue
{
    public function compare($priority1, $priority2) {
        return  $priority2 - $priority1;
    }
}


// My Solution
function getRooms($t)
{
    $max = 1;
    for ($i = 0; $i < count($t); $i++) {
        $max = max($max, getNumOfOverlaps($t, $i));
    }

    return $max;
}

function getNumOfOverlaps($t, $index) {
    $n = 0;
    for($i = 0; $i < count($t); $i++) {
        if ($i == $index) {
            continue;
        }

        if (areOverlapping($t[$index], $t[$i])) {
            $n++;
        }
    }

    return $n;
}

function areOverlapping($t1, $t2)
{
    return $t1[1] > $t2[0];
}