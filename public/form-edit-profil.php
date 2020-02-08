<?php  
	session_start();
	require_once "core/execute.php";

	//get data user
	$id = $_GET['id'];
	$user = $user->get_all_data_user_id($id);

	$id_img = $user['id_img_profil_penumpang'];

	//UNTUK SEMENTARA NATIVE PROSEDURAL NANTI SAYA FIX
	 $conn = mysqli_connect('localhost', 'root', '', 'db_latihan_ukk_tickect');
	 $sql = "SELECT * FROM `img_profil_penumpang` WHERE id_img_profil_penumpang = '$id_img'";
	 $eksekusi = mysqli_query($conn, $sql);
	 $fetch_img = mysqli_fetch_assoc($eksekusi);
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


	<!--SHOW MESSAGE-->
	<?php  
		if (isset($_SESSION['message']) || $_SESSION['message2']) {
	?>
		<div class="center red darken-2 white-text">
			<?php echo $_SESSION['message']; ?>
		</div>
	<?php
		}
	?>

	<!--FORM REGISTER-->
	<div class="body-edit center teal" id="fade">
		<a href="index.php" class="ti ti-user edit-button-right"></a>
		<center><h3 class="white-text-login">FORM EDIT PROFILE</h3></center>
		<hr class="hr-form-login">
	
	<form action="config/c-profil.php" method="POST" enctype="multipart/form-data">
	<div class="input-form-login">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="id_img" value="<?php echo $id_img; ?>">
		<div>
			<label for="" class="label-white">Profil Saat Ini :</label>
			<img src="asset/database/img-profil/<?php echo $fetch_img['img_src']; ?>" width="150" height="120" alt="">
		</div>
		<br>
		<div>
			<label for="img" class="label-white">Profil Baru 	:</label>
			<br>
			<input type="file" name="img_new" value="Browse Image.." id="img">
		</div>
		<br>
		<div>
			<label for="nama" class="label-white">Nama Lengkap :</label>
			<input type="text" name="nama" placeholder="Much Darmawan" value="<?php echo $user[
			'nama_penumpang']; ?>" id="nama">
		</div>
			<br>
		<div>
			<label for="alamat" class="label-white">Alamat :</label>
				<input type="text" name="alamat" placeholder="Jalan Tasangkapura" value="<?php echo $user[
			'alamat_penumpang']; ?>" id="alamat">
		</div>
		<br>
		<div>
			<?php 
			if ($user['jenis_kelamin'] == "L")
			{
			?>
			<label for="jenis_kelamin" class="label-white">Jenis Kelamin :</label>
				<select name="jenis_kelamin" class="select-block">
					<option value="L" selected="selected">Laki Laki</option>
					<option value="P">Perempuan</option>
				</select>
			<?php 
			}else{
			?>
			<label for="jenis_kelamin" class="label-white">Jenis Kelamin :</label>
				<select name="jenis_kelamin" class="select-block">
					<option value="L">Laki Laki</option>
					<option value="P" selected="selected">Perempuan</option>
				</select>
			<?php 
			} 
			?>
		</div>
		<br>
		<div>
			<label for="tgl_lahir" class="label-white">Tanggal Lahir :</label>
				<input type="text" name="tgl" class="white-form-date" value="<?php echo $user[
			'tanggal_lahir']; ?>" id="tgl_lahir" placeholder="YY/mm/dd">
		</div>
		<br>
		<div>
			<label for="no_ktp" class="label-white">No KTP :</label>
				<input type="text" name="no_ktp" id="no_ktp" value="<?php echo $user[
			'no_ktp']; ?>" placeholder="No KTP">
		</div>
		<br>
		<div>
			<label for="no_telp" class="label-white">No Telepon :</label>
				<input type="text" name="no_telp" placeholder="No Telepon" value="<?php echo $user[
			'telefone']; ?>" id="">
		</div>
		<br>
		<br>
		<div>
			<label for="username" class="label-white">Username Akun :</label>
				<input type="text" name="username" placeholder="Username" value="<?php echo $user[
			'username']; ?>" id="username">
		</div>
		<br>
		<div>
			<label for="password" class="label-white">Password Akun :</label>
				<input type="password" name="password" placeholder="Password" value="<?php echo $user[
			'password']; ?>" id="password">
		</div>
		<br>
		<div>
			<label for="confirm" class="label-white">Confirm Password Akun :</label>
				<input type="password" name="cpassword" placeholder="Konfirmasi" id="confirm">
		</div>
			<br>
			<br>
		<div>
			<input type="submit" name="btnUpdateProfil" class="waves-effect waves-light btn green darken-1" value="Update Profil">
		</div>
	</div>
	</form>

	
	<script src="asset/library/materialize/js/materialize.min.js"></script>
	<script src="asset/library/jquery/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function (){
			$('#fade').hide().fadeIn(1000);
		});
	</script>
</body>
</html>