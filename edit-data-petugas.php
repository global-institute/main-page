<?php
session_start();
require 'config.php'; 
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin" OR $cek_jabatan == "supervisor" AND $identitas_jabatan == "supervisor"){
    $get_data = $_GET['data'];
    $check_data = mysqli_query($conn, "SELECT * FROM tb_petugas WHERE id_petugas = '$get_data'");
    $show_data = mysqli_fetch_assoc($check_data);
    if(mysqli_num_rows($check_data) == 0){
        header("location: ".$base_link."page-logout.php");
    } else {
        $page = "petugas";
        include 'header.php';

        if (isset($_POST['save'])) {
            $post_nama = $_POST['nama'];
            $post_jk = $_POST['jk'];
            $post_telepon = $_POST['telepon'];
            $post_alamat = $_POST['alamat'];

            $check_petugas = mysqli_query($conn, "SELECT * FROM tb_petugas WHERE id_petugas = '$get_data'");
            $data_petugas = mysqli_fetch_assoc($check_petugas);

            if(empty($post_nama) || empty($post_jk) || empty($post_telepon) || empty($post_alamat)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_petugas) == 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data tidak ditemukan.<script>swal("Gagal!", "Data tidak ditemukan!", "error");</script>';
            } else {
                $update = mysqli_query($conn, "UPDATE tb_petugas SET nama = '$post_nama', jk = '$post_jk', telepon = '$post_telepon', alamat = '$post_alamat' WHERE id_petugas = '$get_data'");
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
                    <h1>Edit Data Petugas</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Edit Data Petugas</li>
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
                        <div class="card-header">Edit Data Petugas</div>
                        <div class="card-body card-block">
                            <form method="post">
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Nama</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="text" id="text-input" name="nama" value="<?php echo $show_data['nama']; ?>" placeholder="nama" class="form-control" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <div class="form-check col-lg-3">
                                            <input class="form-check-input" type="radio" name="jk" id="Laki-Laki" value="Laki-Laki" <?php if ($show_data['jk'] == "Laki-Laki") { ?> checked <?php } ?>>
                                            <label class="form-check-label" for="Laki-Laki">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check col-lg-3">
                                            <input class="form-check-input" type="radio" name="jk" id="Perempuan" value="Perempuan" <?php if ($show_data['jk'] == "Perempuan") { ?> checked <?php } ?>>
                                            <label class="form-check-label" for="Perempuan">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Nomor telepon</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="number" id="text-input" name="telepon" value="<?php echo $show_data['telepon']; ?>" placeholder="nomor telepon" class="form-control" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-lg-2">
                                        <label class="form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <p class="form-control-static">
                                            <input type="text" id="text-input" name="alamat" value="<?php echo $show_data['alamat']; ?>" placeholder="alamat" class="form-control" required>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <a href="<?php echo $base_link; ?>tampil-data-petugas.php" class="btn btn-danger btn-sm float-left">Batal</a>
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
