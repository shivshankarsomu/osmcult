<?php
$msg = "Hi Shiv Shankar Subudhi";
$phone = "9845325914";
$url ="http://bhashsms.com/api/sendmsg.php?user=success&pass=654321&sender=shiv&phone=";
$url .= $phone;
$url .= "&text=" ;
$url .= $msg ;
$url .= "&priority=ndnd&stype=normal" ;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_PUT, 1);
$response = curl_exec($curl);
curl_close($curl);

?>
