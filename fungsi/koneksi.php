<?php
	$host = "localhost"; // untuk menyimpan alamat server 
	$user = "root"; // unutk menyimpan username
	$pass = ""; // untuk menyimpan password
	$database = "hotel"; // nama database 
	$url = 'mysql:host=localhost;dbname=hotel'; // alamat database hotel
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',); // untuk setting database menggunakan format utf8
	try {
		$pdo = new PDO($url, $user, $pass, $options);
		$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  		// hapus koneksi
  		$dbh = null;
	}
	catch (PDOException $e) {
	  // tampilkan pesan kesalahan jika koneksi gagal
	  print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
	  die();
	}

?>
