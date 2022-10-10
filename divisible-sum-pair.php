<?php
    $nk = readline();
    $nks = preg_split("/[\s]+/",$nk);
    $arr = readline();
    $arrs = preg_split("/[\s]+/",$arr);
    $divisible = 0;
    for($i = 0 ; $i < $nks[0]; $i++){
        for($j = $i+1 ; $j < $nks[0]; $j++){
            if( ($arrs[$i] + $arrs[$j]) % $nks[1] == 0 ){
                $divisible += 1;
            }
        }
    }
    echo $divisible;