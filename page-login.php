<?php
session_start();
error_reporting(0);
require 'config.php'; 
if ($_SESSION['submit'] == TRUE) {
    header("location: index.php"); 
}

if (isset($_POST['submit'])) {
    $post_username = $_POST['username'];
    $post_password = $_POST['password'];

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
  
    $check_user = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '$post_username'");
    $data_user = mysqli_fetch_assoc($check_user);
    if(empty($post_username) || empty($post_password)) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
    } elseif (mysqli_num_rows($check_user) == 0) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Username tidak ditemukan.<script>swal("Gagal!", "Username tidak ditemukan!", "error");</script>';
    } elseif (md5($post_password) <> $data_user['password']) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Password salah.<script>swal("Gagal!", "Password salah!", "error");</script>';
    } else {
      $msg_type = "success";
      $msg_content = '<b>Berhasil:</b> Login berhasil.<script>swal("Berhasil!", "Login berhasil!", "success");</script>';
      $_SESSION["submit"] = true;
      $_SESSION["username"] = $data_user['username'];
      $_SESSION['jabatan'] = $data_user['jabatan'];
      $insert = mysqli_query($conn, "INSERT INTO tb_login_history VALUES ('', '$post_username', '$filter_operating_system', '$devicename', '$date $time', 'online')");
    }
  }
  
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $base_name; ?></title>
    <meta name="description" content="<?php echo $base_name; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container" style="padding-top: 10%;">
            <div class="login-content">
                <?php 
                  if ($msg_type == "success") {
                  ?>
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <?php echo $msg_content; ?>
                  </div>
                  <script type="text/javascript">
                    var waktu = 2;
                    setInterval(function() {
                      waktu--;
                      if(waktu < 0) {
                        window.location = 'index.php';
                      } else {
                        document.getElementById("waktu").innerHTML = waktu;
                      }
                    }, 1000);
                  </script>
                  <?php } else if($msg_type == "error"){ ?>
                    <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                      <?php echo $msg_content; ?>
                    </div>
                  <?php } ?>
                <div class="card">
                  <div class="card-header card-title">
                    <strong>Login</strong>
                  </div>
                  <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
                        </div>
                        <div class="row form-group form-actions">
                          <div class="col col-lg-12">
                            <button type="reset" class="btn btn-danger btn-md float-left">Batal</button>
                            <button type="submit" name="submit" class="btn btn-success btn-md float-right">Sign In</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    
        <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
        <?php if(@$_SESSION['success-logout']){ ?>
            <script>
                Swal.fire({             
                    icon: 'success',                   
                    title: 'Berhasil',    
                    text: 'Berhasil Mengakhiri Sesi Anda',                        
                    timer: 3000,                                
                    showConfirmButton: false
                })
            </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['success-logout']); } ?>
    
    
        <!-- di bawah ini adalah script untuk konfirmasi hapus data dengan sweet alert  -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
</body>

</html>
