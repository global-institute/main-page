<?php
session_start();
require 'config.php'; 
include 'header.php';
$check_data = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '$username_data'");
$show_data = mysqli_fetch_assoc($check_data);

$check_data_login = mysqli_query($conn, "SELECT * FROM tb_login_history WHERE username = '$username_data' ORDER BY id DESC LIMIT 1");
$show_data_login = mysqli_fetch_assoc($check_data_login); 
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="active">My Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">My Profile</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">My Profile</h3>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="username" class="control-label mb-1">Username</label>
                                        <input id="username" type="text" class="form-control" value="<?php echo $show_data['username']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan" class="control-label mb-1">Jabatan</label>
                                        <input id="jabatan" type="text" class="form-control" value="<?php echo $show_data['jabatan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="device" class="control-label mb-1">Perangkat</label>
                                        <input id="device" type="text" class="form-control" value="<?php echo $show_data_login['device_name']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!--/.col-->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">History Activities</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Perangkat</th>
                                        <th>Tanggal</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $check_login_history = mysqli_query($conn, "SELECT * FROM tb_login_history WHERE username = '$username_data' ORDER BY id DESC");
                                        $no = 1;
                                        while($data_login_history = mysqli_fetch_assoc($check_login_history)) {
                                            if($data_login_history['status']== "online"){
                                                $yangdilakukan = "Login";
                                                $materiallogin = "sign-in";
                                                $labellogin = "success";
                                            } else {
                                                $yangdilakukan = "Logout";
                                                $materiallogin = "sign-out";
                                                $labellogin = "danger";
                                            }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data_login_history['device_name']; ?></td>
                                        <td><?php echo format_datetime($data_login_history['datetime']);?></td>
                                        <td><i class="fa fa-<?php echo $materiallogin; ?>"></i></td>
                                    </tr>
                                    <?php
                                        $no++;
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
</body>
