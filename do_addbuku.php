<html>
<head>
	<title>Membuat Pagination</title>
</head>
<body>
<?php
if (isset ($_POST['btnSubmit'])) {
	$judul 		= $_POST['judul'];
	$pengarang 	= $_POST['pengarang'];
	$jmlhalaman = $_POST['jmlhalaman'];
	$harga 		= $_POST['harga'];
	$penerbit 	= $_POST['penerbit'];
	
	require("connectdb.php");
	
	$sql = "insert into buku(`judul`,`pengarang`,`jmlhalaman`,`harga`,`penerbit`)".
		   "values('$judul','$pengarang','$jmlhalaman','$harga','$penerbit')";
		   
	mysqli_query($conn, $sql);
	$num = mysqli_affected_rows($conn);
	
	if ($num > 0) {
		?>
		<p><strong>Data telah disimpan.</strong></p>
		<p>
			<a href="listbuku.php">Lihat Daftar Buku</a>
		</p>
		<?php
	} else {
		?>
		<h2>Error</h2>
		Proses penyimpanan data gagal.Silahkan ulangi!<br />
		<a href="addentry.php">Kembali ke Form Entri Buku</a>
		<?php
	}
}
?>
</body>
</html>