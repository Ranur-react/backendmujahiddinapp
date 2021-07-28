<?php
include '../koneksi.php';
if (isset($_POST['kode_datadonatur'])) {

    $kodedatadonatur = $_POST['kode_datadonatur'];
    $namadatadonatur = $_POST['nama_datadonatur'];
    $alamatdonatur = $_POST['alamat_donatur'];
    $nohpdonatur = $_POST['nohp_donatur'];

    $query = mysqli_query($conn, " INSERT INTO `db_mujahiddin`.`tb_datadonatur` (`kode_datadonatur`, `nama_datadonatur`, `alamat_donatur`, `nohp_donatur`) 
    VALUES ('$kodedatadonatur', ' $namadatadonatur', '$alamatdonatur', '$nohpdonatur'); ");

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
?>