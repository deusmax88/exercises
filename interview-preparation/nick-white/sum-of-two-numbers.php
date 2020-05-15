<?php
// Originally viewed on https://www.youtube.com/watch?v=sAQT4ZrUfWo&list=PLU_sdQYzUj2keVENTP0a5rdykRSgg9Wp-&index=5
// assume that array is sorted in ascending order

$numbers = [2,7, 11, 15];
$target = 9;

$i = 0;
$j = count($numbers) - 1;

while($i < $j) {
    if (($numbers[$i] + $numbers[$j]) > $target) {
        $j--;
    }
    elseif (($numbers[$i] + $numbers[$j]) < $target){
        $i++;
    }
    else {
        echo ($i + 1)." - ".($j + 1)."\n";
        break;
    }
}