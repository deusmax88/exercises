<?php
// Originally viewed on https://www.geeksforgeeks.org/union-find/

// Union-find algorithm performs operations on disjoint-set data structure
// Disjoint-set data structure keeps track of a set of elements partitioned
// into a number of disjoint (non-overlapping) subsets.
// So union-find algorithm performs two useful operations on such a data structure:
// Find: Determine which subset a particular element is in. This can be used for determining
// if two elements are in the same subset.
// Union: Join two subsets into a single subset.

// One application of Disjoint-set data structure is to check whether a given graph contains a cycle or not.
// Union-Find Algorithm can be used to check whether an undirected graph contains cycle or not.
// Union-Find Algorithm assumes that the graph doesn't contain any self-loops.

// We're gonna utilize parent array from above article link in which
// indexes denotes vertexes and values denotes subset not which current vertex
// belongs to
// Initially each vertex belongs to its own subset hence we initialize each value
// with "-1"

// So here we use 2 functions

// function to find subset of element i
function find($parent, $i)
{
    if ($parent[$i] == -1) {
        return $i;
    }

    return find($parent, $parent[$i]);
}

function union($parent, $x, $y)
{
    $parent[$x] = $y;
}

// And now function for checking cycle
function checkCycle()
{
    // We init the parent array
    $parent = [];
    for($i = 0; $i < 10; $i++) {
        $parent[$i] = -1;
    }

    // By going through edges
    // and if we find out, that our
    // vertexes belongs to the
    // same subset - we've found a cycle
    for ($i = 0; $i < 10; $i++) {
        $x = find($parent, $edge.src);
        $y = find($parent, $edge.dest);
        if ($x == $y) {
            return true;
        }

        union($parent, $x, $y);
    }

    return false;
}

// For me that seems that i've catched the idea for now let's return to kruskals algorithm
// so if our vertexes before check are belonging to 2 different sets - their root representatives
// are different - we could union both vertexes, but if they are belonging to the same set -
// there is a cycle