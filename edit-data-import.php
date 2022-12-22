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
    $check_data = mysqli_query($conn, "SELECT * FROM tb_import WHERE id_import = '$get_data'");
    $show_data = mysqli_fetch_assoc($check_data);
    if(mysqli_num_rows($check_data) == 0){
        header("location: ".$base_link."page-logout.php");
    } else {
        $page = "import";
        include 'header.php';
        $id_barang = $show_data['id_barang'];
        $check_barang = mysqli_query($conn, "SELECT nama_barang FROM tb_barang WHERE id_barang = '$id_barang'");
        $data_barang = mysqli_fetch_assoc($check_barang);

        if (isset($_POST['save'])) {
            $post_quantity_before = $_POST['quantity_before'];
            $post_quantity_after = $_POST['quantity_after']; 

            $check_import = mysqli_query($conn, "SELECT * FROM tb_import WHERE id_import = '$get_data'");
            $data_import = mysqli_fetch_assoc($check_import);

            if(empty($post_quantity_before) || empty($post_quantity_after)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_import) == 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data tidak ditemukan.<script>swal("Gagal!", "Data tidak ditemukan!", "error");</script>';
            } else {
                if($post_quantity_after > $post_quantity_before){
                    $count_quantity = $post_quantity_after - $post_quantity_before;
                    $update = mysqli_query($conn, "UPDATE tb_barang SET stok = stok+$count_quantity WHERE id_barang = '$id_barang'");
                    $update = mysqli_query($conn, "UPDATE tb_import SET quantity = '$post_quantity_after' WHERE id_import = '$get_data'");
                } elseif($post_quantity_before > $post_quantity_after){
                    $count_quantity = $post_quantity_before - $post_quantity_after;
                    $update = mysqli_query($conn, "UPDATE tb_barang SET stok = stok-$count_quantity WHERE id_barang = '$id_barang'");
                    $update = mysqli_query($conn, "UPDATE tb_import SET quantity = '$post_quantity_after' WHERE id_import = '$get_data'");
                }
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
                    <h1>Edit Data Import</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Edit Data Import</li>
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
                        <div class="card-header">Edit Data Import</div>
                        <div class="card-body card-block">
                            <form method="post">
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Nama Barang</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="text" id="text-input" value="<?php echo $data_barang['nama_barang']; ?>" placeholder="nama barang" class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Kuantitas awal</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="number" id="text-input" name="quantity_before" value="<?php echo $show_data['quantity']; ?>" placeholder="harga satuan" class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Kuantitas baru</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="number" id="text-input" name="quantity_after" placeholder="kuantitas baru" class="form-control" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <a href="<?php echo $base_link; ?>tampil-data-import.php" class="btn btn-danger btn-sm float-left">Batal</a>
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
