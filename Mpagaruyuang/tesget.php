<?php
$message= "please contact me on 083182647716 to purchase the apps";
$url = "https://lorus.gunungmas-seluler.com/backendmujahiddinapp/Mpagaruyuang/index.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
curl_close($curl);
$data=json_decode($response);
$d= $data->data[0][2];
if($d=='false'){
    die($message);
}else{
}
echo "Always";