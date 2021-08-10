<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT nama_kegiatan,`hari`,`waktu_datakegiatan` FROM tb_datakegiatan join `tb_kegiatan` on kode_kegiatan=kode_datakegiatan join tb_hari on hari_datakegiatan=id;");

if ($query) {
    $database = [];
    while ($d = mysqli_fetch_array($query)) {
        $database[] = $d;
    }
    $data['data'] = $database;

    $data['pesan'] = "";
    $data['status'] = true;
}else{
    $data['data'] = "";
    $data['pesan'] = "Data gagal diambil dari database";
    $data['status'] = false;
}
echo json_encode($data);

?>