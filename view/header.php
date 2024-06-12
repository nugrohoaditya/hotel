<?php
    session_start();
	require_once "fungsi/koneksi.php"; // menambahkan fungsi php untuk koneksi ke database hotel
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan Kamar Hotel Sederhana</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="lib/pemesanan.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<style type="text/css">
		
		
	</style>
</head>
<body>

	<nav>
		<img src="gambar/logo2.png" width="70px">
		<ul>
			<li><a href="index.php">Beranda</a></li>
			<li><a href="kamar.php">Kamar</a></li>
			<li><a href="tentang.php">Tentang</a></li>
			
		</ul>
	</nav>

	<main>
		<center>
			