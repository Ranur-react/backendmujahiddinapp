<?php
include '../koneksi.php';
include '../Notiflibrary/index.php';



//key dan configurations
$fetchQry1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='FCM_AUTH_KEY';"));
$keyApi=$fetchQry1['value'];
$fetchQry2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='FCM_URL';"));
echo $urlApi=$fetchQry2['value'];


//---end
// sendPush($to, $title, $body, $imagesContent, $icon, $urldst, $keyApi, $urlApi)


?>