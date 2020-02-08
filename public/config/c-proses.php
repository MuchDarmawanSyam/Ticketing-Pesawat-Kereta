<?php
	session_start();
	require_once "../core/execute.php";

	//Dapatkan Penumpang
	 $get_penumpang = $user->get_all_data();


	// == REGISTER == //
	if (isset($_POST['btnRegister']))
	{
		$no_telps = $_POST['no_telp_dpn'] . $_POST['no_telp_blkng'];
		$id = '';
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tgl = $_POST['tgl'];
		$no_telp = $no_telps;
		$no_ktp = $_POST['no_ktp'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$id_img = 1;

		if ($cpassword !== $password)
		{
			$_SESSION['message'] = 'Confirm Password MUST Same with Password';
			header("location: ../form-register.php");
		}else{

					$_SESSION['message'] = '';

					//CONVERT
					$dates = $date->date_convert_db($tgl);

					//INSERT
					$reg_res = $core->register($id, $username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img);
					if ($reg_res == true)
					{
						$_SESSION['message'] = 'Register Success';
						header("location: ../index.php");
					}else{

						$_SESSION['message'] = 'Register Failed, Try Again';
						header("location: ../form-register.php");
					}

			}
		}



	// == LOGIN == //
	if (isset($_POST['btnLogin']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($core->login($username, $password))
		{
			$nama = $core->login($username, $password)['nama_penumpang'];

			$_SESSION['message'] = 'Selamat Datang '.$nama.', Anda Berhasil Login';
			$_SESSION['message2'] = NULL;
			$_SESSION['status'] = 'Logged';
			$_SESSION['id'] = $username;
			$_SESSION['id-account'] = $core->login($username, $password)['id_penumpang'];

			header("location: $fromPage");
		}else{
			$_SESSION['message2'] = 'Login Failed';
			$_SESSION['message'] = NULL;

			header("location: $fromPage");
		}
	}



	// elseif ($core->login_petugas($username, $password)['id_level'] == 1)
	// 	{
	// 		$_SESSION['message'] = 'Selamat Datang Admin';
	// 		$_SESSION['message2'] = NULL;
	// 		$_SESSION['status'] = 'AdminLogged';
	// 		$_SESSION['id'] = $username;

	// 		header("location: ../admin-page/index.php");
	// 	}elseif ($core->login_petugas($username, $password)['id_level'] == 2)
	// 	{
	// 		$_SESSION['message'] = 'Selamat Datang Petugas';
	// 		$_SESSION['message2'] = NULL;
	// 		$_SESSION['status'] = 'PetugasLogged';
	// 		$_SESSION['id'] = $username;

	// 		header("location: ../admin-page/index.php");
	// 	}
?>