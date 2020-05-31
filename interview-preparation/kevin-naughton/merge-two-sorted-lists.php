<?php
// Originally viewed on https://www.youtube.com/watch?v=K63Mjf-H0B0&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=37

$lists = [
    [1, 2, 4],
    [1, 3, 4]
];

// The result is gonna be [1, 1, 2, 3, 4, 4]
$list1 = $lists[0];
$list2 = $lists[1];

$result = [];
$i = $j = 0;
while($i < count($list1) && $j < count($list2)) {
   if ($list1[$i] < $list2[$j]) {
       $result[] = $list1[$i];
       $i++;
   }
   else {
       $result[] = $list2[$j];
       $j++;
   }
}

while ($i < count($list1)) {
    $result[] = $list1[$i];
    $i++;
}

while($j < count($list2)) {
    $result[] = $list2[$j];
    $j++;
}

var_dump($result);