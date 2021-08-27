<?php
include '../koneksi.php';
if (isset($_POST['kode_datadonatur'])) {

    $a = $_POST['kode_datadonatur'];
    $b = $_POST['nama_datadonatur'];
    $c = $_POST['alamat_donatur'];
    $d = $_POST['nohp_donatur'];


    $query = mysqli_query($conn, "UPDATE tb_datadonatur SET  nama_datadonatur= '$b', alamat_donatur= '$c', nohp_donatur= '$d'   WHERE kode_datadonatur= '$a';");

    if ($query) {
        $data['pesan'] = "Data Anda Berhail Update";
        $data['status'] = true;
    } else {
        $data['data'] =$_POST;
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
