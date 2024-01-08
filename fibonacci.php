<?php

function sequence($n) {
    // Xn - член послідовності
    // X1 = 0
    // x2 = 1
    // Xn = Xn-1 + Xn-2

    $X = [0, 1];

    for ($i = 2; $i <= $n; $i++) 
    {

    $X[$i] = $X[$i - 1] + $X[$i - 2];

    }

    return $X;
    
}

$arr = sequence(9);

print_r('Послідовність: <br>' . implode('<br>',  $arr) . '<br>');

print_r('Сума: ' . array_sum($arr));