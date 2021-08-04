<?php
include '../koneksi.php';
if (isset($_POST['notelp_informasi'])) {

    $notelp_informasi = $_POST['notelp_informasi'];
    $norek_informasi = $_POST['norek_informasi'];
    $anrek_informasi = $_POST['anrek_informasi'];
    $bank_rekening = $_POST['bank_rekening'];
    $id_penanggungjwb = $_POST['id_penanggungjwb'];

    $query = mysqli_query($conn, " UPDATE tb_informasi SET  norek_informasi= '$norek_informasi', notelp_informasi= '$notelp_informasi', anrek_informasi= '$anrek_informasi',   bank_rekening= '$bank_rekening',id_penanggungjwb= '$id_penanggungjwb' WHERE notelp_informasi= '$notelp_informasi';");

    if ($query) {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
        $data=['data']=$_POST;
    } else {
        $data['pesan'] = "Data Anda Berhail Update";
        $data['status'] = true;

    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
?>