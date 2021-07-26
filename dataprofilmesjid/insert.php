<?php
include '../koneksi.php';
if (isset($_POST['notelpn_profilm'])) {
// $data['lihatdatayangdikirm']=$_POST;
    $notelpnprofilm = $_POST['notelpn_profilm'];
    $namabnkprofilm = $_POST['namabnk_profilm'];
    $norekprofilm = $_POST['norek_profilm'];
    $idpenjawabprofilm = $_POST['idpenjawab_profilm'];

    $query = mysqli_query($conn, " INSERT INTO `db_mujahiddin`.`tb_profilmesjid` (`notelpn_profilm`, `namabnk_profilm`, `norek_profilm`, `idpenjawab_profilm`)
     VALUES ('$notelpnprofilm', '$namabnkprofilm', '$norekprofilm', '$idpenjawabprofilm'); ");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
