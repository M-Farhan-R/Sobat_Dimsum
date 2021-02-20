<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/menu/aksi_menu.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "SELECT * FROM menu");
	echo"<h3 ><span class='glyphicon glyphicon-th-list'></span> Daftar Menu</h3>
	<input type=button class='btn btn-info col-md-2'value='+ Tambah Menu' onclick=\"window.location.href='?dimsum=menu&act=input';\"></a><br><br>
	";
?>
<table class="table table-hover">
		<thead>
			<th class="col-md-1"><center>Nama Menu</th>
			<th class="col-md-1"><center>Kategori</th>
			<th class="col-md-3"><center>Deskripsi</th>
			<th class="col-md-1"><center>Harga</th>
			<th class="col-md-1"><center>Gambar</th>
			<th class="col-md-1"><center>Opsi</th>
		</thead>
		<tbody>
<?php
	while($r = mysqli_fetch_array($tampil)){
	echo"
		<tr>
			<td>$r[nama_menu]</td>
			<td>$r[kategori]</td>
			<td>$r[deskripsi]</td>
			<td>Rp. $r[harga]</td>
			<td><img class='img-thumbnail' src='$r[foto]'></td>
			<td id='edit'><center><a href='?dimsum=menu&act=edit&id_menu=$r[id_menu]'><span class='glyphicon glyphicon-pencil'>&nbsp;</a>
			<a href='$aksi?dimsum=menu&act=hapus&id_menu=$r[id_menu]' onclick=\"return confirm('Anda Yakin ?')\"><span class='glyphicon glyphicon-trash'></a></td>
		
		</tr>
	";
	}					
	break;
	
	case "input":
	echo"<h2 class='head'>Tambah Menu</h2>
	<form method='POST' action='$aksi?dimsum=menu&act=input' enctype='multipart/form-data'>
		<div class='form-group'>
			<div class='col-sm-2'>
			<label for='name'>Nama Menu</label>
			<input type='text' class='form-control' id='nama_menu' placeholder='Nama Menu' name='nama_menu' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-2'>
			<label for='kategori'>Kategori</label>
			<br>
				<select name='kategori' id='kategori' required />
					<option value=''>Pilih Kategori</option>
					<option value='Makanan'>Makanan</option>
					<option value='Minuman'>Minuman</option>
				</select>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-4'>
			<label for='deskripsi'>Deskripsi</label>
			<input type='text' class='form-control' id='deskripsi' placeholder='Deskripsi' name='deskripsi' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-2'>
			<label for='harga'>Harga</label>
			<input type='text' class='form-control' id='harga' placeholder='Harga' name='harga' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-3' style='margin-top:20px;margin-bottom:20px;'>
			<label for='foto'>Gambar</label>
			<input type='file' id='foto' name='foto' accept='.jpg, .png' required />
			</div>
		</div>
		<div class='col-sm-12'>
		<button type='submit' class='btn btn-primary q'>Tambahkan Menu</button>
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>

	</form>";
	
	break;
	
	case "edit":
	$baca=mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
	$r=mysqli_fetch_array($baca);
	echo"<h2 class='head'>Edit Menu</h2>
	<table border='1'>
	<Form method='POST' action='$aksi?dimsum=menu&act=edit&id_menu=$r[id_menu]' enctype='multipart/form-data'>
		<div class='form-group'>
			<div class='col-sm-2'>
			<label for='nama'>Nama Menu</label>
			<input type='text' class='form-control' id='nama_menu' placeholder='Nama Menu' name='nama_menu' value='$r[nama_menu]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-2'>
			<label for='kategori'>Kategori</label>
			<br>
				<select name='kategori' id='kategori' value='$r[kategori]' required />
					<option value=''>Pilih Kategori</option>
					<option value='Makanan'>Makanan</option>
					<option value='Minuman'>Minuman</option>
				</select>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-4'>
			<label for='deskripsi'>Deskripsi</label>
			<input type='text' class='form-control' id='deskripsi' placeholder='Deskripsi' name='deskripsi' value='$r[deskripsi]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-3'>
			<label for='harga'>Harga</label>
			<input type='text' class='form-control' id='harga' placeholder='Harga' name='harga' value='$r[harga]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-3' style='margin-top:20px;margin-bottom:20px;'>
			<label for='foto'>Gambar</label>
			<input type='file' id='foto' name='foto' accept='.jpg, .png' />
			</div>
		</div>";
	echo"
		<div class='col-sm-12' style='margin-top:20px;'>
		<button type=submit class='btn btn-info'>Update </button>&nbsp;
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>
	</form>
	</table>";
	
	break;

	case "hapus":
	break;
	}
}	
?>