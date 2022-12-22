<?php
session_start();
require 'config.php'; 
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin" OR $cek_jabatan == "supervisor" AND $identitas_jabatan == "supervisor" OR $cek_jabatan == "petugas" AND $identitas_jabatan == "petugas"){
    $get_data = $_GET['data'];
    $check_data = mysqli_query($conn, "SELECT * FROM tb_supplier WHERE id_supplier = '$get_data'");
    $show_data = mysqli_fetch_assoc($check_data);
    if(mysqli_num_rows($check_data) == 0){
        header("location: ".$base_link."page-logout.php");
    } else {
        $page = "supplier";
        include 'header.php';

        if (isset($_POST['save'])) {
            $post_alamat = $_POST['alamat'];
            $post_no_telephone = $_POST['no_telephone'];

            $check_supplier = mysqli_query($conn, "SELECT * FROM tb_supplier WHERE id_supplier = '$get_data'");
            $data_supplier = mysqli_fetch_assoc($check_supplier);

            if(empty($post_alamat) || empty($post_no_telephone)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_supplier) == 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data tidak ditemukan.<script>swal("Gagal!", "Data tidak ditemukan!", "error");</script>';
            } else {
                $update = mysqli_query($conn, "UPDATE tb_supplier SET alamat = '$post_alamat', no_telephone = '$post_no_telephone' WHERE id_supplier = '$get_data'");
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
                    <h1>Edit Data Supplier</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Edit Data Supplier</li>
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
                    </div>
                    <meta http-equiv="refresh" content="3">
                    <?php } else if($msg_type == "error"){ ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $msg_content; ?>
                    </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-header">Edit Data Supplier</div>
                        <div class="card-body card-block">
                            <form method="post">
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Nomor telepon</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="number" id="text-input" name="no_telephone" value="<?php echo $show_data['no_telephone']; ?>" placeholder="nomor telepon" class="form-control" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Alamat Supplier</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <textarea id="text-input" name="alamat" placeholder="alamat" class="form-control" required><?php echo $show_data['alamat']; ?></textarea>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <a href="<?php echo $base_link; ?>tampil-data-supplier.php" class="btn btn-danger btn-sm float-left">Batal</a>
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
