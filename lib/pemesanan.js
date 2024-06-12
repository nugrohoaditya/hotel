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
            // dan untuk mengambil velue sesuai jenis kelamin yang dipilih
				var x = document.querySelector('input[name="jk"]:checked').value;
				document.getElementById("jk").innerHTML=x;

				// untuk memanggil fungsi getChechboxStatus
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