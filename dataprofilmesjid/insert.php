<?php
include '../koneksi.php';
if (isset($_POST['notelp_informasi'])) {
// $data['lihatdatayangdikirm']=$_POST;
    $notelp_informasi = $_POST['notelp_informasi'];
    $norek_informasi = $_POST['norek_informasi'];
    $anrek_informasi = $_POST['anrek_informasi'];
    $bank_rekening = $_POST['bank_rekening'];
    $id_penanggungjwb = $_POST['id_penanggungjwb'];

    $query = mysqli_query($conn, " INSERT INTO `tb_informasi` 
     VALUES ('$notelp_informasi', '$norek_informasi', '$bank_rekening', '$id_penanggungjwb','$anrek_informasi'); ");

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
