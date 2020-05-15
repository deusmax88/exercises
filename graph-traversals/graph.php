<?php
$nodeS = new stdClass();
$nodeS->value = 'S';
$nodeS->adjacents = [];
$nodeS->visited = false;

$nodeA = new stdClass();
$nodeA->value = 'A';
$nodeA->adjacents = [];
$nodeA->visited = false;

$nodeD = new stdClass();
$nodeD->value = 'D';
$nodeD->adjacents = [];
$nodeD->visisted = false;

$nodeG = new stdClass();
$nodeG->value = 'G';
$nodeG->adjacents = [];
$nodeG->visited = false;

$nodeE = new stdClass();
$nodeE->value = 'E';
$nodeE->adjacents = [];
$nodeE->visited = false;

$nodeB = new stdClass();
$nodeB->value = 'B';
$nodeB->adjacents = [];
$nodeB->visited = false;

$nodeF = new stdClass();
$nodeF->value = 'F';
$nodeF->adjacents = [];
$nodeF->visited = false;

$nodeC = new stdClass();
$nodeC->value = 'C';
$nodeC->adjacents = [];
$nodeC->visited = false;

$nodeS->adjacents[] = $nodeA;
$nodeS->adjacents[] = $nodeC;
$nodeS->adjacents[] = $nodeB;

$nodeA->adjacents[] = $nodeS;
$nodeA->adjacents[] = $nodeD;

$nodeD->adjacents[] = $nodeA;
$nodeD->adjacents[] = $nodeG;

$nodeG->adjacents[] = $nodeD;
$nodeG->adjacents[] = $nodeE;
$nodeG->adjacents[] = $nodeF;

$nodeE->adjacents[] = $nodeG;
$nodeE->adjacents[] = $nodeB;

$nodeB->adjacents[] = $nodeE;
$nodeB->adjacents[] = $nodeS;

$nodeF->adjacents[] = $nodeG;
$nodeF->adjacents[] = $nodeC;

$nodeC->adjacents[] = $nodeS;
$nodeC->adjacents[] = $nodeF;
