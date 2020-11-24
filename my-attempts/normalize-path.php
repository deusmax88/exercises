<?php

// Написать функцию, нормализующую unix путь

// /foo//bar/ -> /foo/bar/ несколько подряд идущих слешей не имеют смысла
$str = "foo/./bar"; // foo/bar
//$str = "./foo"; // foo
//$str = "./././../foo/bar"; // -> this is gonna be equal to just ../foo/bar
//$str = "foo//////bar"; // foo/bar
//$str = "/../../../zog"; // /zog
//$str = "zog/.."; // .
$str = "./../../../zog"; // ../../../zog

$result = [];
$parts = explode('/', $str);
for ($i = 0; $i < count($parts); $i++) {
    if ($parts[$i] == '.' || $parts[$i] == '') {
        continue;
    }
    elseif ($parts[$i] == '..') {
        array_pop($result);
        continue;
    }

    $result[] = $parts[$i];
}

var_dump(join('/', $result));


$stack = [];
$dir = "";
$i = 0;
$slashIsFirstChar = false;
while ($i < mb_strlen($str)) {

    $char = mb_substr($str, $i, 1);
    if (0 == $i && $char == '/') {
        $slashIsFirstChar = true;
    }
    while($char != '/' && $i < mb_strlen($str)) {
        $dir .= $char;
        $i++;
        $char = mb_substr($str, $i, 1);
    }
    // Вышели из цикла, т.к. $i указывает на /
    if (mb_strlen($dir) > 0) {
        if ($dir == '.') {
            // current directory - moving further

            $dir = "";
            $i++;
            continue;
        }

        if ($dir == '..') {
            if (!$slashIsFirstChar && (empty($stack) || $stack[count($stack) - 1] == '..')) {
                $stack[] = $dir;
            }
            else {
                array_pop($stack);
            }

            $dir = "";
            $i++;
            continue;
        }

        $stack[] = $dir;
    }

    $dir = "";
    $i++;
}

if (empty($stack)) {
    $stack[] = '.';
}

var_dump(($slashIsFirstChar ? "/" : "") .join('/', $stack));