<?php
include '../koneksi.php';
if (isset($_POST['kode_kegiatan'])) {
// $data['lihatdatayangdikirm']=$_POST;
    $kodekegiatan = $_POST['kode_kegiatan'];
    $namakegiatan = $_POST['nama_kegiatan'];
    $harikegiatan = $_POST['hari_kegiatan'];
    $waktukegiatan = $_POST['waktu_kegiatan'];
    $namapemkegiatan = $_POST['namapem_kegiatan'];

    $query = mysqli_query($conn, " INSERT INTO `db_mujahiddin`.`tb_kegiatan` (`kode_kegiatan`, `nama_kegiatan`, `hari_kegiatan`, `waktu_kegiatan`, `namapem_kegiatan`) VALUES ('$kodekegiatan', '$namakegiatan', ' $harikegiatan', '$waktukegiatan', '$namapemkegiatan'); ");

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
