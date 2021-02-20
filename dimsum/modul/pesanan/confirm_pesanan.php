<?php
    include '../../config/connect.php';
    
    $atas_nama = $_POST['atas_nama'];
    $nama_menu = $_POST['nama_menu'];
    $jml = $_POST['jumlah_barang'];
    $total = $_POST['total_harga'];
    $alamat = $_POST['alamat_pembeli'];
    $no_hp = $_POST['no_telp_pembeli'];
    $keterangan = $_POST['keterangan'];

    if(isset($_POST['keterangan'])){
        $keterangan = $_POST['keterangan'];
    }

    $array = array();
    foreach ($nama_menu as $key => $value) {
        $array[] = $value;
    }
    $string = "";
    for ($i=0; $i < count($array); $i++) { 
        $string = $array[$i];
        $string = $string." ";
        echo "$string";
    }
    //membuat id pesanan
   $conn -> query("INSERT INTO ai_id_pesanan VALUES (NULL);");

    //mengambil id pesanan
    $ambil_id = $conn -> query("SELECT * FROM id_pesanan");
    $id_db = array();

    while ($row = mysqli_fetch_row($ambil_id)) {
        $id_db[] = $row;
    }
    $id_seluruh = array();
    for ($i=0; $i < count($id_db); $i++) { 
        list($id) = $id_db[$i];
        $id_seluruh[$i] = $id;
    }
    $id_terakhir = count($id_seluruh) - 1;
    $id_pemesan = $id_seluruh[$id_terakhir];

    //menambahkan data ke database
    $query = "INSERT INTO pesanan (id_pesanan,nama_menu,jumlah,total_harga,atas_nama,alamat_pembeli,no_telp_pembeli,keterangan,status) VALUES";

    $menu = "";
    $jum = "";
    $terkirim = false;
    for ($i=0; $i < count($nama_menu); $i++) { 
        $menu = $nama_menu[$i];
        $jum = $jml[$i];
        $InsertQuery = $query."('$id_pemesan','$menu',$jum,$total,'$atas_nama','$alamat','$no_hp','$keterangan','Belum Diterima');";
        if($conn -> query($InsertQuery)){
            $terkirim = true;
        }
    }
    if ($terkirim == true) {
        header('location:../../index.php?pesan=terkirim');
    }else {
        header('location:../../index.php?pesan=gagal');
    }
?>