<?php

setlocale(LC_ALL,"hu_HU.UTF8");

echo("UTC: ");
echo(strftime("%Z"));
echo("<br><hr>");

echo("Date: ");
echo(strftime("%B %d, %Y"));
echo("<br>");
echo("or: ");
echo(date("m/d/Y"));
echo("<br><hr>");

echo("Day: ");
echo(strftime("%A"));
echo("<br><hr>");

echo("Time: ");
echo(strftime(" %X "));
echo("<br>");
echo("or: ");
echo date("h:i:s a");
echo("<br><hr>");
echo("<hr>");

echo("Thank you");
echo("<hr>");
?>
</h1>
Click the button for your current time verses UTF-8 time:
        <input type="time" id="timeng" />
<?php
echo("<hr>");
  echo "Current Date/Time:<br>";
  echo date("l m/d/y h:i:s a");
?>
</center>
<hr>
<h2>
