<?php
include '../koneksi.php';
if (isset($_POST['kode_user'])) {
    $kodeuser = $_POST['kode_user'];
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE kode_user = '$kodeuser';");
    if (!$query) {
        $data['pesan'] = "ID Data anda tidak valid Atau sudah digunakan Pada data lainh";
        $data['data'] = $_POST['kode_user'];
        $data['staus'] = false;
    } else {
        $data['pesan'] = "Data Berhasil dihapus database";
        $data['status'] = true;
    }
} else {
    $data['pesan'] = "Data yang dipost belum nyampe sini";
    $data['status'] = false;
}
echo json_encode($data);
