<?php

header("Access-Control-Allow-Origin: *");
$curl = curl_init();

$params=["name"=>"xyz","username"=>"xyz123","password"=>"xyz@123","email"=>"xyz@mail.com"];

curl_setopt_array($curl,[
    CURLOPT_URL=>"https://sea-turtle-app-ckm8k.ondigitalocean.app/users/register",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_TIMEOUT=>30,
    CURLOPT_CUSTOMREQUEST=>"POST",
    CURLOPT_POSTFIELDS=>json_encode($params),
    CURLOPT_HTTPHEADER=>["Content-Type: application/json"]
]);

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    echo "cURL Error #:" . $err;
}else{
    echo $response;
}

curl_close($curl);
?>