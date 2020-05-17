<?php

// Building binary tree
// Just like it's represented in video

function buildBinaryTree()
{
    $node = new \stdClass();
    $node->val = 5;
    $node->left = new \stdClass();
    $node->left->val = 4;
    $node->left->left = new \stdClass();
    $node->left->left->val = 11;
    $node->left->left->left = new \stdClass();
    $node->left->left->left->val = 7;
    $node->left->left->right = new \stdClass();
    $node->left->left->right->val = 2;
    $node->right = new \stdClass();
    $node->right->val = 8;
    $node->right->left = new \stdClass();
    $node->right->left->val = 13;
    $node->right->right = new \stdClass();
    $node->right->right->val = 4;
    $node->right->right->right = new \stdClass();
    $node->right->right->right->val = 1;

    return $node;
}