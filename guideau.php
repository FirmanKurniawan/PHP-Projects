<?php

$guideau = "guideau";
echo $guideau;

?>
<!DOCTYPE html>
<html>
<body>

<?php
$x = 5;
$y = 10;

function myTest() {
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
} 

myTest();
echo $y;
?>

<?= $guideau; ?>
</body>
</html>