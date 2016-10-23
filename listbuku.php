<html>
<head>
	<title>Membuat Pagination</title>
</head>
<body>
<h2>Daftar Buku</h2>

<?php

require("connectdb.php");

$batas = 3;

$result = mysqli_query($conn, "select count(*) from buku");
$recordcount= mysqli_fetch_row($result) [0];

$pagecount = ceil($recordcount / $batas);

if (!isset($_GET['page'])) {
	$activepage = 1;
} else {
	$activepage = $_GET['page'];
}

$mulai = $batas * ($activepage-1);
if ($mulai<0) {$mulai=0;}

$sql = "select `judul`,`pengarang`,`jmlhalaman`,`harga`,`penerbit` from buku ".
       "limit $mulai,$batas";
	   
$result = mysqli_query($conn,$sql);
?>
<table border="1">
<tr>
   <th>Judul</th>
   <th>Pengarang</th>
   <th>Jumlah Halaman</th>
   <th>Penerbit</th>
   <th>Harga</th>
</tr>
<?php
if ($result == false)
{
	die(mysql_error());
}

while ($row = mysqli_fetch_row($result)) {
	$judul = $row[0];
	$pengarang = $row[1];
	$jmlhalaman = $row[2];
	$harga = $row[3];
	$penerbit = $row[4];

	?>
	<tr>
	   <td><?php print $judul; ?></td>
	   <td><?php print $pengarang; ?></td>
	   <td><?php print $jmlhalaman; ?></td>
	   <td><?php print $penerbit; ?></td>
	   <td><?php print $harga; ?></td>
	</tr>
	<?php
	
}
?>
</table>
<br />
<?php
for ($i=1; $i<=$pagecount; $i++) {
	if ($i != $activepage) {
		?>
		   <a href="listbuku.php?page=<?php print $i;?>">
		      <?php print $i;?>
			</a>&nbsp;
			<?php
	} else {
		print "<strong>" . $i . "</strong>";
	}
}   
?>
</body>
</html>