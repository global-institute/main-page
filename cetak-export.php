<?php
session_start();
error_reporting(0);
require 'config.php'; 
if (!isset($_SESSION["submit"])) {
  header("location: ".$base_link."page-login.php");
} 
    $ambil_id_export = $_POST['id_export'];
    $ambil_nama_barang = $_POST['nama_barang'];
    $ambil_penerima = $_POST['penerima'];
    $ambil_nama_petugas = $_POST['nama_petugas'];
    $query_tampil = mysqli_query($conn, "SELECT * FROM tb_export WHERE id_export = '$ambil_id_export'");
    $data_tampil = mysqli_fetch_assoc($query_tampil);
    if(mysqli_num_rows($query_tampil) == 0){
        header("location: ".$base_link."tampil-data-export.php");
    } else {
        $id_barang = $data_tampil['id_barang'];
        $query_barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
        $data_barang = mysqli_fetch_assoc($query_barang);
?>
<html>
    <font face="Calibri">
    <head>
        <title>Cetak Satuan Data Export</title>
    </head>
    <body>
        <script>
            window.print();
        </script>
        <center>
        <table border="0" width="100%" style="padding-bottom: 7%;">
            <tbody>
                <tr>
                    <br>
                    <h3>Laporan Satu Data Export</h3>
                    <hr>
                </tr>
                <tr>
                    <td width="20%"><small><b>ID Export</b></small></td>
                    <td><small>:</small></td>
                    <td width="80%"><small><?php echo $data_tampil['id_export']; ?></small></td>
                </tr>
                <tr>
                    <td width="20%"><small><b>Nama Barang</b></small></td>
                    <td><small>:</small></td>
                    <td width="80%"><small><?php echo $ambil_nama_barang; ?></small></td>
                </tr>
            </tbody>
        </table>
        <table border="1" width="100%" style="border-color: black; border-radius: 5px; border-spacing: 0px;">
            <thead>
                <tr>
                    <th><small>Penerima</small></th>
                    <th><small>Petugas</small></th>
                    <th><small>Quantity</small></th>
                    <th><small>Tgl Export</small></th>
                    <th><small>Waktu Export</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td width="10%"><small><center><?php echo $ambil_penerima; ?></center></small></td>
                  <td width="10%"><small><center><?php echo $ambil_nama_petugas; ?></center></small></td>
                  <td width="10%"><small><center><?php echo number_format($data_tampil['quantity']); ?> <?php echo $data_barang['satuan_barang']; ?></center></small></td>
                  <td width="10%"><small><center><?php echo format_datetime($data_tampil['tgl_keluar']); ?></center></small></td>
                  <td width="10%"><small><center><?php echo $data_tampil['jam_keluar']; ?></center></small></td>
                </tr>
            </tbody>
        </table>
        <table border="0" width="100%" style="padding-top: 5%;">
            <tbody>
                <tr>
                    <td width="20%"><small>Keterangan :</small></td>
                </tr>
                <tr>
                    <td><small>
                        <ol>
                            <li>Apabila ada data yang tidak sesuai, harap menghubungi admin</li>
                            <li>Data yang dapat diubah hanya kolom quantity/kuantitas</li>
                        </ol>
                    </small></td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p align="right"><small>Dicetak oleh <?php echo $base_name; ?><br>
            Pada <?php echo date("Y-m-d H:i:s"); ?></small></p>
        </center>
    </body>
    </font>
</html>
<?php
    }
?>