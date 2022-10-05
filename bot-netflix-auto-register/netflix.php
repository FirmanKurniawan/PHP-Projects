<?php
function netflix($email)
{
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.netflix.com/api/shakti/v639a68aa/flowendpoint?flow=signupSimplicity&mode=welcome&landingURL=%2Fid-en%2F&landingOrigin=https%3A%2F%2Fwww.netflix.com&inapp=false&esn=NFCDCH-02-HJWUU0CUVHMKWR2PQHJVX632C64YF4&languages=en-ID&netflixClientPlatform=browser&supportCategory=innovation');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"flow":"signupSimplicity","mode":"welcome","authURL":"1629383488822.KcNjRTfp+DXGWasrUmBroU1Yqo0=","action":"saveAction","fields":{"email":{"value":"'.$email.'"}}}');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: www.netflix.com';
$headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"92\", \" Not A;Brand\";v=\"99\", \"Google Chrome\";v=\"92\"';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36';
$headers[] = 'X-Netflix.Client.Request.Name: ui/xhrUnclassified';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Origin: https://www.netflix.com';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://www.netflix.com/id-en/';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Cookie: nfvdid=BQFmAAEBEEJYRrySlSI8z0qurVLLIn9A0-Q-ZouPuKzQawCAN3Dlc9-LZFfbDyB8Tog1HV7FBohVa6AgHpAdAyfvlvNStv8REtGwX0UJZC25QisrbCNF0Q%3D%3D; memclid=5d012302-a0e8-4a2f-8530-d09c104a1af9; flwssn=133eacbc-b2b8-434e-8cf6-559c223ab55e; clSharedContext=dc931c3d-ebf8-4822-b97f-b9662dbf2b8b; SecureNetflixId=v%3D2%26mac%3DAQEAEQABABQ7I8L_gKMx0nLyoCtDSUFzvvlPJVaq4Z8.%26dt%3D1629383440186; NetflixId=v%3D2%26ct%3DBQAOAAEBEFQwLIzyUgq6CBRYb4vk5VaBAB4s72NbbJ9bULS-IBBYKtBhNZI4GQMu9fEddycTLJKdHgJKVw9KbX9MR-BqoEuGm1rlTKPAU25mA9klEat-ASpKqdn32Kw209SqyYlek-5bPHAsjaKUhM62efv5eWRvjnN42oOBlE8sAbHMjBcaU4nTB-rUdFdmuWCFOg20gtMG81LE-UQtoqZJ_Pe_dOVDGVPo7yTv9wV4nZpqc49O5XtcstFeZVbHbr2VKd9oc6QYSDU131m_EpfqCrka5TRbzRDQ-kyhR4DnBjIAvewKo9ZixO7AN0MU4ZkCfFN17OoswLFAj0YyX_NariFrY-pQVIVcTnmwMs_odzrDUfzWUeg.%26bt%3Ddev%26mac%3DAQEAEAABABQJSYjtqzk2rDgbS85IsQwKznaaHic0i_s.; cL=1629383489023%7C16293834892334429%7C162938348942191055%7C%7C4%7Cnull; OptanonConsent=isIABGlobal=false&datestamp=Thu+Aug+19+2021+22%3A31%3A29+GMT%2B0800+(China+Standard+Time)&version=6.6.0&consentId=2e4ed906-a60a-4f56-b950-86a0c7aec0f1&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A1%2CC0004%3A1&hosts=H1%3A1%2CH12%3A1%2CH13%3A1%2CH27%3A1%2CH28%3A1%2CH30%3A1&AwaitingReconsent=false';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 1);

$result = curl_exec($ch);
return $result;
}
echo "FOLLOW @n13bg DI IG COK !!!\n";
echo "INPUT FILE: ";

$listx = trim(fgets(STDIN));
$list = str_replace("\r", "", file_get_contents($listx));
foreach(explode("\n", $list) as $email)
{
	$page = netflix($email);
	if(strpos($page, '"mode":"passwordOnly"') !== false)
	{
		echo "$email [ PLAN ENDED ]\n";
	}
	elseif(strpos($page, '"mode":"registrationWithContext"') !== false)
	{
		echo "$email [ NOT REGISTERED ] \n";
	}
	elseif(strpos($page, '"mode":"switchFlow","n') !== false)
	{
		echo "$email [ PREMIUM ] \n";
		file_put_contents('netflixpremium.txt', $email."\n", FILE_APPEND);
	}
	else
	{
		echo "$email [ UNKNOWN ] MAYBE IP BLOCKED\n";
	}
	sleep(5);
}