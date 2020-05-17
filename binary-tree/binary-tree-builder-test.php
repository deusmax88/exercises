<?php
require_once ("binary-tree-builder.php");

$a = [4, 2, 7, 1, 3, 6, 9];
$a = [2, 1, 3, null, 4, null, 7];

$head = buildTreeFromArray($a);
// To test that we did your tree building procedure
// correctly we would do a breadth first traversal
$b = bfsTree($head);

var_dump($a);
//var_dump($head);
var_dump($b);