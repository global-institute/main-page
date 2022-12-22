<?php
session_start();
require 'config.php'; 
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin"){
    $get_data = $_GET['data'];
    $check_data = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$get_data'");
    $show_data = mysqli_fetch_assoc($check_data);
    if(mysqli_num_rows($check_data) == 0){
        header("location: ".$base_link."page-logout.php");
    } else {
        $page = "pengguna";
        include 'header.php';

        if (isset($_POST['save'])) {
            $post_username = $_POST['username'];
            $post_jabatan = $_POST['jabatan'];

            $check_user = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '$post_username'");
            $data_user = mysqli_fetch_assoc($check_user);

            if(empty($post_username) || empty($post_jabatan)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_user) == 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Username tidak ditemukan.<script>swal("Gagal!", "Username tidak ditemukan!", "error");</script>';
            } else {
                $update = mysqli_query($conn, "UPDATE tb_pengguna SET jabatan = '$post_jabatan' WHERE username = '$post_username'");
                if($update == TRUE){
                    $msg_type = "success";
                    $msg_content = '<b>Berhasil:</b> Data berhasil diubah.<script>swal("Berhasil!", "Data berhasil diubah!", "success");</script>';
                } else {
                    $msg_type = "error";
                    $msg_content = '<b>Gagal:</b> Gagal mengubah data.<script>swal("Gagal!", "Gagal mengubah data!", "error");</script>';
                }
            }
        }
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Data Pengguna</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Edit Data Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                    if ($msg_type == "success") {
                    ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $msg_content; ?>
                        <meta http-equiv="refresh" content="3">
                    </div>
                    <?php } else if($msg_type == "error"){ ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $msg_content; ?>
                    </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-header">Edit Data Pengguna</div>
                        <div class="card-body card-block">
                            <form method="post">
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Username</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="text" id="text-input" name="username" value="<?php echo $show_data['username']; ?>" placeholder="username" class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Jabatan</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option value="<?php echo $show_data['jabatan']; ?>"><?php echo $show_data['jabatan']; ?> (saat ini)</option>
                                            <?php
                                            if($show_data['jabatan'] == "admin"){
                                            ?>
                                            <option value="supervisor">supervisor</option>
                                            <option value="petugas">petugas</option>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($show_data['jabatan'] == "supervisor"){
                                            ?>
                                            <option value="admin">admin</option>
                                            <option value="petugas">petugas</option>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($show_data['jabatan'] == "petugas"){
                                            ?>
                                            <option value="admin">admin</option>
                                            <option value="supervisor">supervisor</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <a href="<?php echo $base_link; ?>tampil-data-pengguna.php" class="btn btn-danger btn-sm float-left">Batal</a>
                                    <button type="submit" name="save" class="btn btn-success btn-sm float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
    }
} else {
    header("location: ".$base_link."page-logout.php");
}
?>
