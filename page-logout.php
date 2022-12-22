<?php
session_start();
require 'config.php'; 
if($_SESSION["username"] == TRUE){
    $post_username = $_SESSION["username"]; 
    
    $filter_operating_system = str_replace(array('&','<','>'), array('&amp;','&lt;','&gt;'), $operating_system);
    $check_device = mysqli_query($conn, "SELECT perangkat FROM tb_device");
    while($data_device = mysqli_fetch_assoc($check_device)) {
      $perangkat = $data_device['perangkat'];
      if (strpos($_SERVER['HTTP_USER_AGENT'], ''.$perangkat.'')){
        $devicename = ''.$perangkat.'';
      }
    }
    if(empty($devicename)){
      $devicename = "Other";
    }
    $insert = mysqli_query($conn, "INSERT INTO tb_login_history VALUES ('', '$post_username', '$filter_operating_system', '$devicename', '$date $time', 'offline')");
    if($insert == TRUE){
        unset($_SESSION['submit']); 
        unset($_SESSION['username']); 
        unset($_SESSION['jabatan']);
        $_SESSION["success-logout"] = 'Berhasil Mengakhiri Sesi Anda';
        header("location: page-login.php");
        exit;
    } else {
        unset($_SESSION['submit']); 
        unset($_SESSION['username']); 
        unset($_SESSION['jabatan']);
        $_SESSION["success-logout"] = 'Berhasil Mengakhiri Sesi Anda';
        header("location: page-login.php");
        exit;
    }
} else {
    unset($_SESSION['submit']); 
    unset($_SESSION['username']);
    unset($_SESSION['jabatan']);
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("location: page-login.php");
    exit;
}
?>