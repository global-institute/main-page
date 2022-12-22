<?php
require("config.php");

if (isset($_POST['getidbarang'])) {
	$post_getidbarang = mysqli_real_escape_string($conn,$_POST['getidbarang']);
	$check_data_barang = mysqli_query($conn, "SELECT nama_brand FROM tb_barang WHERE id_barang = '$post_getidbarang'");
	$data_barang = mysqli_fetch_assoc($check_data_barang);
	$nama_brand = $data_barang['nama_brand'];
	$check_supplier = mysqli_query($conn, "SELECT id_supplier, nama_supplier FROM tb_supplier WHERE nama_brand = '$nama_brand'");
	?>
	<?php
	while ($data_supplier = mysqli_fetch_assoc($check_supplier)) {
	?>
	<option value="<?php echo $data_supplier['id_supplier']; ?>"><?php echo $data_supplier['nama_supplier'];?></option>
	<?php
	}
} else {
    header("Location: ".$base_link."page-logout.php");
}
?>