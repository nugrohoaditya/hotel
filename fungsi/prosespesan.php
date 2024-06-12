<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body
<?php
// untuk menyalin value nilai dari method POST
include"koneksi.php";
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$nik = $_POST['nik'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$tanggal = $_POST['tanggal'];
$durasi = $_POST['lama'];
$breakfast = $_POST['breakfast'];
$total = $_POST['totalBayar'];
$jumlah = $_POST['jum'];

	// untuk menyimpan data ke dalam tabel pengunjung
	$sqlsimpan = $pdo->query("INSERT INTO pengunjung VALUES('', '$nama', '$jk', '$nik', '$tipe', '$harga', '$tanggal', '$durasi', '$breakfast', '$total')");


	//untuk mengurangi value stok dengan dikurangi jumlah yang dipesan
	// dan melakukan update data pada data tabel kamar
	$sqlstok = $pdo->query("SELECT stok FROM kamar WHERE tipe='".$tipe."'");
	$datax = $sqlstok->fetch();
	$stok = $datax['stok'];
	$hitung = $stok - $jumlah;
	$sqlupdate = $pdo->query("UPDATE kamar SET stok='$hitung' WHERE tipe='".$tipe."'");

			//untuk meanmpilkan hasil pesanan
			echo "<h5> Nama Pemesan: ".$_POST['nama']."<br></h5>";
            echo "<h5> Nomor Identitas : ".$_POST['nik']."<br></h5>";
            echo "<h5> Jenis Kelamin : ".$_POST['jk']."<br></h5>";
            echo "<h5> Tipe Kamar : ".$_POST['tipe']."<br></h5>";
            echo "<h5> Durasi Penginapan : ".$_POST['lama']." Hari<br></h5>";
            echo "<h5> Discount : ".$_POST['diskon']." %<br></h5>";
            echo "<h5> Total Bayar : Rp. ".$_POST['totalBayar']."<br></h5>";

echo"<script>swal({
	  	type: 'success',
	  	title: 'Pemesanan Kamar Terkirim',
	  	showConfirmButton: false,
	  	backdrop: 'rgba(0,0,123,0.5)',
		});
		window.setTimeout(function(){
			window.location.replace('../user/datapesanan');
 		} ,1500);</script>";
?>

</body>
</html>