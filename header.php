<?php
if (!isset($_SESSION["submit"])) {
  header("location: ".$base_link."page-login.php");
}
$username_data = $_SESSION["username"];
$jabatan = $_SESSION['jabatan'];
$check_identitas_pengunjung = mysqli_query($conn, "SELECT username, jabatan FROM tb_pengguna WHERE username = '$username_data'");
$data_identitas_pengunjung = mysqli_fetch_assoc($check_identitas_pengunjung);
$identitas_jabatan_pengunjung = $data_identitas_pengunjung['jabatan'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $base_name; ?></title>
    <meta name="description" content="<?php echo $base_name; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo $base_link; ?>apple-icon.png">
    <link rel="shortcut icon" href="<?php echo $base_link; ?>favicon.ico">

    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?php echo $base_link; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_link; ?>assets/css/accordion.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo $base_link; ?>"><?php echo $base_name; ?></a>
                <a class="navbar-brand hidden" href="<?php echo $base_link; ?>"><img src="" alt=""></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Main Navigations</h3><!-- /.menu-title -->
                    <?php
                    if($page == "dashboard"){
                    ?>
                    <li class="active">
                    <?php
                    } else {
                    ?>
                    <li>
                    <?php
                    }
                    ?>
                        <a href="<?php echo $base_link; ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                <?php
                if($jabatan == "admin" AND $identitas_jabatan_pengunjung == "admin"){
                ?>
                    <?php
                    if($page == "pengguna"){
                    ?>
                    <li class="menu-item-has-children dropdown active">
                    <?php
                    } else {
                    ?>
                    <li class="menu-item-has-children dropdown">
                    <?php
                    }
                    ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-angle-double-right"></i>Kelola Pengguna</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-eye"></i><a href="<?php echo $base_link; ?>tampil-data-pengguna.php">Lihat Data Pengguna</a></li>
                            <li><i class="menu-icon ti-eye"></i><a href="<?php echo $base_link; ?>tampil-data-login-history.php">Lihat Aktivitas Pengguna</a></li>
                        </ul>
                    </li>
                    <?php
                    if($page == "device"){
                    ?>
                    <li class="menu-item-has-children dropdown active">
                    <?php
                    } else {
                    ?>
                    <li class="menu-item-has-children dropdown">
                    <?php
                    }
                    ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-angle-double-right"></i>Kelola Device</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-eye"></i><a href="<?php echo $base_link; ?>tampil-data-device.php">Lihat Data Device</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <?php
                if($jabatan == "admin" AND $identitas_jabatan_pengunjung == "admin" OR $jabatan == "supervisor" AND $identitas_jabatan_pengunjung == "supervisor"){
                ?>
                    <?php
                    if($page == "petugas"){
                    ?>
                    <li class="menu-item-has-children dropdown active">
                    <?php
                    } else {
                    ?>
                    <li class="menu-item-has-children dropdown">
                    <?php
                    }
                    ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-angle-double-right"></i>Kelola Petugas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-eye"></i><a href="<?php echo $base_link; ?>tampil-data-petugas.php">Lihat Data</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                    <?php
                    if($page == "supplier" OR $page == "jenis" OR $page == "barang" OR $page == "import"){
                    ?>
                    <li class="menu-item-has-children dropdown active">
                    <?php
                    } else {
                    ?>
                    <li class="menu-item-has-children dropdown">
                    <?php
                    }
                    ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-angle-double-right"></i>Kelola Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-agenda"></i><a href="<?php echo $base_link; ?>tampil-data-supplier.php">Data Supplier</a></li>
                            <li><i class="menu-icon fa fa-tag"></i><a href="<?php echo $base_link; ?>tampil-data-jenis.php">Data Jenis</a></li>
                            <li><i class="menu-icon fa fa-truck"></i><a href="<?php echo $base_link; ?>tampil-data-barang.php">Data Barang</a></li>
                            <li><i class="menu-icon ti-import"></i><a href="<?php echo $base_link; ?>tampil-data-import.php">Data Import</a></li>
                            <li><i class="menu-icon ti-export"></i><a href="<?php echo $base_link; ?>tampil-data-export.php">Data Export</a></li>
                        </ul>
                    </li>
                    <?php
                    if($page == "biodata"){
                    ?>
                    <li class="menu-item-has-children dropdown active">
                    <?php
                    } else {
                    ?>
                    <li class="menu-item-has-children dropdown">
                    <?php
                    }
                    ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-angle-double-right"></i>Biodata Anggota</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-user"></i><a href="<?php echo $base_link; ?>fachrul.php">Fachrul Reza</a></li>
                            <li><i class="menu-icon ti-user"></i><a href="<?php echo $base_link; ?>yohannes.php">Yohannes Petrick</a></li>
                            <li><i class="menu-icon ti-user"></i><a href="<?php echo $base_link; ?>william.php">William Chico</a></li>
                            <li><i class="menu-icon ti-user"></i><a href="<?php echo $base_link; ?>eka.php">Muhammad Eka</a></li>
                            <li><i class="menu-icon ti-user"></i><a href="<?php echo $base_link; ?>aghniya.php">Aghniya Aulia</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <?php
                                    $check_login_history = mysqli_query($conn, "SELECT * FROM tb_login_history WHERE username = '$username_data' ORDER BY id DESC LIMIT 5");
                                    $count_login_history = mysqli_num_rows($check_login_history);
                                ?>
                                <span class="count bg-primary"><?php echo $count_login_history; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message" style="padding-left: 15%; padding-right: 15%; padding-bottom: 15%; padding-top: 15%;">
                                <p class="red">You have <?php echo $count_login_history; ?> activities</p>
                                <?php
                                $no = 2;
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
                                <a class="dropdown-item media bg-<?php echo $labellogin; ?> text-light" href="<?php echo $base_link; ?>myprofile.php">
                                    <span class="photo media-left"><i class="fa fa-<?php echo $materiallogin; ?>"></i></span>
                                    <span class="message media-body">
                                        <span class="name float-left"><?php echo $yangdilakukan; ?></span>
                                        <span class="time float-right"><?php echo format_datetime_to_date($data_login_history['datetime']);?></span>
                                        <p class="text-warning">Melakukan <?php echo $yangdilakukan; ?> Pada <?php echo format_datetime($data_login_history['datetime']);?></p>
                                    </span>
                                </a>
                                <?php
                                $no++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo $base_link; ?>myprofile.php"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="<?php echo $base_link; ?>settings.php"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="<?php echo $base_link; ?>page-logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        
        <!-- Right Panel -->
    <script src="<?php echo $base_link; ?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $base_link; ?>assets/js/main.js"></script>


    <script src="<?php echo $base_link; ?>vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?php echo $base_link; ?>assets/js/dashboard.js"></script>
    <script src="<?php echo $base_link; ?>assets/js/widgets.js"></script>
    <script src="<?php echo $base_link; ?>vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?php echo $base_link; ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo $base_link; ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>
