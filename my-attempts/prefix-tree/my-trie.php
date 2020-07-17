<?php
// My attempt to trie implementation based on description

function insertTrieKeyVal($node, $key, $val) {
    for ($i = 0; $i < mb_strlen($key); $i++) {
        $char = mb_substr($key, $i, 1);
        if (!$node->children[$char]) {
            $node->children[$char] = makeTrieNode();
        }
        $node = $node->children[$char];
    }

    $node->val = $val;
}

function lookupTrieKey($node, $key) {
    for ($i = 0; $i < mb_strlen($key); $i++) {
        $char = mb_substr($key, $i, 1);
        if (!$node->children[$char]) {
            return null;
        }

        $node = $node->children[$char];
    }

    return $node->val;
}

function makeTrieNode() {
    $node = new \stdClass();

    $node->val = null;
    $node->children = [];

    return $node;
}