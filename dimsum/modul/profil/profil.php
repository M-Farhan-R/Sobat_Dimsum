<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<h2 class='head' align="Center">Profil</h2>
<?php
$baca=mysqli_query($conn, "select * from user where username='$_GET[username]'");
$r = mysqli_fetch_array($baca);
echo"<div class='form-group'>
		<div class='col-sm-8' style='margin-bottom:20px;'>
		<label>Nama User</label>
		<input type='text' id='nama' placeholder='$username' name='nama' value='$r[username]' required />
		</div>
	</div>";
?>