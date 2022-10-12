<?php
     $list = readline();
     $lists = preg_split("/[\s]+/",$list);
     $bill = readline();
     $bills = preg_split("/[\s]+/",$bill);
     $charged = readline();
     $actual = 0;
     for($i = 0 ; $i < $lists[0]; $i++){
        if($i != $lists[1]){
            $actual += $bills[$i];
        }
     }

     if($charged == ($actual/2)) {
        echo "Bon Appetit";
     }
     else {
        echo $charged - ($actual/2);
     }