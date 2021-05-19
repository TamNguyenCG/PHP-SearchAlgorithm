<?php

$arr = range(1, 100);
$secretNumber = 50;


echo "The Secret number is : $secretNumber <br>";
binarySearch($arr, $secretNumber);


function binarySearch(array $arr, int $secretNumber): int
{
    $low = 0;
    $high = count($arr) - 1;
    $computer = rand($low,$high);
    while ($low <= $high) {
        $computer = rand($low,$high);
        echo $computer."=>";
        if ($computer > $secretNumber) {
            $high = $computer - 1;
            echo "Too high <br>";
        } elseif ($computer < $secretNumber) {
            $low = $computer +  1;
            echo "Too low <br>";
        } else{
            echo "Exactly !!!";
            break;
        }
    }
    return $computer;
}