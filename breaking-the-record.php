<?php
  $limit = readline();
  $games = readline();
  $game = preg_split("/[\s]+/",$games);
  $hCounter = 0;
  $lCounter = 0;
  $currHigh = 0;
  $currLow = 0;
  foreach($game as  $key => $value){
    if($key == 0) {
        $currHigh = $value;
    }
    else if ( $value > $currHigh) {
        $hCounter += 1;
        $currHigh = $value;
    }
    if($key == 0){
        $currLow = $value;
    }
    else if ( $value < $currLow) {
        $lCounter += 1;
        $currLow = $value;
    }
  }
  echo($hCounter . " " . $lCounter);
