<?php
#program to check a number is prime or not
echo "Enter a number: ";
$number = trim(fgets(STDIN));
echo check_prime($number);

#function to check prime
function check_prime($number)
{
    $count = 0;
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $count++;
        }
    }
    if ($count == 2) {
        echo "The number $number is a prime number";
    } else {
        echo "The number $number is not a prime number";
    }
}
