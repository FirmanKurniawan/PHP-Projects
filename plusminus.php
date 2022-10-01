<?php
  function plusMinus(iterable $arr, $n){
    $plus = 0;
    $minus = 0;
    $zero = 0;
    foreach($arr as $a){
      if ($a > 0){
        $plus +=1;
      }
      else if ($a < 0){
        $minus +=1;
      }
      else if ($a == 0){
        $zero += 1;
      }
    }
    echo round($plus/$n,6)."\n".round($minus/$n,6)."\n".round($zero/$n,6)."\n";
  }
  $n = readline("");

  $input = readline("");
  $arr = preg_split("/[\s,]+/",$input);
  plusMinus($arr, $n);
?>
