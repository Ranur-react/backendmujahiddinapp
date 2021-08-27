<?php
include '../koneksi.php';
$query = mysqli_query($conn, "select iddon_penerima,concat(nama_penerima,' ( ',nama_jenisdon,')',' ~ ',alamat_penerima) as perner,jumlah_donasi,id_penerima,id_jenispenerima,tanggal_penerima from tb_penerimaan join tb_datapenerima on id_dataspenerima=id_penerima join tb_jenisdonasi on id_jenispenerima=id_jenisdon;");

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