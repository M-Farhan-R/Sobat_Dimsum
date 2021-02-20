<?php
include "config/connect.php";

if ($_SESSION['leveluser']=='1'){
	if($_GET['dimsum']=="profil"){
	include "modul/profil/profil.php";
	}
	if($_GET['dimsum']=="menu"){
	include "modul/menu/view_menu.php";
	}
	if($_GET['dimsum']=="pesanan"){
	include "modul/pesanan/pesanan.php";
	}
}

if ($_SESSION['leveluser']=='2'){
	if($_GET['dimsum']=="profil"){
	include "modul/profil/profil.php";
	}
	if($_GET['dimsum']=="menu"){
	include "modul/menu/view_menu.php";
	}
}
?>