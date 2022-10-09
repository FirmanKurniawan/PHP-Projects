<?php
     $total = readline();
     for($i = 0 ; $i < $total; $i++){
        $pos = readline();
        $poses = preg_split("/[\s]+/",$pos);
        $catA = abs($poses[2] - $poses[0]);
        $catB = abs($poses[2] - $poses[1]);
        if($catA == $catB){
            echo "Mouse C \n";
        }
        else if($catA > $catB){
            echo "Cat B \n";
        }
        else {
            echo "Cat A \n";
        }
     }
     