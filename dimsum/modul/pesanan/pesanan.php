<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/pesanan/aksi_pesanan.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "select * from pesanan");
    $tampil_harga = mysqli_query($conn, "SELECT id_pesanan,pesanan.nama_menu,harga FROM pesanan,menu
    WHERE pesanan.nama_menu = menu.nama_menu
    ORDER BY id_pesanan ASC");
    $hitung = mysqli_num_rows($tampil);
	echo"<h3 ><span class='glyphicon glyphicon-th-list'></span> Daftar Pesanan</h3>";
?>
<style>
    #tabel-pesanan tr td{
        text-align: center;
    }
</style>
<table id="tabel-pesanan" class="table table-hover">
		<thead>
                <th class="col-md-1"><center>Id</th>
				<th class="col-md-2"><center>Atas Nama</th>
				<th class="col-md-2"><center>Nama Menu</th>
				<th class="col-md-1"><center>Harga</th>
				<th class="col-md-1"><center>Jumlah</th>
				<th class="col-md-1"><center>Total</th>
				<th class="col-md-3"><center>Alamat</th>
				<th class="col-md-2"><center>No Hp</th>
				<th class="col-md-2"><center>Keterangan</th>
				<th class="col-md-2"><center>Status</th>
		</thead>
		<tbody>
<?php
    $id_pesanan = array();
    $atas_nama = array();
    $nama_menu = array();
    $harga = array();
    $jumlah = array();
    $total_harga = array();
    $alamat_pembeli = array();
    $no_hp = array();
    $keterangan = array();
    $status = array();
    while($r = mysqli_fetch_array($tampil_harga)){
        $harga[] = $r['harga'];
    }
	while($r = mysqli_fetch_array($tampil)){
        $id_pesanan[] = $r['id_pesanan'];
        $atas_nama[] = $r['atas_nama'];
        $nama_menu[] = $r['nama_menu'];
        $jumlah[] = $r['jumlah'];
        $total_harga[] = $r['total_harga'];
        $alamat_pembeli[] = $r['alamat_pembeli'];
        $no_hp[] = $r['no_telp_pembeli'];
        $keterangan[] = $r['keterangan'];
        $status[] = $r['status'];
    }
    for ($i=0; $i < $hitung; $i++) { 
        if ($i==0) {
            echo"
                <tr>
                    <td>$id_pesanan[0]</td>
                    <td>$atas_nama[0]</td>
                    <td>$nama_menu[0]</td>
                    <td>$harga[0]</td>
                    <td>$jumlah[0]</td>
                    <td>$total_harga[0]</td>
                    <td>$alamat_pembeli[0]</td>
                    <td>$no_hp[0]</td>
                    <td>$keterangan[0]</td>
                    <td>$status[0]</td>
                </tr>
            ";
        }elseif ($atas_nama[$i]==$atas_nama[$i-1]) {
            echo"
                <tr>
                    <td></td>
                    <td></td>
                    <td>$nama_menu[$i]</td>
                    <td>$harga[$i]</td>
                    <td>$jumlah[$i]</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            ";
        }else{
            echo"
                <tr>
                    <td>$id_pesanan[$i]</td>
                    <td>$atas_nama[$i]</td>
                    <td>$nama_menu[$i]</td>
                    <td>$harga[$i]</td>
                    <td>$jumlah[$i]</td>
                    <td>$total_harga[$i]</td>
                    <td>$alamat_pembeli[$i]</td>
                    <td>$no_hp[$i]</td>
                    <td>$keterangan[$i]</td>
                    <td>$status[$i]</td>
                </tr>
            ";
        }
    }
	/*echo"
		<tr>
			<td>$r[atas_nama]</td>
			<td>$r[nama_menu]</td>
			<td>$r[harga]</td>
			<td>$r[jumlah]</td>
			<td>$r[total_harga]</td>
			<td>$r[alamat_pembeli]</td>
			<td>$r[no_telp_pembeli]</td>
			<td>$r[keterangan]</td>
			<td>$r[status]</td>
		</tr>
	";*/
						
	break;
	
	case "pesan":
	echo"<h2 class='head'>Pesan Menu</h2>
	<form method='POST' action='$aksi?dorayaki=pesanan&act=input'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='name'>Nama Menu</label>
			<input type='text' class='form-control' id='nama' placeholder='Nama Menu' name='nama' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='kategori'>Kategori</label>
			<input type='text' class='form-control' id='kategori' placeholder='Kategori' name='kategori' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-top:20px;margin-bottom:20px;'>
			<label for='deskripsi'>Deskripsi</label>
			<input type='text' class='form-control' id='deskripsi' placeholder='Deskripsi' name='deskripsi' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-top:20px;margin-bottom:20px;'>
			<label for='harga'>Harga</label>
			<input type='text' class='form-control' id='harga' placeholder='Harga' name='harga' required />
			</div>
		</div>
		<div class='col-sm-12'>
		<button type='submit' class='btn btn-primary q'>Pesan</button>
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>

	</form>";
	
	break;
	}
}	
?>