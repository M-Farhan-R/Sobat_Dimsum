<?php 
include "../../config/connect.php";
$module=$_GET['dimsum'];
$act=$_GET['act'];
session_start();

// http://localhost/dimsum/modul/menu/aksi_menu.php?dimsum=menu&act=input
if($module=='menu' AND $act=='input' ){
	$target = "../../material/images/".basename($_FILES['foto']['name']);
	//	Proses upload	
	if(move_uploaded_file($_FILES['foto']['tmp_name'], $target)){
	$img = "material/images/".basename($_FILES['foto']['name']);
	mysqli_query($conn, "INSERT INTO menu (id_menu,nama_menu,kategori,deskripsi,harga,foto)
		VALUES (NULL, '$_POST[nama_menu]', '$_POST[kategori]', '$_POST[deskripsi]', '$_POST[harga]', '$img')");
	header('location:../../tampil.php?dimsum='.$module);
	}else{
		// Jika Gagal, Lakukan :
	    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		header('location:../../tampil.php?dimsum='.$module);
	}

}elseif($module=='menu' AND $act=='edit' ){
	if (is_uploaded_file($_FILES['foto']['name'])) {
	$target = "../../material/images/".basename($_FILES['foto']['name']);
	//	Proses upload
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $target)){
			$img = "material/images/".basename($_FILES['foto']['name']);
			mysqli_query($conn, "UPDATE menu SET nama_menu='$_POST[nama_menu]', kategori='$_POST[kategori]', deskripsi='$_POST[deskripsi]', harga='$_POST[harga]', '$img' WHERE id_menu='$_GET[id_menu]'");
			header('location:../../tampil.php?dimsum='.$module);
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		}
	}else{
		mysqli_query($conn, "UPDATE menu SET nama_menu='$_POST[nama_menu]','$_POST[kategori]','$_POST[deskripsi]','$_POST[harga]' WHERE id_menu='$_GET[id_menu]'");
	}
header('location:../../tampil.php?dimsum='.$module);

}elseif($module=='menu' AND $act=='hapus' ){
	mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$_GET[id_menu]'");
	header('location:../../tampil.php?dimsum='.$module);
}


?>