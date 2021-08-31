<?php
$url = "https://lorus.gunungmas-seluler.com/backendmujahiddinapp/Mpagaruyuang/index.php";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
curl_close($curl);
$data=json_decode($response);
// var_dump($data->data);
echo "isi data->data";
$d= $data->data;
echo $d[0][1];
var_dump($d[0][1]);
// echo $data->data;
