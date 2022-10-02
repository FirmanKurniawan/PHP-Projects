<?php
function bubbleSort1(&$arr1)
{
    $n1 = sizeof($arr1);
    for ($i1 = 0; $i1 < $n1; $i1++) {
        for ($j1 = 0; $j1 < $n1 - $i1 - 1; $j1++) {
            if ($arr1[$j1] > $arr1[$j1 + 1]) {
                $t1 = $arr1[$j1];
                $arr1[$j1] = $arr1[$j1 + 1];
                $arr1[$j1 + 1] = $t1;
            }
        }
    }
}
$arr1 = [64, 32, 34, 26, 25, 43, 12, 68, 22, 90, 11];
$len1 = sizeof($arr1);
bubbleSort1($arr1);
echo "Sorted array : \n";
for ($i1 = 0; $i1 < $len1; $i1++) {
    echo $arr1[$i1] . " ";
}
?>
