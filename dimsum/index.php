<!doctype html>
<html lang="en">
  <head>
    <title>Sobat Dimsum</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="material/images/icon.png"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontfamily.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      h1{
        margin-top: 0;
      }
      body{
        font-size: 24px;
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
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    $message = "Pesanan Gagal Dibuat!";
                    echo "<script type='text/javascript'>alert('$message')</script>";
                }
                if($_GET['pesan'] == "terkirim"){
                    $message = "Pesanan Berhasil Dikirim";
                    echo "<script type='text/javascript'>alert('$message')</script>";
                }
            }
        ?>
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
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="modul/pesanan/pesan.php">Pesan</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    <div class="container inti">
      <div id="list-menu">
        <?php
          include 'config/connect.php';
          $ambil = mysqli_query($conn, "SELECT * FROM menu");

          while($r = mysqli_fetch_array($ambil)){
            echo"<a href='modul/pesanan/pesan.php'>
              <div class='menu'><h2>$r[nama_menu]</h2><img src='$r[foto]' width=200px height=200px><span class='deskripsi'>$r[deskripsi]</span><span class='harga'>RP.$r[harga]</span></div></a>";
          }
            
        ?>
      </div>
    </div>
    <div>
    </div>
    <footer>
        <div class="container-fluid">

        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>