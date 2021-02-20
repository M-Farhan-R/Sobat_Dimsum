<!doctype html>
<html lang="en">
    <head>
        <title>Sobat Dimsum</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="../../assets/css/fontfamily.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/pesanan.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            #pesanan{
                margin-top: 2em;
                margin-bottom: 2em;
            }

            #pesanan div{
                padding-bottom: 2em;
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                box-sizing: border-box;
                background-color: black;
            }

            .bg-dark1{
                background-color: black;
            }
            .sticky-top{
                position: sticky;
                top: 0;
            }
        </style>
    </head>
    <body style="background-color: rgb(3, 7, 10);">
        
        <div class="header">  
            <h1 class="asw">
                Sobat Dimsum
            </h1>
        </div>
        <div class="sticky-top">
        <nav class="navbar navbar-dark bg-dark1">
          <div class="container-fluid">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#responsifnavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="responsifnavbar" style="text-align: center;">
              <ul class="navbar-nav m-auto">
                <li class="nav-item">
                  <a class="nav-link" href="../../login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../index.php">Menu</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
        <div id="pesanan" class="container">
            <div>
                <h1 class="judul">Data Pembeli</h1>
                <div class="tabel-pesanan">
                <form action="confirm_pesanan.php" method="POST">
                    <center>
                <table id="tabel-pesanan">
                    <tr>
                        <td class="judul">Atas Nama</td>
                        <td><input type="text" name="nama_pembeli" required></td>
                    </tr>
                    <tr>
                        <td>
                    </tr>
                    <tr style="border-top: 1px solid white;">
                        <th width=20% class="judul">Menu</th><th class="judul">Harga</th><th width=15% class="judul">Jumlah</th><th width=10% class="judul">Pilih</th>
                    </tr>
                    <?php
                         include '../../config/connect.php';
               
                         $all = "SELECT * FROM menu";
                         $ambil = mysqli_query($conn,$all);
                         $menu = array();
                         $harga_menu = array();
               
                         while($row = mysqli_fetch_row($ambil)){
                           $menu[] = $row;
                         }

                         for ($i=0; $i < count($menu); $i++) { 
                            list($id_menu,$nama_menu,$kategori,$deskripsi,$harga,$img) = $menu[$i];
                            $harga_menu[$i] = $harga;
                            echo "
                            <tr>
                                <td>$nama_menu</td>
                                <td class='harga'>RP<input id='harga' type='text' value='$harga' readonly></td>
                                <td><input id='jml$i' name='jumlah_barang[]' class='jml' type='number' max='100' min='1' onchange='func_harga()' disabled></td>
                                <td><input id='pilihan$i' type='checkbox' name='nama_menu[]' value='$nama_menu' onchange='enable();func_harga();'></td>
                            </tr>";
                         }
                         $i = count($menu);
                    ?>
                    <tr style="border-top: 1px solid white;">
                        <td class="judul">Total</td>
                        <td><center>RP<input id="total" name="total_harga" type="text" value=0 readonly></td><td><td>
                    </tr>
                    <tr>
                        <td>
                    </tr>
                    <tr>
                        <td class="alamat judul">Alamat</td>
                        <td><textarea name="alamat" placeholder="Isi Detail Alamat Disini" required></textarea>
                    </tr>
                    <tr>
                        <td class="judul">No HP</td>
                        <td><input type="text" name="no_hp"></td>
                    </tr>
                    <tr>
                        <td class="judul">Keterangan</td>
                        <td><input name="keterangan" type="text"></td>
                    </tr>
                </table>
                        </div>
                <div id="btn">
                    <input class="btn-pesan" type="submit" value="Pesan" onclick="confirm()"><input class="btn-reset" type="reset" value="Reset" onclick="disable()">
                        </div>    
            </center>
                </form>
            </div>
        </div>
        <footer>
            <div class="container-fluid">
                baba
            </div>
        </footer>
        
        <!-- Optional JavaScript -->
        <script>
            function confirm(){
                confirm('Apakah Anda Yakin Data yang Diberikan Sudah Sesuai dan Ingin Membuat Pesanan Ini?');
            }
        </script>
        <script>
            function disable(){
                for (let index = 0; index < <?php echo "$i"; ?>; index++){
                    var jml = document.getElementById("jml".concat(index));
                    jml.disabled = true;
                }
            }
        </script>
        <script>
            function enable(){
                for (let index = 0; index < <?php echo "$i"; ?>; index++) {
                    var check = document.getElementById("pilihan".concat(index));
                    var jml = document.getElementById("jml".concat(index));
                    var reset = document.getElementById("reset");

                    if (check.checked == true) {
                        jml.disabled = false;
                    }else{
                        jml.value = "";
                        jml.disabled = true;
                    }
                    
                }
            }
        </script>
        <script>
            function func_harga(){
                var total = document.getElementById("total");
                var a = 0;
                var satuan = new Array();
                var harga = <?php echo json_encode($harga_menu); ?>;


                for (let index = 0; index < <?php echo "$i"; ?>; index++) {
                    var jml = document.getElementById("jml".concat(index));
                    var check = document.getElementById("pilihan".concat(index));
                    
                    satuan[index] = 0;
                    if (check.checked == true) {
                        satuan[index] =  harga[index] * jml.value;
                    }
                }
                for (let index = 0; index < satuan.length; index++) {
                    a = a + satuan[index];
                }
                for (let index = 0; index < satuan.length; index++){
                    var check = document.getElementById("pilihan".concat(index));
                    if (check.checked == false) {
                        a = a - satuan[index];
                    }
                }
                total.value = a;
            }
        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>