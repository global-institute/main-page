<?php
session_start();
require 'config.php'; 
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin" OR $cek_jabatan == "supervisor" AND $identitas_jabatan == "supervisor" OR $cek_jabatan == "petugas" AND $identitas_jabatan == "petugas"){
    $data = $_GET['data'];
    //hapus data dari tabel kontak
    $delete = mysqli_query($conn, "DELETE FROM tb_supplier WHERE id_supplier = '$data'");
    if($delete == TRUE){
        $_SESSION["success-delete"] = 'Data berhasil dihapus';
        header("location: ".$base_link."tampil-data-supplier.php");
    } else {
        header("location: ".$base_link."tampil-data-supplier.php");
    }
} else {
    header("location: ".$base_link."page-logout.php");
}
?>