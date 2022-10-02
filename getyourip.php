<?php
$get = file_get_contents('https://ip.seeip.org/jsonip');
$getip4 = file_get_contents('https://api.ipify.org?format=json');

$ip4 = json_decode($getip4);
$ip = json_decode($get);

echo "Hai, this is your IP now.." . "<br>";
echo "your IPv4 : " . $ip4->ip . "<br>";
echo "your IPv6 : " . $ip->ip . "<br>";
