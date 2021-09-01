<?php
include '../Notiflibrary/index.php';

//Jumlah device Maximal penerima notif
$jumlahDevice=100;
$fetchQry7 = mysqli_fetch_array(mysqli_query($conn, " SELECT * FROM tb_pemateri WHERE kode_pemateri='$kode_pemateri';"));
$NamaUstadz=$fetchQry7['nama_pemateri'];
//key dan configurations
    $fetchQry1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='FCM_AUTH_KEY';"));
$keyApi=$fetchQry1['value'];
    $fetchQry2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='FCM_URL';"));
$urlApi=$fetchQry2['value'];
//---end

//Kontent Config
$title="Pemateri ". $NamaUstadz." Sudah Datang";
$body="Hallo Jema'ah Mesjid Mujahidin, Pemateri Kegiatan deng Ustadz ". $NamaUstadz ." Akan segera berlangsung, karena ustadz sudah di konfirmasi datang";
    $fetchQry3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='utadzsomad';"));
$imagesContent= $fetchQry3['value'];
$fetchQry4 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='FCM_ICON';"));
$icon= $fetchQry4['value'];
    $fetchQry5 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_FCMConfig where tb_FCMConfig.key='FCM_DEFAULT_URI_APP_ANDROID';"));
$urldst= $fetchQry5['value'];
//end


//Destionatyions Device
$fetchQry6= mysqli_query($conn, "Select * FROM tb_FCM_Devices where last_online in (SELECT MAX(last_online) from tb_FCM_Devices Group by date(last_online) ) order by last_online desc limit 10;");
$database = [];
while ($d = mysqli_fetch_array($fetchQry6)) {
    $database[$d['token_id']] =sendPush($d['token_id'], $title, $body, $imagesContent, $icon, $urldst, $keyApi, $urlApi);
}
$data['Sending_Progrres'] = $database;


?>