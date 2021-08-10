<?php
include '../koneksi.php';
if (isset($_POST['no_datakegtn'])) {
    // $data['lihatdatayangdikirm']=$_POST;
        $a = $_POST['no_datakegtn'];
        $b = $_POST['kode_datakegiatan'];
        $c = $_POST['hari_kegiatan'];
        $d = $_POST['waktu_kegiatan'];
        $e = $_POST['idpematerikegiatan'];

    $query = mysqli_query($conn, "UPDATE tb_datakegiatan SET  kode_datakegiatan= '$b', hari_kegiatan= '$c', waktu_kegiatan= '$d',   idpematerikegiatan= '$e' WHERE no_datakegtn= '$a';");

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
