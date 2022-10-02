<?php

class Schedule{

    // For Schedule time
public function setIntervalTime($start, $end, $intervalMinutes)
{
    $time = [$start];

    for($i = 1; $i <= 48; $i++){
    $endTime = strtotime("+".$intervalMinutes." minutes", strtotime($start));
    $start = date('H:i', $endTime);
    $time[] = $start;
        }

    return $time;
}
    
}

?>
