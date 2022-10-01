<?php

// Moving Zeros To The End

function moveZeros(array $items)
{
    
    $zero = [];
    $nA = [];
    foreach ($items as $i) {
        if($i === 0 || $i === 0.0){
            if($i === 0.0){
                $i = intval($i);
            }
            $zero[] = $i;
        }else{
            $nA[] = $i;
        }
    }

    return array_merge($nA,$zero);

}

// var_dump(["a","b","c","d",1,1,3,1,9,9,0,0,0,0,0,0,0,0,0,0], moveZeros(["a",0,0,"b","c","d",0,1,0,1,0,3,0,1,9,0,0,0,0,9]));
var_dump([9,9,1,2,1,1,3,1,9,9,0,0,0,0,0,0,0,0,0,0], moveZeros([9,0.0,0,9,1,2,0,1,0,1,0.0,3,0,1,9,0,0,0,0,9]));
// var_dump(["a","b",null,"c","d",1,false,1,3,[],1,9,9,0,0,0,0,0,0,0,0,0,0], moveZeros(["a",0,0,"b",null,"c","d",0,1,false,0,1,0,3,[],0,1,9,0,0,0,0,9]));
// var_dump([1,null,2,false,1,0,0], moveZeros([0,1,null,2,false,1,0]));
// var_dump(["a","b"], moveZeros(["a","b"]));
// var_dump(["a"], moveZeros(["a"]));
// var_dump([0,0], moveZeros([0,0]));
// var_dump([0], moveZeros([0]));
// var_dump([false], moveZeros([false]));
// var_dump([], moveZeros([]));