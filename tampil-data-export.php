<?php
session_start();
require 'config.php';
$cek_username = $_SESSION["username"];
$check_identitas = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$cek_username'");
$data_identitas = mysqli_fetch_assoc($check_identitas);
$identitas_jabatan = $data_identitas['jabatan'];
$cek_jabatan = $_SESSION['jabatan'];
if($cek_jabatan == "admin" AND $identitas_jabatan == "admin" OR $cek_jabatan == "supervisor" AND $identitas_jabatan == "supervisor" OR $cek_jabatan == "petugas" AND $identitas_jabatan == "petugas"){
    $page = "import"; 
    include 'header.php';

        if (isset($_POST['save'])) {
            $post_idexport = $_POST['idexport'];
            $post_id_barang = $_POST['id_barang'];
            $post_id_petugas = $_POST['id_petugas'];
            $post_penerima = $_POST['penerima'];
            $post_quantity = $_POST['quantity'];
            $post_tgl_keluar = $_POST['tgl_keluar'];
            $post_jam_keluar = $_POST['jam_keluar'];

            // Melihat apakah id import sudah terdaftar di database
            $check_export = mysqli_query($conn, "SELECT * FROM tb_export WHERE id_barang = '$post_id_barang' AND tgl_keluar = '$post_tgl_keluar' AND jam_keluar = '$post_jam_keluar'");
            $data_export = mysqli_fetch_assoc($check_export);
            // Melihat apakah stok barang cukup dari kuantitas untuk di export
            $check_barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = '$post_id_barang'");
            $data_barang = mysqli_fetch_assoc($check_barang);

            if(empty($post_idexport) || empty($post_id_barang) || empty($post_id_petugas) || empty($post_penerima) || empty($post_quantity) || empty($post_tgl_keluar) || empty($post_jam_keluar)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_export) > 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data Export sudah terdaftar sebelumnya.<script>swal("Gagal!", "Data Export sudah terdaftar sebelumnya!", "error");</script>';
            } elseif ($data_barang['stok'] < $post_quantity) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Stok barang tidak cukup untuk di export.<script>swal("Gagal!", "Stok barang tidak cukup untuk di export!", "error");</script>';
            } else {
                $insert = mysqli_query($conn, "INSERT INTO tb_export VALUES('$post_idexport','$post_id_barang','$post_id_petugas','$post_penerima','$post_quantity','$post_tgl_keluar','$post_jam_keluar')");
                $insert = mysqli_query($conn, "UPDATE tb_barang SET stok = stok - $post_quantity WHERE id_barang = '$post_id_barang'");
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
        $getidexport = "OUT".$random_number."";
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Export</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Data Export</li>
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
                                        <strong class="card-title">Tambah Data Export</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form class="form-horizontal" role="form" method="POST">
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">ID Export</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="idexport" placeholder="Masukkan id export" value="<?php echo $getidexport; ?>" class="form-control" autocomplete="off" readonly>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Nama Barang</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <select data-placeholder="Pilih barang..." name="id_barang" class="standardSelect" tabindex="1" required>
                                                            <option value=""></option>
                                                            <?php
                                                                $check_list_barang = mysqli_query($conn, "SELECT id_barang, nama_barang FROM tb_barang WHERE stok > 0 ORDER BY nama_barang");
                                                                while($data_list_barang = mysqli_fetch_assoc($check_list_barang)) {
                                                            ?>
                                                            <option value="<?php echo $data_list_barang['id_barang']; ?>"><?php echo $data_list_barang['nama_barang']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Penerima barang</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="penerima" placeholder="Masukkan penerima barang" class="form-control" autocomplete="off" required>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Petugas</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <select name="id_petugas" id="id_petugas" class="form-control" autocomplete="off" required>
                                                            <option selected="true" style="display:none;">Pilih salah satu</option>
                                                            <?php
                                                                $check_list_petugas = mysqli_query($conn, "SELECT id_petugas, nama FROM tb_petugas ORDER BY nama");
                                                                while($data_list_petugas = mysqli_fetch_assoc($check_list_petugas)) {
                                                            ?>
                                                            <option value="<?php echo $data_list_petugas['id_petugas']; ?>"><?php echo $data_list_petugas['nama']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Kuantitas Barang</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <p class="form-control-static">
                                                        <input type="number" id="text-input" name="quantity" placeholder="Masukkan kuantitas barang" class="form-control" autocomplete="off" required>
                                                    </p>
                                                </div>
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Tgl Export</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <p class="form-control-static">
                                                        <input type="date" id="text-input" name="tgl_keluar" placeholder="Masukkan tanggal export" value="<?php echo date("Y-m-d"); ?>" class="form-control" autocomplete="off" readonly>
                                                    </p>
                                                </div>
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Waktu Export</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <p class="form-control-static">
                                                        <input type="time" id="text-input" name="jam_keluar" placeholder="Masukkan waktu export" value="<?php echo date("H:i:s"); ?>" class="form-control" autocomplete="off" readonly>
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
                        <form action="cetak-export-all.php" method="POST">
                            <button class="btn btn-primary btn-sm col-lg-12" type="submit" name="cetak-export"><i class="fa fa-print"></i> Cetak laporan seluruh data export</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Export</strong>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Penerima</th>
                                        <th>Petugas</th>
                                        <th>Kuantitas</th>
                                        <th>Tgl Export</th>
                                        <th>Waktu Export</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $check_data_master = mysqli_query($conn, "SELECT * FROM tb_export ORDER BY tgl_keluar ASC");
                                        $no = 1;
                                        while($data_master = mysqli_fetch_assoc($check_data_master)) {
                                            $id_barang = $data_master['id_barang'];
                                            $id_petugas = $data_master['id_petugas'];
                                            $check_barang = mysqli_query($conn, "SELECT nama_barang FROM tb_barang WHERE id_barang = '$id_barang'");
                                            $data_barang = mysqli_fetch_assoc($check_barang);

                                            $check_petugas = mysqli_query($conn, "SELECT nama FROM tb_petugas WHERE id_petugas = '$id_petugas'");
                                            $data_petugas = mysqli_fetch_assoc($check_petugas);
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_barang['nama_barang']; ?></td>
                                        <td><?php echo $data_master['penerima']; ?></td>
                                        <td><?php echo $data_petugas['nama']; ?></td>
                                        <td><?php echo $data_master['quantity']; ?></td>
                                        <td><?php echo format_datetime_to_date($data_master['tgl_keluar']); ?></td>
                                        <td><?php echo $data_master['jam_keluar']; ?></td>
                                        <td class="text-center">
                                            <?php if($jabatan == "admin" AND $identitas_jabatan_pengunjung == "admin"){ ?>
                                                <a href="<?php echo $base_link; ?>edit-data-export.php?data=<?php echo $data_master['id_export']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="delete-data-export.php?data=<?php echo $data_master['id_export']; ?>" class="btn btn-sm btn-danger alert_notif"><i class="fa fa-trash"></i></a>
                                            <form action="cetak-export.php" method="POST">
                                                <input type="hidden" name="id_export" value="<?php echo $data_master['id_export']; ?>">
                                                <input type="hidden" name="nama_barang" value="<?php echo $data_barang['nama_barang']; ?>">
                                                <input type="hidden" name="penerima" value="<?php echo $data_master['penerima']; ?>">
                                                <input type="hidden" name="nama_petugas" value="<?php echo $data_petugas['nama']; ?>">
                                                <button class="btn btn-primary btn-sm" type="submit" name="cetak-export"><i class="fa fa-print"></i></button>
                                            </form>
                                            <?php
                                            } else {
                                            ?>
                                            <form action="cetak-export.php" method="POST">
                                                <input type="hidden" name="id_export" value="<?php echo $data_master['id_export']; ?>">
                                                <input type="hidden" name="nama_barang" value="<?php echo $data_barang['nama_barang']; ?>">
                                                <input type="hidden" name="penerima" value="<?php echo $data_master['penerima']; ?>">
                                                <input type="hidden" name="nama_petugas" value="<?php echo $data_petugas['nama']; ?>">
                                                <button class="btn btn-primary btn-sm" type="submit" name="cetak-export"><i class="fa fa-print"></i></button>
                                            </form>
                                            <?php
                                            }
                                            ?>
                                        </td>
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
        <script type="text/javascript">
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