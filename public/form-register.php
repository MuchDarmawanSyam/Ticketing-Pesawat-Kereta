<?php  
	session_start();
	require_once "core/execute.php";
	$date = date("Y/m/d");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tickects - Register</title>
	<link rel="stylesheet" href="asset/library/custom/custom.css">
	<link rel="stylesheet" href="asset/library/materialize/css/materialize.css">
	<link rel="stylesheet" href="asset/library/assets/css/themify-icons.css">
</head>
<body>

	<!--NAVBAR-->
<!-- 	<nav>
		<div class="nav-wrapper teal nav-sticky">
			<a href="index.php" class="brand-logo">SamehadaTiket.net</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="#" class="waves-effect waves-light ">Test 1</a></li>
				<li><a href="#" class="waves-effect waves-light ">Test 2</a></li>
				<li><a href="#" class="waves-effect waves-light">Test 3</a></li>
			</ul>
		</div>
	</nav> -->

	<!--SHOW MESSAGE-->
	<?php  
		if (isset($_SESSION['message'])) {
	?>
		<div class="center red darken-2 white-text">
			<?php echo $_SESSION['message']; ?>
		</div>
	<?php
		}
	?>

	<!--FORM REGISTER-->
	<div class="wrapper-register center teal">
		<h3 class="white-text-login">REGISTER FORM</h3>
		<a href="index.php#modal1" class="ti ti-user register-button-right"></a>
		<hr class="hr-form-login">
	
	<form action="config/c-proses.php" method="POST">
	<div class="input-form-login">
		<div>
			<label for="nama" class="label-white">Nama Lengkap :</label>
				<input type="text" name="nama" placeholder="Much Darmawan" id="nama">
		</div>
			<br>
		<div>
			<label for="alamat" class="label-white">Alamat :</label>
				<input type="text" name="alamat" placeholder="Jalan Tasangkapura" id="alamat">
		</div>
		<br>
		<div>
			<label for="jenis_kelamin" class="label-white">Jenis Kelamin :</label>
				<select name="jenis_kelamin" class="select-block">
					<option value="L">Laki Laki</option>
					<option value="P">Perempuan</option>
				</select>
		</div>
		<br>
		<div>
			<label for="tgl_lahir" class="label-white">Tanggal Lahir :</label>
				<input type="date" name="tgl" class="white-form-date" value="<?php echo $date; ?>" id="alamat">
		</div>
		<br>
		<div>
			<label for="no_ktp" class="label-white">No KTP :</label>
				<input type="text" name="no_ktp" id="no_ktp" placeholder="No KTP">
		</div>
		<br>
		<div>
			<label for="no_telp" class="label-white">No Telepon :</label>
			<br>
			<select name="no_telp_dpn" class="select-block-small">
				<option value="08" selected="selected">+62</option>
			</select>
				<input type="text" name="no_telp_blkng" placeholder="No Telepon" id="no_telp">
		</div>
		<br>
		<br>
		<div>
			<label for="username" class="label-white">Username Akun :</label>
				<input type="text" name="username" placeholder="Username" id="username">
		</div>
		<br>
		<div>
			<label for="password" class="label-white">Password Akun :</label>
				<input type="password" name="password" placeholder="Password" id="password">
		</div>
		<br>
		<div>
			<label for="confirm" class="label-white">Confirm Password Akun :</label>
				<input type="password" name="cpassword" placeholder="Konfirmasi" id="confirm">
		</div>
			<br>
			<br>
		<div>
			<input type="submit" name="btnRegister" class="waves-effect waves-light btn green darken-1" value="Register">
		</div>
	</div>
	</form>

	
	<script src="asset/library/materialize/js/materialize.min.js"></script>
	<script src="asset/library/jquery/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function (){
			$('.wrapper-register').hide().fadeIn(1000);
		});
	</script>
</body>
</html>