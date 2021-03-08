<?php


function getConfigDiff($originalConfig, $newConfig)
{
    $localDiff = [];

    foreach($originalConfig as $key => $value) {
        if (!array_key_exists($key, $newConfig)) {
            $localDiff[$key] = [
                'original' => $value
            ];
            continue;
        }

        if (is_array($originalConfig[$key])) {
            $diff = getConfigDiff($originalConfig[$key], $newConfig[$key]);
            if (!empty($diff)) {
                $localDiff[$key] = $diff;
            }
        }
        else {
            if ($value != $newConfig[$key]) {
                $localDiff[$key] = [
                    'original' => $value,
                    'new' => $newConfig[$key]
                ];
            }
        }

        unset($newConfig[$key]);
    }

    foreach($newConfig as $key => $value) {
        $localDiff[$key] = [
            'new' => $value
        ];
    }

    return $localDiff;
}

$conf1 = [
    'a' => [
        'b' => [
            'c' => 1,
        ]
    ]
];

$conf2 = [
    'a' => [
        'b' => [
            'c' => 1,
            'd' => 0
        ]
    ]
];

ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set('xdebug.var_display_max_children', -1);
var_dump(getConfigDiff($conf1, $conf2));
//var_dump(getConfigDiff($conf2, $conf1));