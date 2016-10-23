<?php

$dbname 	= "contohdb";
$host   	= "localhost"; //127.0.0.1
$username	= "root";
$password	= "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	print "Koneksi ke server database gagal.";
	exit();
}
?>