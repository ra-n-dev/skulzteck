<?php
$senderid="Classiccare";
$phone="233541994034";
$message="sending mtn momo";
$link ="http://sms.kologsoft.com/sms/api?action=send-sms&api_key=OnBhdWwxMjM0&to=$phone&from=$senderid&sms=YourMessage";
$curl = curl_init();
 curl_setopt($curl,CURLOPT_URL,"$link");
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
$response=curl_exec($curl);
//echo $response;
$json =json_decode($response);
//print_r($json);
echo $json->code ."<br>";
echo $json->message;
?>