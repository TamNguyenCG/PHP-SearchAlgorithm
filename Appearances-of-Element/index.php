<?php
$number = [1,2,3,4,5,5,5,5,6,7,8,8,99,9,9,112,414,525];

foreach ($number as $item) {
    echo $item." ";
}
$element = 5 ;
$appearances = countAppearances($number,$element);
echo "<br>";
echo "The element $element appearance : $appearances time(s)";


function countAppearances(array $arr,int $element): int
{
    $count = 0;
    $len = count($arr);
    for ($i = 0;$i < $len ;$i++){
        if($element == $arr[$i]){
            $count++;
        }
    }
    return $count;
}