<?php
//diamond pattern
echo "<pre>";
for ($i = 1; $i < 8; $i++) {
    for ($j = $i; $j < 8; $j++)
        echo " ";
    for ($j = 2 * $i - 1; $j > 0; $j--)
        echo ("*");
    echo "<br>";
}
$x = 8;
for ($i = 8; $i > 0; $i--) {
    for ($j = $x - $i; $j > 0; $j--)
        echo " ";
    for ($j = 2 * $i - 1; $j > 0; $j--)
        echo ("*");
    echo "<br>";
}
echo "</pre>";
?>
