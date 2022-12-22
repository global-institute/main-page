<?php
session_start();
require 'config.php';
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin" OR $cek_jabatan == "supervisor" AND $identitas_jabatan == "supervisor" OR $cek_jabatan == "petugas" AND $identitas_jabatan == "petugas"){
    $page = "supplier"; 
    include 'header.php';

        if (isset($_POST['save'])) {
            $post_idsupplier = $_POST['idsupplier'];
            $post_nama_supplier = $_POST['nama_supplier'];
            $post_nama_brand = $_POST['nama_brand'];
            $post_alamat = $_POST['alamat'];
            $post_no_telephone = $_POST['no_telephone'];

            $check_supplier = mysqli_query($conn, "SELECT * FROM tb_supplier WHERE nama_supplier = '$post_nama_supplier' OR id_supplier = '$post_idsupplier'");
            $data_supplier = mysqli_fetch_assoc($check_supplier);

            if(empty($post_idsupplier) || empty($post_nama_supplier) || empty($post_nama_brand) || empty($post_no_telephone) || empty($post_alamat)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_supplier) > 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data Supplier sudah terdaftar sebelumnya.<script>swal("Gagal!", "Data Supplier sudah terdaftar sebelumnya!", "error");</script>';
            } else {
                $insert = mysqli_query($conn, "INSERT INTO tb_supplier VALUES('$post_idsupplier','$post_nama_supplier','$post_nama_brand','$post_alamat','$post_no_telephone')");
                if($insert == TRUE){
                    $msg_type = "success";
                    $msg_content = '<b>Berhasil:</b> Data berhasil disimpan.<script>swal("Berhasil!", "Data berhasil disimpan!", "success");</script>';
                } else {
                    $msg_type = "error";
                    $msg_content = '<b>Gagal:</b> Gagal menyimpan data.<script>swal("Gagal!", "Gagal menyimpan data!", "error");</script>';
                }
            }
        }

        $random_number = rand(00000,99999);
        $getidsupplier = "SUP".$random_number."";
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Supplier</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Data Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php session_start(); ?>
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
                    <?php } else if($msg_type == "error"){ ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <?php echo $msg_content; ?>
                    </div>
                    <?php } ?>
                    <div class="card">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <strong class="card-title">Tambah Data Supplier</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form method="post">
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">ID Supplier</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="idsupplier" placeholder="Masukkan id supplier" value="<?php echo $getidsupplier; ?>" class="form-control" autocomplete="off" readonly>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Nama Supplier</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="nama_supplier" placeholder="Masukkan nama supplier" class="form-control" autocomplete="off" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Nama Brand</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="nama_brand" placeholder="Masukkan nama brand" class="form-control" autocomplete="off" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Alamat</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <textarea id="text-input" name="alamat" placeholder="Masukkan alamat" class="form-control" autocomplete="off" required></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Nomor Telepon</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="number" id="text-input" name="no_telephone" placeholder="Masukkan nomor telepon" class="form-control" autocomplete="off" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group form-actions">
                                                <div class="col col-lg-12">
                                                    <button type="reset" class="btn btn-danger btn-md float-left">Batal</button>
                                                    <button type="submit" name="save" class="btn btn-success btn-md float-right">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Supplier</strong>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Nama Brand</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $check_data_master = mysqli_query($conn, "SELECT * FROM tb_supplier ORDER BY nama_supplier");
                                        $no = 1;
                                        while($data_master = mysqli_fetch_assoc($check_data_master)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_master['nama_supplier']; ?></td>
                                        <td><?php echo $data_master['nama_brand']; ?></td>
                                        <td><?php echo $data_master['alamat']; ?></td>
                                        <td><?php echo $data_master['no_telephone']; ?></td>
                                        <td class="text-center"><a href="<?php echo $base_link; ?>edit-data-supplier.php?data=<?php echo $data_master['id_supplier']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
        <?php if(@$_SESSION['success-delete']){ ?>
            <script>
                Swal.fire({            
                    icon: 'success',                   
                    title: 'Berhasil!',    
                    text: 'Data berhasil dihapus',                        
                    timer: 3000,                                
                    showConfirmButton: false
                })
            </script>
        <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['success-delete']); } ?>
    
    
        <!-- di bawah ini adalah script untuk konfirmasi hapus data dengan sweet alert  -->
        <script>
            $('.alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin ingin menghapus data?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"
                
                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            });
        </script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo $base_link; ?>assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<?php
    } else {
        header("location: ".$base_link."page-logout.php");
    }
?>