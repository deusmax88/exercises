<?php
// Originally viewed on https://www.youtube.com/watch?v=0y7pU6PPrc4&list=PLi9RQVmJD2fapKJ4DnZzAn55NJfo5IM1c&index=54&t=0s

$dna = "AAAAACCCCCAAAAACCCCCCAAAAAGGGTTT";
// Expected output would be ['AAAAAACCCCC', 'CCCCCAAAAA']

$repeatedSubsequences = [];
$seen = [];
$i = 0;
while(($i + 10) <= mb_strlen($dna)) {
    $subsequence = mb_substr($dna, $i++, 10);
    $seen[$subsequence]++;
    if ($seen[$subsequence] == 2) {
        $repeatedSubsequences[] = $subsequence;
    }
}

var_dump($repeatedSubsequences);
