<?php
session_start();
require 'config.php';
$page = "dashboard";
include 'header.php';

    $check_stok_barang = mysqli_query($conn, "SELECT SUM(stok) AS total_stok FROM tb_barang");
    $data_stok_barang = mysqli_fetch_assoc($check_stok_barang);

    $check_import = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity_import FROM tb_import");
    $data_import = mysqli_fetch_assoc($check_import);

    $check_export = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity_export FROM tb_export");
    $data_export = mysqli_fetch_assoc($check_export);

    $today = date("Y-m-d");
    $check_import_today = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity_import_today FROM tb_import WHERE tgl_masuk = '$today'");
    $data_import_today = mysqli_fetch_assoc($check_import_today);

    $check_export_today = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity_export_today FROM tb_export WHERE tgl_keluar = '$today'");
    $data_export_today = mysqli_fetch_assoc($check_export_today);
?>

<body>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-lg-6">
        <p class="text-success"><i class="fa fa-refresh fa-spin"></i> <small> Data import terbaru</small></p>
        <div class="alert alert-success">
            <div class="clearfix">
                <marquee scrollamount="6">
                    <?php
                    $marquee_import = mysqli_query($conn, "SELECT * FROM tb_import ORDER BY tgl_masuk DESC");
                    if (mysqli_num_rows($marquee_import) == 0) {
                        echo "<b>[".format_datetime(date("Y-m-d H:i:s"))."]</b> System tidak menemukan ada data import terbaru...";
                    } else {
                        while($data_marquee_import = mysqli_fetch_assoc($marquee_import)) {
                            $id_barang = $data_marquee_import['id_barang'];
                            $id_petugas = $data_marquee_import['id_petugas'];
                            $check_barang = mysqli_query($conn, "SELECT nama_barang FROM tb_barang WHERE id_barang = '$id_barang'");
                            $data_barang = mysqli_fetch_assoc($check_barang);
                            $check_petugas = mysqli_query($conn, "SELECT nama FROM tb_petugas WHERE id_petugas = '$id_petugas'");
                            $data_petugas = mysqli_fetch_assoc($check_petugas);
                            echo "<span style='margin-right: 30px;'><b>PETUGAS ".$data_petugas["nama"]."</b> berhasil import barang ".$data_barang["nama_barang"]." pada ".format_datetime_to_date($data_marquee_import["tgl_masuk"]).", ".$data_marquee_import["jam_masuk"]."</span>";
                        }
                    }
                    ?>
                </marquee>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <p class="text-danger"><i class="fa fa-refresh fa-spin"></i> <small> Data export terbaru</small></p>
        <div class="alert alert-danger">
            <div class="clearfix">
                <marquee scrollamount="6">
                    <?php
                    $marquee_export = mysqli_query($conn, "SELECT * FROM tb_export ORDER BY tgl_keluar DESC");
                    if (mysqli_num_rows($marquee_export) == 0) {
                        echo "<b>[".format_datetime(date("Y-m-d H:i:s"))."]</b> System tidak menemukan ada data export terbaru...";
                    } else {
                        while($data_marquee_export = mysqli_fetch_assoc($marquee_export)) {
                            $id_barang = $data_marquee_export['id_barang'];
                            $id_petugas = $data_marquee_export['id_petugas'];
                            $check_barang = mysqli_query($conn, "SELECT nama_barang FROM tb_barang WHERE id_barang = '$id_barang'");
                            $data_barang = mysqli_fetch_assoc($check_barang);
                            $check_petugas = mysqli_query($conn, "SELECT nama FROM tb_petugas WHERE id_petugas = '$id_petugas'");
                            $data_petugas = mysqli_fetch_assoc($check_petugas);
                            echo "<span style='margin-right: 30px;'><b>PETUGAS ".$data_petugas["nama"]."</b> berhasil export barang ".$data_barang["nama_barang"]." pada ".format_datetime_to_date($data_marquee_export["tgl_keluar"]).", ".$data_marquee_export["jam_keluar"]."</span>";
                        }
                    }
                    ?>
                </marquee>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body bg-primary">
                <div class="clearfix">
                    <a href="<?php echo $base_link; ?>myprofile.php">
                        <i class="fa fa-user p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="text-uppercase font-weight-bold font-30 large text-light">Profile</div>
                        <div class="h5  mb-0 mt-1 text-light"><?php echo $username_data; ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-success">
                <div class="clearfix">
                    <a href="<?php echo $base_link; ?>tampil-data-import.php">
                        <i class="ti-import p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="text-uppercase font-weight-bold font-30 large text-light">Barang Masuk</div>
                        <div class="h5 mb-0 mt-1 text-light"><?php echo number_format($data_import['total_quantity_import']); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-warning">
                <div class="clearfix">
                    <a href="<?php echo $base_link; ?>tampil-data-barang.php">
                        <i class="fa fa-truck p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="text-uppercase font-weight-bold font-30 large text-light">Stok Barang</div>
                        <div class="h5 mb-0 mt-1 text-light"><?php echo number_format($data_stok_barang['total_stok']); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-danger">
                <div class="clearfix">
                    <a href="<?php echo $base_link; ?>tampil-data-export.php">
                        <i class="ti-export p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="text-uppercase font-weight-bold font-30 large text-light">Barang Keluar</div>
                        <div class="h5 text-secondary mb-0 mt-1 text-light"><?php echo number_format($data_export['total_quantity_export']); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body bg-success">
                <div class="clearfix">
                    <a href="<?php echo $base_link; ?>tampil-data-import.php">
                        <i class="ti-import p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="text-uppercase font-weight-bold font-30 large text-light">Barang Masuk - Hariini</div>
                        <div class="h5 mb-0 mt-1 text-light"><?php echo number_format($data_import_today['total_quantity_import_today']); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body bg-danger">
                <div class="clearfix">
                    <a href="<?php echo $base_link; ?>tampil-data-export.php">
                        <i class="ti-export p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="text-uppercase font-weight-bold font-30 large text-light">Barang Keluar - Hariini</div>
                        <div class="h5 mb-0 mt-1 text-light"><?php echo number_format($data_export_today['total_quantity_export_today']); ?></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
</body>

</html>
