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
            $post_idimport = $_POST['idimport'];
            $post_id_barang = $_POST['id_barang'];
            $post_id_petugas = $_POST['id_petugas'];
            $post_id_supplier = $_POST['id_supplier'];
            $post_quantity = $_POST['quantity'];
            $post_tgl_masuk = $_POST['tgl_masuk'];
            $post_jam_masuk = $_POST['jam_masuk'];

            // Melihat apakah id import sudah terdaftar di database
            $check_import = mysqli_query($conn, "SELECT * FROM tb_import WHERE id_barang = '$post_id_barang' AND tgl_masuk = '$post_tgl_masuk' AND jam_masuk = '$post_jam_masuk'");
            $data_import = mysqli_fetch_assoc($check_import);

            if(empty($post_idimport) || empty($post_id_barang) || empty($post_id_petugas) || empty($post_id_supplier) || empty($post_quantity) || empty($post_tgl_masuk) || empty($post_jam_masuk)) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Mohon mengisi semua input.<script>swal("Gagal!", "Mohon mengisi semua input!", "error");</script>';
            } elseif (mysqli_num_rows($check_import) > 0) {
                $msg_type = "error";
                $msg_content = '<b>Gagal:</b> Data Import sudah terdaftar sebelumnya.<script>swal("Gagal!", "Data Import sudah terdaftar sebelumnya!", "error");</script>';
            } else {
                $insert = mysqli_query($conn, "INSERT INTO tb_import VALUES('$post_idimport','$post_id_barang','$post_id_petugas','$post_id_supplier','$post_quantity','$post_tgl_masuk','$post_jam_masuk')");
                $insert = mysqli_query($conn, "UPDATE tb_barang SET stok = stok + $post_quantity WHERE id_barang = '$post_id_barang'");
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
        $getidimport = "IN".$random_number."";
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Import</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">Data Import</li>
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
                                        <strong class="card-title">Tambah Data Import</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <form class="form-horizontal" role="form" method="POST">
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">ID Import</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <input type="text" id="text-input" name="idimport" placeholder="Masukkan id import" value="<?php echo $getidimport; ?>" class="form-control" autocomplete="off" readonly>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Nama Barang</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <select data-placeholder="Pilih barang..." name="id_barang" id="getidbarang" class="standardSelect" tabindex="1" required>
                                                            <option value=""></option>
                                                            <?php
                                                                $check_list_barang = mysqli_query($conn, "SELECT id_barang, nama_barang FROM tb_barang ORDER BY nama_barang");
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
                                                    <label class="form-control-label">Supplier</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static">
                                                        <select name="id_supplier" id="show_supplier" class="form-control">
                                                            <option value="">Pilih nama barang</option>
                                                        </select>
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
                                                    <label class="form-control-label">Tgl Import</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <p class="form-control-static">
                                                        <input type="date" id="text-input" name="tgl_masuk" placeholder="Masukkan tanggal import" value="<?php echo date("Y-m-d"); ?>" class="form-control" autocomplete="off" readonly>
                                                    </p>
                                                </div>
                                                <div class="col col-lg-2">
                                                    <label class="form-control-label">Waktu Import</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <p class="form-control-static">
                                                        <input type="time" id="text-input" name="jam_masuk" placeholder="Masukkan waktu import" value="<?php echo date("H:i:s"); ?>" class="form-control" autocomplete="off" readonly>
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
                        <form action="cetak-import-all.php" method="POST">
                            <button class="btn btn-primary btn-sm col-lg-12" type="submit" name="cetak-import"><i class="fa fa-print"></i> Cetak laporan seluruh data import</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Import</strong>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Supplier</th>
                                        <th>Petugas</th>
                                        <th>Kuantitas</th>
                                        <th>Tgl Import</th>
                                        <th>Waktu Import</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $check_data_master = mysqli_query($conn, "SELECT * FROM tb_import ORDER BY tgl_masuk ASC");
                                        $no = 1;
                                        while($data_master = mysqli_fetch_assoc($check_data_master)) {
                                            $id_barang = $data_master['id_barang'];
                                            $id_petugas = $data_master['id_petugas'];
                                            $id_supplier = $data_master['id_supplier'];
                                            $check_barang = mysqli_query($conn, "SELECT nama_barang FROM tb_barang WHERE id_barang = '$id_barang'");
                                            $data_barang = mysqli_fetch_assoc($check_barang);

                                            $check_petugas = mysqli_query($conn, "SELECT nama FROM tb_petugas WHERE id_petugas = '$id_petugas'");
                                            $data_petugas = mysqli_fetch_assoc($check_petugas);

                                            $check_supplier = mysqli_query($conn, "SELECT nama_supplier FROM tb_supplier WHERE id_supplier = '$id_supplier'");
                                            $data_supplier = mysqli_fetch_assoc($check_supplier);
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_barang['nama_barang']; ?></td>
                                        <td><?php echo $data_supplier['nama_supplier']; ?></td>
                                        <td><?php echo $data_petugas['nama']; ?></td>
                                        <td><?php echo $data_master['quantity']; ?></td>
                                        <td><?php echo format_datetime_to_date($data_master['tgl_masuk']); ?></td>
                                        <td><?php echo $data_master['jam_masuk']; ?></td>
                                        <td class="text-center">
                                            <?php if($jabatan == "admin" AND $identitas_jabatan_pengunjung == "admin"){ ?>
                                                <a href="<?php echo $base_link; ?>edit-data-import.php?data=<?php echo $data_master['id_import']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                                <a href="delete-data-import.php?data=<?php echo $data_master['id_import']; ?>" class="btn btn-sm btn-danger alert_notif"><i class="fa fa-trash"></i></a>
                                            <form action="cetak-import.php" method="POST">
                                                <input type="hidden" name="id_import" value="<?php echo $data_master['id_import']; ?>">
                                                <input type="hidden" name="nama_barang" value="<?php echo $data_barang['nama_barang']; ?>">
                                                <input type="hidden" name="nama_supplier" value="<?php echo $data_supplier['nama_supplier']; ?>">
                                                <input type="hidden" name="nama_petugas" value="<?php echo $data_petugas['nama']; ?>">
                                                <button class="btn btn-primary btn-sm" type="submit" name="cetak-import"><i class="fa fa-print"></i></button>
                                            </form>
                                            <?php 
                                            } else {
                                            ?>
                                            <form action="cetak-import.php" method="POST">
                                                <input type="hidden" name="id_import" value="<?php echo $data_master['id_import']; ?>">
                                                <input type="hidden" name="nama_barang" value="<?php echo $data_barang['nama_barang']; ?>">
                                                <input type="hidden" name="nama_supplier" value="<?php echo $data_supplier['nama_supplier']; ?>">
                                                <input type="hidden" name="nama_petugas" value="<?php echo $data_petugas['nama']; ?>">
                                                <button class="btn btn-primary btn-sm" type="submit" name="cetak-import"><i class="fa fa-print"></i></button>
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
            $(document).ready(function() {
                $("#getidbarang").change(function() {
                    var getidbarang = $("#getidbarang").val();
                    $.ajax({
                        url: '<?php echo $base_link; ?>ajax_barang.php',
                        data: 'getidbarang=' + getidbarang,
                        type: 'POST',
                        dataType: 'html',
                        success: function(msg) {
                            $("#show_supplier").html(msg);
                        }
                    });
                });
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