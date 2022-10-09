<?php
    $state = readline();
    $states = preg_split("/[\s]+/",$state);
    $height = readline();
    $heights = preg_split("/[\s]+/",$height);
    if($states[1] < max($heights)){
        echo max($heights) - $states[1];
    }
    else {
        echo 0;
    }