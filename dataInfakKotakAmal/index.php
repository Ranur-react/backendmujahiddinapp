<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT id_datainfak,CONCAT(namakatgr_infak,'~(',tanggal_datainfak,')') as info, jumlah_datainfak,idkatgr_datainfak,tanggal_datainfak,jumlah_datainfak FROM tb_datainfak join tb_infak on kodkatgr_infak=idkatgr_datainfak;");

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