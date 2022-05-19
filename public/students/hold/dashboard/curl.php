<?php
$data=['name'=>"Paul",'age'=>20,'sex'=>"male"];
$link ="http://localhost/classiccare/home/admin2/dashboard/formprocess.php";
$curl = curl_init();
 curl_setopt($curl,CURLOPT_URL,"$link");
 curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
 curl_setopt($curl,CURLOPT_POST,true);
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
$response=curl_exec($curl);
echo $response;
$json =json_decode($response);
//print_r($json);
?>