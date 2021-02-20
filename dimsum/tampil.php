<!DOCTYPE html>
<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=index.php'>";  
}
else{
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>SOBAT DIMSUM</title>
    <link rel="icon" href="material/images/icon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="css/AdminLTE.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/dataTables.bootsrap.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">	

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.form.js"></script>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			$(document).ready( function () {
				$('#tabel').DataTable({
				})
			});
		</script>
	</head>
	<body background-color=#EEF353>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#	" class="navbar-brand">SOBAT DIMSUM</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Selamat Datang, <?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>


	
		<div class="row">
		<div class="col-md-2">
			<div class="row"> 
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="material/images/wp.jpeg">
					</a>
				</div>
			</div>

	<?php
	if ($_SESSION['leveluser']=='1'){
	?>


		<ul class="nav nav-pills nav-stacked" style="width:180px;" >
				<!--<li><a href="?dimsum=profil"><span class="glyphicon glyphicon-home"> Profil</a></li>!-->
				<li class="treeview">
				<li><a href="?dimsum=menu"><span class="glyphicon glyphicon-th-list"> Daftar Menu</a></li>
				<li><a href="?dimsum=pesanan"><span class="glyphicon glyphicon-th-list"> Daftar Pesanan</a></li>
		        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
		</ul>
	<?php } ?>
	<?php
	if ($_SESSION['leveluser']=='2'){
	?>
		<ul class="nav nav-pills nav-stacked" style="width:180px;">
				<li><a href="?dimsum=menu"><span class="glyphicon glyphicon-tasks"> Daftar Menu</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
		</ul>
	<?php } ?>		
		</div>
		
		<div class="col-sm-10">
			<?php include "data.php"; ?>
		</div>
		</div> 
	</div>
	
</body>
</html>
<?php } ?>