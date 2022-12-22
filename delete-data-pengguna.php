<?php
session_start();
require 'config.php'; 
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin"){
    $data = $_GET['data'];
    //hapus data dari tabel kontak
    $delete = mysqli_query($conn, "DELETE FROM tb_pengguna WHERE username='$data'");
    if($delete == TRUE){
        $_SESSION["success-delete"] = 'Data berhasil dihapus';
        header("location: ".$base_link."tampil-data-pengguna.php");
    } else {
        header("location: ".$base_link."tampil-data-pengguna.php");
    }
} else {
    header("location: ".$base_link."page-logout.php");
}
?>