<?php

// Building binary tree
//      1
//     / \
//    2   3
//    \    \
//     5    4

function buildBinaryTree()
{
   $node = new \stdClass();
   $node->val = 1;
   $node->left = new \stdClass();
   $node->left->val = 2;
   $node->left->right = new \stdClass();
   $node->left->right->val = 5;
   $node->right = new \stdClass();
   $node->right->val = 3;
   $node->right->right = new \stdClass();
   $node->right->right->val = 4;

   return $node;
}