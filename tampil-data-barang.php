<?php
session_start();
require 'config.php';
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin" OR $cek_jabatan == "supervisor" AND $identitas_jabatan == "supervisor" OR $cek_jabatan == "petugas" AND $identitas_jabatan == "petugas"){
    $page = "barang"; 
    include 'header.php';

        if (isset($_POST['save'])) {
            $post_idbarang = $_POST['idbarang'];
            $post_id_jenis = $_POST['id_jenis'];
            $post_nama_brand = $_POST['nama_brand'];
            $post_tipe_barang = $_POST['tipe_barang'];
            $post_satuan_barang = $_POST['satuan_barang'];
            $post_stok = 0;

            $check_from_jenis = mysqli_query($conn, "SELECT nama_jenis FROM tb_jenis WHERE id_jenis = '$post_id_jenis'");
            $data_from_jenis = mysqli_fetch_assoc($check_from_jenis);
            $nama_jenis = $data_from_jenis['nama_jenis'];
            // Membuat nama barang dari nama jenis + nama brand + tipe barang
            $post_nama_barang = "".$nama_jenis." ".$post_nama_brand." ".$post_tipe_barang."";
            // Melihat apakah nama barang dan tipe barang sudah terdaftar di database
            $check_barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE nama_barang = '$post_nama_barang' AND tipe_barang = '$post_tipe_barang'");
            $data_barang = mysqli_fetch_assoc($check_barang);

            if(empty($post_idbarang) || empty($post_id_jenis) || empty($post_nama_brand) || empty($post_tipe_barang) || empty($post_satuan_barang)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_barang) > 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data Barang sudah terdaftar sebelumnya.<script>swal("Gagal!", "Data Barang sudah terdaftar sebelumnya!", "error");</script>';
            } else {
                $insert = mysqli_query($conn, "INSERT INTO tb_barang VALUES('$post_idbarang','$post_nama_barang','$post_id_jenis','$post_nama_brand','$post_tipe_barang','$post_satuan_barang','$post_stok')");
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
        $getidbarang = "BRG".$random_number."";
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Barang</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Data Barang</li>
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
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                        <?php echo $msg_content; ?>
                    </div>
                    <?php } else if($msg_type == "error"){ ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                        <?php echo $msg_content; ?>
                    </div>
                    <?php } ?>
                    <div class="card">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <strong class="card-title">Tambah Data Barang</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form method="post">
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">ID Barang</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="idbarang" placeholder="Masukkan id barang" value="<?php echo $getidbarang; ?>" class="form-control" autocomplete="off" readonly>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Jenis</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <select data-placeholder="Pilih jenis..." name="id_jenis" class="standardSelect" tabindex="1" required>
                                                            <option value=""></option>
                                                            <?php
                                                                $check_list_jenis = mysqli_query($conn, "SELECT * FROM tb_jenis ORDER BY nama_jenis");
                                                                $no = 1;
                                                                while($data_list_jenis = mysqli_fetch_assoc($check_list_jenis)) {
                                                            ?>
                                                            <option value="<?php echo $data_list_jenis['id_jenis']; ?>"><?php echo $data_list_jenis['nama_jenis']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Brand</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <select data-placeholder="Pilih brand..." name="nama_brand" class="standardSelect" tabindex="2" required>
                                                            <option value=""></option>
                                                            <?php
                                                                $check_list_brand = mysqli_query($conn, "SELECT nama_brand FROM tb_supplier ORDER BY nama_brand");
                                                                $no = 1;
                                                                while($data_list_brand = mysqli_fetch_assoc($check_list_brand)) {
                                                            ?>
                                                            <option value="<?php echo $data_list_brand['nama_brand']; ?>"><?php echo $data_list_brand['nama_brand']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Tipe Barang</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="tipe_barang" placeholder="Masukkan tipe barang" class="form-control" autocomplete="off" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Satuan Barang</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <p class="form-control-static">
                                                        <select name="satuan_barang" id="satuan_barang" class="form-control" autocomplete="off" required>
                                                            <option value="">Pilih salah satu</option>
                                                            <option value="Unit">Unit</option>
                                                            <option value="Box">Box</option>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group form-actions">
                                                <div class="col col-lg-12">
                                                    <button type="reset" class="btn btn-danger btn-md float-left">Batal</button>
                                                    <button type="submit" name="save" class="btn btn-success btn-md float-right">Simpan Permanent</button>
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
                            <strong class="card-title">Data Barang</strong>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis</th>
                                        <th>Brand</th>
                                        <th>Tipe</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $check_data_master = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY nama_barang");
                                        $no = 1;
                                        while($data_master = mysqli_fetch_assoc($check_data_master)) {
                                            $id_jenis = $data_master['id_jenis'];
                                            $check_jenis = mysqli_query($conn, "SELECT nama_jenis FROM tb_jenis WHERE id_jenis = '$id_jenis'");
                                            $data_jenis = mysqli_fetch_assoc($check_jenis);
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_master['nama_barang']; ?></td>
                                        <td><?php echo $data_jenis['nama_jenis']; ?></td>
                                        <td><?php echo $data_master['nama_brand']; ?></td>
                                        <td><?php echo $data_master['tipe_barang']; ?></td>
                                        <td><?php echo $data_master['satuan_barang']; ?></td>
                                        <td><?php echo number_format($data_master['stok']); ?></td>
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
            jQuery(document).ready(function() {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 1,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        </script>
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/chosen/chosen.min.css">
    <script src="<?php echo $base_link; ?>vendors/chosen/chosen.jquery.min.js"></script>
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