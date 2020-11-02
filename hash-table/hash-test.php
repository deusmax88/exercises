<?php
require_once('base.php');

$htFactory = new HashTableFactory();
$hashTable = $htFactory->make(HashTableFactory::OPEN_ADDRESSING_IMPLEMENTATION, 10);
$hashTable->set('Mike', 1);
$hashTable->set('Jane', 1);
var_dump($hashTable->get('Jane'));

$hashTable = $htFactory->make(HashTableFactory::CLOSED_ADDRESSING_IMPLEMENTATION, 10);
$hashTable->set('Mike', 1);
$hashTable->set('Jane', 1);
var_dump($hashTable->get('Jane'));