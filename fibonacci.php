<?php

class Fibonacci
{

    public function sequenceVar1($n, $X1, $X2) {
        // Xn - член послідовності
        // X1 = 0
        // x2 = 1
        // Xn = Xn-1 + Xn-2

        $X = array($X1, $X2);

        for ($i = 2; $i <= $n; $i++) 
        {

        $X[$i] = $X[$i - 1] + $X[$i - 2];

        }

        return $X;
        
    }

}

class Sum extends Fibonacci
{
    
}

$fibonacci = new Sum();

$collection = $fibonacci->sequenceVar1(5, 0, 1);

function getArray($array)
{
    return $array;
}

// повертаємо масив із функції

$sum = getArray($collection);

echo "Послідовність:";
echo "<br>";


// отримуєму значення масива

foreach($sum as $key=>$val) {
    echo $val . "<br>";
}

echo "<br>";
echo "Сума: ";
// сума послідовності чисел Фібоначчі
print_r(array_sum($sum));