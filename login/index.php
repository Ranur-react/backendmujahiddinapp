<?php
include '../koneksi.php';
$user = $_POST['username'];
$password = $_POST['password'];

$querymailcek = mysqli_query($conn, "select * from tb_user where username_user='$user' ");
$query = mysqli_query($conn, "select * from tb_user where username_user='$user' and `password_user`='$password' ;");
$rc=mysqli_num_rows ( $querymailcek );
$rcp=mysqli_num_rows ( $query );
if($rc>0){
    $data['rc'] = $rc;
    if ($rcp>0) {
        $database = [];
        while ($d = mysqli_fetch_array($query)) {
            $database[] = $d;
        }
        $data['data'] = $database;
    
        $data['pesan']['success'] = "Berhasil Login";
        $data['status'] = true;
    }else{
        $data['pesan']['erorr']['password'] = "Password (".$password.") salah, perhatikan penulisan dengan benar";
        $data['status'] = false;
    }
}else{
    $data['rc'] = $rc;
    $data['pesan']['erorr']['username'] = "User (".$user.") tidak Ditemukan, Tulis Username dengan benar";
    $data['status'] = false;
    
}

echo json_encode($data);
?>