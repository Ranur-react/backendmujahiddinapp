<?php
include '../koneksi.php';
if (isset($_POST['kode_datakegiatan'])) {
// $data['lihatdatayangdikirm']=$_POST;
    $kode_datakegiatan = $_POST['kode_datakegiatan'];
    $harikegiatan = $_POST['hari_kegiatan'];
    $waktukegiatan = $_POST['waktu_kegiatan'];
    $idpematerikegiatan = $_POST['idpematerikegiatan'];

    // $query = mysqli_query($conn, " INSERT INTO `tb_datakegiatan` (`kode_datakegiatan`, `hari_datakegiatan`, `id_datapemateri`) VALUES ('$kode_datakegiatan',  ' $harikegiatan', '$waktukegiatan', '$idpematerikegiatan'); ");
    $query = mysqli_query($conn, " INSERT INTO `tb_datakegiatan` (`kode_datakegiatan`, `hari_datakegiatan`,waktu_datakegiatan, `id_datapemateri`) VALUES ('$kode_datakegiatan', '$harikegiatan', '$waktukegiatan','$idpematerikegiatan'); ");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
        $data['data'] = $_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);

?>