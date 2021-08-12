<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM tb_informasi;");
$tahun=date('Y');
$bulan=date('m');
$hariini=date('Y-m-d');
$queryInfoInfakBulanIni = mysqli_query($conn, "SELECT tanggal_datainfak,SUM(jumlah_datainfak) as infakBulanIni FROM tb_datainfak WHERE YEAR(tanggal_datainfak) = '$tahun' AND MONTH(tanggal_datainfak) = '$bulan'; ");
$queryInfoInfakHariIni = mysqli_query($conn, "SELECT tanggal_datainfak,SUM(jumlah_datainfak) as InfakHariIni FROM tb_datainfak WHERE tanggal_datainfak = '$hariini';");

if ($query) {
    $database = [];
    while ($d = mysqli_fetch_array($query)) {
        $database[] = $d;
    }
    $data['data'] = $database;

    $data['pesan'] = "";
    $data['status'] = true;
    if ($queryInfoInfakBulanIni) {
        $database = [];
        while ($d = mysqli_fetch_array($queryInfoInfakBulanIni)) {
            $database[] = $d;
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['databulanini'] = $database;
    
        $data['pesan'] = "";
        $data['status'] = true;
        if ($queryInfoInfakHariIni) {
            $database = [];
            while ($d = mysqli_fetch_array($queryInfoInfakHariIni)) {
                $database[] = $d;
            }
            $data['hari'] = $hariini;
            $data['datahariini'] = $database;
        
            $data['pesan'] = "";
            $data['status'] = true;
            
        }else{
            $data['hari'] = $hariini;
            $data['pesan'] = "Data gagal diambil dari database Infak Hari  Ini";
            $data['status'] = false;
        }
    }else{
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['pesan'] = "Data gagal diambil dari database Infak Bulan Ini";
        $data['status'] = false;
    }
}else{
    $data['data'] = "";
    $data['pesan'] = "Data gagal diambil dari database";
    $data['status'] = false;
}
echo json_encode($data);
