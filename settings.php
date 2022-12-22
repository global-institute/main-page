<?php
session_start();
require 'config.php'; 
include 'header.php';

if (isset($_POST['change'])) {
    $post_newpassword = $_POST['newpassword'];
    $post_oldpassword = $_POST['oldpassword'];
    $post_oldpassword2 = $_POST['oldpassword2'];
  
    $check_user = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '$username_data'");
    $data_user = mysqli_fetch_assoc($check_user);

    if(empty($post_newpassword) || empty($post_oldpassword) || empty($post_oldpassword2)) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
    } elseif (mysqli_num_rows($check_user) == 0) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Username tidak ditemukan.<script>swal("Gagal!", "Username tidak ditemukan!", "error");</script>';
    } elseif ($post_oldpassword <> $post_oldpassword2) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Password lama dan konfirmasi password lama tidak sesuai.<script>swal("Gagal!", "Password lama dan konfirmasi password lama tidak sesuai!", "error");</script>';
    } elseif (md5($post_oldpassword) <> $data_user['password']) {
      $msg_type = "error";
      $msg_content = '<b>Gagal:</b> Password salah.<script>swal("Gagal!", "Password salah!", "error");</script>';
    } else {
        $new_password = md5($post_newpassword);
        $update = mysqli_query($conn, "UPDATE tb_pengguna SET password = '$new_password' WHERE username = '$username_data'");
        if($update == TRUE){
            $msg_type = "success";
            $msg_content = '<b>Berhasil:</b> Password berhasil diubah.<script>swal("Berhasil!", "Password berhasil diubah!", "success");</script>';
        } else {
            $msg_type = "error";
            $msg_content = '<b>Gagal:</b> Gagal mengubah password.<script>swal("Gagal!", "Gagal mengubah password!", "error");</script>';
        }
    }
  }
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Setting</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Setting</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6" style="margin-left: 20%; margin-right: 20%;">
                  <?php 
                  if ($msg_type == "success") {
                  ?>
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <?php echo $msg_content; ?>
                  </div>
                  <?php } else if($msg_type == "error"){ ?>
                    <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                      <?php echo $msg_content; ?>
                    </div>
                  <?php } ?>
                    <div class="card">
                        <strong class="card-header">Change Password</strong>
                        <div class="card-body card-block">
                            <form method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input type="password" id="newpassword" name="newpassword" placeholder="Password Baru" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input type="password" id="oldpassword" name="oldpassword" placeholder="Password Lama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input type="password" id="oldpassword2" name="oldpassword2" placeholder="Konfirmasi Password Lama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" name="change" class="btn btn-success btn-md col-lg-12">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
