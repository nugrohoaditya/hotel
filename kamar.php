<?php
    require_once "view/header.php";  // untuk memanggil tampilan dari file header ke menu kamar
?>
    <!-- untuk menampilkan judul pada menu kamar -->
    <div id="imgindex">
        <div id="imglog">
            <p><br>Tipe Kamar<br>&nbsp;</p>
        </div>
    </div>
    <div id="datakamar2">
    <div>
        <?php
            // untuk mengambil data dari tabel kamar di dalam database
            $sql = $pdo->query("SELECT * FROM kamar");
            while($data = $sql->fetch()) {
                $id = $data['idkamar'];
                $tipe = $data['tipe'];
                $jumlah = $data['jumlah'];
                $harga = $data['harga'];
                $gambar = $data['gambar'];
                $video = $data['video'];
                $stok = $data['stok'];


        ?>
        
            <div class="kamar">
                <table>
                    <tr>
                        <td>
                            <center>
                                 <!-- untuk menampilkan pilihan kamar yang akan dipesan -->
                                <form action="pemesanan.php" method="POST" name="form" enctype="multipart/form-data">
                                    <div class="idkamar">
                                        <!-- untuk menampilkan type kamar -->
                                        <?php echo $tipe ?> 
                                    </div>
                                    <input type="hidden" name="tipe" id="tipe" value="<?php echo $tipe ?>">
                                    <!-- untuk menampilkan data harga -->
                                    <div class="tipekamar"><b>Rp. <?php echo $harga ?></div></b>
                                    <input type="hidden" name="harga" id="harga" value="<?php echo $harga ?>">
                                    <!-- untuk menampilkan data gambar -->
                                    <img src="gambar/<?php echo $gambar ?>" width="200px" height="150px">
                                    <input type="hidden" name="gambar" id="gambar" value="<?php echo $gambar ?>">
                                    <!-- untuk menampilkan data url video -->
                                    <iframe width="200px" height="150px" src="<?php echo $video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    <!-- untuk menampilkan data sisa kamar tersedia -->
                                    <div class="tipekamar">Tersedia <?php echo $stok ?> Kamar</div>
                                    <input type="hidden" name="stok" id="stok" value="<?php echo $stok ?>">
                                    
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <button type="submit" id="submit" style="width:70px;background-color:#000;color:white;font-weight:bold;padding:4px;border:1px solid red;">Pesan</button></a>
                                </form>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
            <?php

                }
            ?>
            <?php
$satu = $pdo->query("SELECT stok FROM kamar Where tipe='Standar'");
while($dipesan = $satu->fetch()){
    $standar = $dipesan['stok'];
}
$dua = $pdo->query("SELECT stok FROM kamar Where tipe='Deluxe'");
while($dipesan = $dua->fetch()){
    $deluxe = $dipesan['stok'];
}
$tiga = $pdo->query("SELECT stok FROM kamar Where tipe='Family'");
while($dipesan = $tiga->fetch()){
    $family = $dipesan['stok'];
}
$standar;
$deluxe;
$family;
            ?>
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>    
    </div>
    </div>
    <script>
        
        const xValues = ["Standar", "Deluxe", "Family"];
        const yValues = [ 15, 6, 5];
        const barColors = ["red", "green","blue"];
        
        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Data Sisa Kamar"
            }
        }
        });  
    </script>
<?php
    require_once "view/footer.php"
?>