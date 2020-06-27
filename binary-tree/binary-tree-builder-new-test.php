<?php
require_once ("binary-tree-builder-new.php");

$a = [2, 1, 3, null, 4, null, 7];
$head = buildBinaryTree($a);
$c = bfsBinaryTree($head);

var_dump($head);
var_dump($a);
var_dump($c);