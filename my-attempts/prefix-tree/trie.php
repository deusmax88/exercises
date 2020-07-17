<?php
/*
 * Trie (prefix tree) - ассоциативный словарь, ключи которго являются строками.
 * Based on http://www.mkurnosov.net/teaching/uploads/DSA/dsa-fall-lecture7.pdf
 */

function insertTrie($root, $key, $val)
{
    $parent = null;
    $list = $root;
    for($i = 0; $i < mb_strlen($key); $i++) {
        $ch = mb_substr($key,$i,1);
        for($node = $list; $node != null; $node = $node->sibling) {
            if ($node->ch == $ch) {
                break;
            }
        }

        if ($node == null) {
            $node = makeTrieNode();
            $node->ch = $ch;
            $node->sibling = $list;
            if ($parent != null) {
                $parent->child = $node;
            }
            else {
                $root = $node;
            }
            $list = null;
        }
        else {
            $list = $node->child;
        }

        $parent = $node;
    }

    $node->val = $val;

    return $root;
}

function makeTrieNode() {
    $node = new \stdClass();

    $node->val = null;
    $node->ch = null;
    $node->sibling = null; // Соседний узел
    $node->child = null; // Дочерний узел

    return $node;
}