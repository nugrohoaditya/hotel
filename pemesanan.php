<?php
	require_once "view/header.php";

    ?>
			<!-- untuk mengirim data ke file fungsi prosespesan.php -->
            <form method="post" action="fungsi/prosespesan.php" enctype="multipart/form-data">
			<table width="520px">
			<tr align="center">
				<!-- menampilkan gambar -->
				<td colspan="2" style="width:300px;"><img src="gambar/<?php echo $_POST['gambar']; ?>" width='200px' height='150px' style="border:5px solid #B40301;"></td>
			</tr>
			<tr>
				<td>Tipe Kamar</td>
				<td>
				<!-- form untuk menampilkan type kamar -->
				<input type="text" name="tipe" readonly="true" style="font-weight: bold; border: 2px solid #B40301" value="<?php echo $_POST['tipe']; ?>">
				</td>
			</tr>
			<tr>
				<td>Harga / Hari</td>
				<!-- untuk menampilkan harga/hari -->
				<td><input type="text" name="harga" id="harga" readonly="true" style="font-weight: bold; border: 2px solid #B40301" value="<?php echo $_POST['harga']; ?>">
				</td>
			</tr>
			<tr>
				<td>Jumlah Kamar</td>
				<!-- input jumlah kamar -->
				<td>
					<select name="jum" id="jum" required="required" style="font-weight: bold; border: 2px solid #B40301">
						<option>Pilih</option>
						<script>
							for(var i=1;i<=<?php echo $_POST['stok']; ?>;i++){
								document.write("<option>"+i+"</option>");
							}
						</script>
					</select>
					<input type="hidden" name="stok" value="<?php echo $_POST['stok']; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama Pemesan</td>
				<td><input type="text" required="required" name="nama" style="font-weight: bold; border: 2px solid #B40301">
			</tr>
            <tr>
				<td>Jenis Kelamin</td>
				<td>
                    <input type="radio" id='jk' name="jk" value="Laki-Laki">
                    <label for="laki">Laki-Laki</label>
                    <input type="radio" id='jk' name="jk" value="Perempuan">
                    <label for="perempuan">Perempuan</label>
                </td>
			</tr>
			<tr>
				<td>Nomor Identitas</td>
				<td><input type="text" required="required" name="nik" style="font-weight: bold; border: 2px solid #B40301">
			</tr>
			<tr>
				<td>Tanggal Pesan</td>
				<td><input type="date" name="tanggal" required="required" min="<?php echo date('d-m-Y') ?>" required="required" name="tglcekin" style="font-family: arial"></td>
			</tr>
			<tr>
				<td>Durasi Menginap</td>
				<td><input type="text" name="lama" id="lama" style="font-weight: bold; border: 2px solid #B40301"></td>
				<td>Hari</td>
				<input type="hidden" name="diskon" id="diskon">
			</tr>
			<tr>
				<td>Termasuk Breakfast</td>
				<td><input type="checkbox" name="sarapan" id="sarapan" checked></td>
				<input type="hidden" name="breakfast" id="breakfast">
				
			</tr>
			<tr>
				<td>Total Biaya</td>
				<td><input type="text" name="totalBayar" id="totalBayar" readonly="true" readonly="true" value="0" style="font-weight: bold; border: 2px solid #B40301"></td>
			</tr>
			<tr>
				<td>
					<button type="button" onclick="hitung()" style="width:150px;background:#B40301; color:white;font-weight:bold;padding:5px;border:2px solid #B40301;">Hitung Total Bayar</button>
				</td>
				<td>
					<button type="submit" style="width:100px;background:#B40301; color:white;font-weight:bold;padding:5px;border:2px solid #B40301;">Simpan</button>
				</td>
				<td>
					<button type="button" onclick="history.back()" style="width:100px;background:#B40301; color:white;font-weight:bold;padding:5px;border:2px solid #B40301;" id="batal">Cancel</button>
				</td>
			</tr>
		</table>
		</form>
		
		</center>
		</div>

        <script type="text/javascript">
        function checkInp()
        {
            var x=document.forms["cekstok"]["lama"].value;
            if (isNaN(x))
            {
                alert("Harus isi angka");
                return false;
            }
        }

        //fungsi untuk mendapat value ceklist atau tidak dan mengirimkan data ya atau tidak
        //ke dalam hidden input breakfast
        function getCheckboxStatus(){
		   if (document.getElementById("sarapan").checked == true) {
		   		document.getElementById("breakfast").value="Ya";
		   }
		   if(document.getElementById("sarapan").checked == false){
		      	document.getElementById("breakfast").value="Tidak";
		   }
		}

		function hitung() {
			// untuk mengambil dan mengembalikan nilai dari input type radio
				var x = document.querySelector('input[name="jk"]:checked').value;
				document.getElementById("jk").innerHTML=x;

				// untuk memanggil fungsi 
				getCheckboxStatus();

				// menghitung total total bayar 
                var hargakamar = document.getElementById("harga").value;
                var jumlahkamar = document.getElementById("jum").value;
                var lama = document.getElementById('lama').value;
                var sarapan = 0;
                if (document.getElementById("sarapan").checked == true) {
                	var sarapan = 80000;
                }


                var totalBayar = document.getElementById("totalBayar");
                var totalA = hargakamar*jumlahkamar*lama+sarapan;
                if (document.getElementById('lama').value > 3) {
                	var diskon = 10/100*totalA;
                	totalBayar.value = totalA-diskon;
                	document.getElementById("diskon").value="10";
                }else{
                	totalBayar.value = totalA;
                	document.getElementById("diskon").value="0";
                }

                
        }
		</script>

<?php
	require_once "view/footer.php"
?>