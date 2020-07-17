<?php
require_once ("my-trie.php");

$root = makeTrieNode();
insertTrieKeyVal($root, "кот", 1);
insertTrieKeyVal($root,  "котик", 2);
insertTrieKeyVal($root,  "котэ", 3);

var_dump(lookupTrieKey($root, "кот"));
var_dump(lookupTrieKey($root, "котик"));
var_dump(lookupTrieKey($root, "котэ"));
var_dump(lookupTrieKey($root, "ко"));