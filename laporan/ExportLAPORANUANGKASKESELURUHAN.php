<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
include '../koneksi.php';
if (isset($_GET['bulan'])) {

    $month_num = $_GET['bulan'];;

    // Use mktime() and date() function to
    // convert number to month name
    $month_name = date("F", mktime(0, 0, 0, $month_num, 10));

    // Display month name
    $month_name . "\n";


    $html = '
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
            <tr>
                <td style="text-align: center;" colspan="4"> Cetak Laporam Khas Bulan ' . $month_num . ' </td>
               
            </tr>
        <thead>
            <tr>
                <th style="text-align: center;" >No</th>
                <th style="text-align: center;" >Uang Masuk</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
            </tr>
   
        </thead>
        <tbody>';

    $queryDonasi = mysqli_query($conn, " select*from tb_donasimasuk join tb_datadonatur on iddon_donmasuk=kode_datadonatur WHERE MONTH(tanggal_donmasuk)='$month_num';");
    // $queryPenermaan = mysqli_query($conn, " SELECT * FROM tb_penerimaan;");
    $queryInfak = mysqli_query($conn, " SELECT * FROM tb_datainfak join `tb_infak` on kodkatgr_infak=kodkatgr_infak where month(tanggal_datainfak)='$month_num';");
    $queryKeluar = mysqli_query($conn, " SELECT * FROM tb_uangkeluarlainnya where month(tanggal_keluar)='$month_num';");
    $queryKeluarDonasi = mysqli_query($conn, " SELECT*FROM `tb_penerimaan` 
JOIN `tb_jenisdonasi` ON `id_jenisdon`=`id_jenispenerima`
JOIN `tb_datapenerima` ON `id_dataspenerima`=`id_penerima` where month(tanggal_penerima)='$month_num';");
    // echo $_GET['bulan'];
    // die("------");
} else if (isset($_GET['tahun'])) {

    $tahun = $_GET['tahun'];;




    $html = '
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
            <tr>
                <td style="text-align: center;" colspan="4"> Cetak Laporam Khas Tahun ' . $tahun . ' </td>
               
            </tr>
        <thead>
            <tr>
                <th style="text-align: center;" >No</th>
                <th style="text-align: center;" >Uang Masuk</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
            </tr>
   
        </thead>
        <tbody>';

    $queryDonasi = mysqli_query($conn, " select*from tb_donasimasuk join tb_datadonatur on iddon_donmasuk=kode_datadonatur WHERE year(tanggal_donmasuk)='$tahun';");
    // $queryPenermaan = mysqli_query($conn, " SELECT * FROM tb_penerimaan;");
    $queryInfak = mysqli_query($conn, " SELECT * FROM tb_datainfak join `tb_infak` on kodkatgr_infak=kodkatgr_infak where year(tanggal_datainfak)='$tahun';");
    $queryKeluar = mysqli_query($conn, " SELECT * FROM tb_uangkeluarlainnya where year(tanggal_keluar)='$tahun';");
    $queryKeluarDonasi = mysqli_query($conn, " SELECT*FROM `tb_penerimaan` 
JOIN `tb_jenisdonasi` ON `id_jenisdon`=`id_jenispenerima`
JOIN `tb_datapenerima` ON `id_dataspenerima`=`id_penerima` where year(tanggal_penerima)='$tahun';");

    // echo $_GET['bulan'];
    // die("------");
} else {







    $html = '
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
            <tr>
                <td style="text-align: center;" colspan="4"> Cetak Laporam Khas  </td>
               
            </tr>
        <thead>
            <tr>
                <th style="text-align: center;" >No</th>
                <th style="text-align: center;" >Uang Masuk</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
            </tr>
   
        </thead>
        <tbody>';

    $queryDonasi = mysqli_query($conn, " select*from tb_donasimasuk join tb_datadonatur on iddon_donmasuk=kode_datadonatur ");
    // $queryPenermaan = mysqli_query($conn, " SELECT * FROM tb_penerimaan;");
    $queryInfak = mysqli_query($conn, " SELECT * FROM tb_datainfak join `tb_infak` on kodkatgr_infak=kodkatgr_infak ");
    $queryKeluar = mysqli_query($conn, " SELECT * FROM tb_uangkeluarlainnya ");
    $queryKeluarDonasi = mysqli_query($conn, " SELECT*FROM `tb_penerimaan` 
JOIN `tb_jenisdonasi` ON `id_jenisdon`=`id_jenispenerima`
JOIN `tb_datapenerima` ON `id_dataspenerima`=`id_penerima` ");
}




function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
$n = 0;
$total = 0;
while ($data = mysqli_fetch_array($queryDonasi)) {
    $n += 1;
    $total += $data["jumlah_donmasuk"];
    $html .= '
                <tr>
                <td style="text-align: center;">' . $n . '</td>
                <td style="text-align: left;"> Donasi Masuk (' . $data["ket_donmasuk"] . ')</td>
                <td style="text-align: center;">' . $data["tanggal_donmasuk"] . '</td>
                <td style="text-align: left;">' . rupiah($data["jumlah_donmasuk"]) . '</td>
            </tr>
                ';
}
while ($data = mysqli_fetch_array($queryInfak)) {
    $n += 1;
    $total += $data["jumlah_datainfak"];
    $html .= '
                <tr>
                <td style="text-align: center;">' . $n . '</td>
                <td style="text-align: left;"> Infak Masuk (' . $data["namakatgr_infak"] . ')</td>
                <td style="text-align: center;">' . $data["tanggal_datainfak"] . '</td>
                <td style="text-align: left;">' . rupiah($data["jumlah_datainfak"]) . '</td>
            </tr>
                ';
}
$html .= '
                <tr>
                <td style="text-align: center;" colspan="3">Total</td>
                <td style="text-align: left;">' . rupiah($total) . '</td>
            </tr>
                ';
$html .= '
                <thead>
                <tr>
                    <th style="text-align: center;" >No</th>
                    <th style="text-align: center;" >Uang Keluar Donasi</th>
                    <th style="text-align: center;" >Tanggal</th>
                    <th style="text-align: center;" >Jumlah (Rp)</th>
                </tr>
       
            </thead>
                ';
$nx = 0;
$totalkeluar = 0;
while ($data = mysqli_fetch_array($queryKeluarDonasi)) {
    $nx += 1;
    $totalkeluar += $data["jumlah_keluar"];
    $html .= '
                        <tr>
                        <td style="text-align: center;">' . $nx . '</td>
                        <td style="text-align: left;"> Pemberian Donasi ~' . $data["nama_jenisdon"] . '~ Kepada ~' . $data["nama_penerima"] . ' ~ </td>
                        <td style="text-align: center;">' . $data["tanggal_penerima"] . '</td>
                        <td style="text-align: left;">' . rupiah($data["jumlah_donasi"]) . '</td>
                    </tr>
                        ';
}
$html .= '
                <thead>
                <tr>
                    <th style="text-align: center;" >No</th>
                    <th style="text-align: center;" >Uang Keluar Lainnya</th>
                    <th style="text-align: center;" >Tanggal</th>
                    <th style="text-align: center;" >Jumlah (Rp)</th>
                </tr>
       
            </thead>
                ';
$nx = 0;
$totalkeluar = 0;
while ($data = mysqli_fetch_array($queryKeluar)) {
    $nx += 1;
    $totalkeluar += $data["jumlah_keluar"];
    $html .= '
                        <tr>
                        <td style="text-align: center;">' . $nx . '</td>
                        <td style="text-align: left;"> I' . $data["uraian_keluar"] . '</td>
                        <td style="text-align: center;">' . $data["tanggal_keluar"] . '</td>
                        <td style="text-align: left;">' . rupiah($data["jumlah_keluar"]) . '</td>
                    </tr>
                        ';
}
$html .= '
                <tr>
                <td style="text-align: center;" colspan="3">Total Khas Keluar</td>
                <td style="text-align: left;">' . rupiah($totalkeluar) . '</td>
            </tr>
                ';
$html .= '
                <tr>
                <td style="text-align: center;" colspan="3">SALDO KAS SISA / TOTAL</td>
                <td style="text-align: left;">' . rupiah($total - $totalkeluar) . '</td>
            </tr>
                ';
$html .= '
    
        </tbody>
        <tbody>
        </tbody>
</table>
TTD


<br>
<br>
<br>
  Ketua Umum
    </body>
    </html>

';

$mpdf->WriteHTML($html);
$mpdf->Output();