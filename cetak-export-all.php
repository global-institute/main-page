<?php
session_start();
error_reporting(0);
require 'config.php'; 
if (!isset($_SESSION["submit"])) {
  header("location: ".$base_link."page-login.php");
}
?>
<html>
    <font face="Calibri">
    <head>
        <title>Cetak Seluruh Data Export</title>
    </head>
    <body>
        <script>
            window.print();
        </script>
        <center>
        <table border="0" width="100%">
            <tbody>
                <tr>
                    <br>
                    <h3>Laporan Seluruh Data Export</h3>
                    <hr>
                </tr>
            </tbody>
        </table>
        <table border="0" width="100%" style="padding-bottom: 1%;">
            <tbody>
                <tr>
                    <td width="20%" colspan="3"><small>Berikut adalah laporan seluruh data barang yang sudah pernah di export</small></td>
                </tr>
            </tbody>
        </table>
        <table border="1" width="100%" style="border-color: black; border-radius: 5px; border-spacing: 0px;">
            <thead>
                <tr>
                    <th><small>Id Export</small></th>
                    <th><small>Nama Barang</small></th>
                    <th><small>Penerima</small></th>
                    <th><small>Petugas</small></th>
                    <th><small>Quantity</small></th>
                    <th><small>Tgl Export</small></th>
                    <th><small>Waktu Export</small></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query_tampil = mysqli_query($conn, "SELECT * FROM tb_export");
                    while($data_tampil = mysqli_fetch_assoc($query_tampil)){
                        $id_barang = $data_tampil['id_barang'];
                        $id_petugas = $data_tampil['id_petugas'];
                        $query_barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
                        $data_barang = mysqli_fetch_assoc($query_barang);
                        $query_petugas = mysqli_query($conn, "SELECT * FROM tb_petugas WHERE id_petugas = '$id_petugas'");
                        $data_petugas = mysqli_fetch_assoc($query_petugas);
                ?>
                <tr>
                  <td width="10%"><small><center><?php echo $data_tampil['id_export']; ?></center></small></td>
                  <td width="10%"><small><center><?php echo $data_barang['nama_barang']; ?></center></small></td>
                  <td width="10%"><small><center><?php echo $data_tampil['penerima']; ?></center></small></td>
                  <td width="10%"><small><center><?php echo $data_petugas['nama']; ?></center></small></td>
                  <td width="10%"><small><center><?php echo number_format($data_tampil['quantity']); ?> <?php echo $data_barang['satuan_barang']; ?></center></small></td>
                  <td width="10%"><small><center><?php echo format_datetime($data_tampil['tgl_keluar']); ?></center></small></td>
                  <td width="10%"><small><center><?php echo $data_tampil['jam_keluar']; ?></center></small></td>
                </tr>
                <?php
                }
                ?>
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