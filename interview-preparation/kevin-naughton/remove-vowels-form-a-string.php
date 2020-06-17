<?php
// Originally viewed https://www.youtube.com/watch?v=dzAVG6MI6EU&list=PLi9RQVmJD2fZgRyOunLyt94uVbJL43pZ_&index=41&t=0s

$s = "so what";
$out = "";
for($i = 0; $i < mb_strlen($s); $i++) {
    $c = mb_substr($s, $i, 1);
    if ($c == 'a' || $c == 'e' || $c == 'i' || $c == 'o' || $c == 'u') {
        continue;
    }
    $out .= $c;
}

var_dump($out);