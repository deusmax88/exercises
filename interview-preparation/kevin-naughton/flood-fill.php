<?php
// Originally viewed on https://www.youtube.com/watch?v=TClRuEZ-uDg&list=PLi9RQVmJD2fY_-QarOPWzUepqEkHda2UY

$sr = 1;
$sc = 1;
$newColor = 1;
$image = [
    [1, 1, 0],
    [0, 1, 0],
    [0, 1, 1]
];

function fill(&$image, $i, $j, $newColor) {
    if ($i < 0 || $i >= count($image) || $j < 0 || $j >= count($image[$i]) || $image[$i][$j] == $newColor) {
        return;
    }

    $image[$i][$j] = $newColor;
    fill($image, $i - 1 , $j, $newColor);
    fill($image, $i + 1, $j, $newColor);
    fill($image, $i, $j - 1, $newColor);
    fill($image, $i, $j + 1, $newColor);
}

fill($image, 0, 2, 1);

var_dump($image);