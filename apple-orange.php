<?php
  $house = readline();
  $houses = preg_split("/[\s]+/",$house);
  $tree = readline();
  $trees = preg_split("/[\s]+/",$tree);
  $fruit = readline();
  $fruits = preg_split("/[\s]+/",$fruit);
  $apple = readline();
  $apples = preg_split("/[\s]+/",$apple);
  $orange = readline();
  $oranges = preg_split("/[\s]+/",$orange);
  $appleHouse = 0;
  $orangeHouse = 0;
  foreach($apples as $a){
    if ($a + $trees[0] >= $houses[0] && $a + $trees[0] <= $houses[1]){
        $appleHouse += 1;
    }
  }
  foreach($oranges as $a){
    if ($a + $trees[1] >= $houses[0] && $a + $trees[1] <= $houses[1]){
        $orangeHouse += 1;
    }
  }
  echo($appleHouse . "\n" . $orangeHouse);