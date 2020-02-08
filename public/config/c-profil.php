<?php  
	session_start();
	require_once "../core/execute.php";	


	if (isset($_POST['btnUpdateProfil']))
	{
		$id = $_POST['id'];
		$id_img = $_POST['id_img'];
		$nama =$_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tgl = $_POST['tgl'];
		$no_ktp = $_POST['no_ktp'];
		$no_telp = $_POST['no_telp'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if ($password == $cpassword) //Jika Confirm Password Valid
		{

			if ($id_img == 1) 	//Jika Fotonya Default
			{
				
				if (isset($_FILES['img_new'])){ // Jika Fotonya Default dan ingin Mengganti Dengan Profil Baru
				
					//Tambah Foto Baru
					$format = array('png','jpg','jpeg');
					$img_nama = $_FILES['img_new']['name'];
					$img_size = $_FILES['img_new']['size'];
					$img_temp = $_FILES['img_new']['tmp_name'];

					$x = explode('.', $img_nama);
					$eformat = strtolower(end($x));

					$nama_mix = "PROFILE"."-".$img_nama;

						if (empty($img_temp))
						{
							$_SESSION['message2'] = 'Change Image Failed, File is out of size OR File is not selected';
							header("location: ../form-edit-profil.php?id=$id");
						}else{

								if (strstr($nama_mix, " "))
								{
									$nama_fix = str_replace(" ", "_", $nama_mix);

										if (in_array($eformat, $format) === true)
										{
											$folder_tujuan = "../asset/database/img-profil/".$nama_fix;
											move_uploaded_file($img_temp, $folder_tujuan);

											$id_img2 = '';
											$upload1 = $user->upload_img($id_img2, $nama_fix);
											$id_img_tb = $user->get_img_profile_user_by_username($nama_fix);
											$id_img_tb2 = $id_img_tb['id_img_profil_penumpang'];

											$res = $user->update_id_img_penumpang($id, $id_img_tb2);

												if ($upload1 == true)
												{
													
													$_SESSION['message'] = 'Update Success';
													header("location: ../index.php");

												}else{
													
													$_SESSION['message2'] = 'Update Profil Failed, Try Again';
													header("location: ../form-edit-profil.php?id=$id");
												}
												
										}else{

											$_SESSION['message2'] = 'File Format JPG, PNG, OR JPEG only';
											header("location: ../form-edit-profil.php?id=$id");

										}

								}else{

										if (in_array($eformat, $format) === true)
										{
											$folder_tujuan = "../asset/database/img-profil/".$nama_mix;
											move_uploaded_file($img_temp, $folder_tujuan);

											$id_img2 = '';
											$upload1 = $user->upload_img($id_img2, $nama_mix);
											$id_img_tb = $user->get_img_profile_user_by_username($nama_mix);
											$id_img_tb2 = $id_img_tb['id_img_profil_penumpang'];

											$res = $user->update_id_img_penumpang($id, $id_img_tb2);

												if ($upload1 == true)
												{
													
													$_SESSION['message'] = 'Update Success';
													header("location: ../index.php");

												}else{
													
													$_SESSION['message2'] = 'Update Profil Failed, Try Again';
													header("location: ../form-edit-profil.php?id=$id");
												}
												
										}else{

											$_SESSION['message2'] = 'File Format JPG, PNG, OR JPEG only';
											header("location: ../form-edit-profil.php?id=$id");

										}

								}

						}

				}
					//JIka Fotonya Default Tapi Tidak Ingin Ganti Foto
					$upload2 = $user->update_profil_user($id ,$username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp);

					$_SESSION['id'] = $username;

						if ($upload2 == true)
						{

							$_SESSION['message'] = 'Update Success';
							header("location: ../index.php");	//INI YG TERBACA PADA SAAT HANYA GANTI FOTO

						}else{

							$_SESSION['message2'] = 'Update Profile Failed, c-proses.php Line 120';
							header("location: ../index.php");
						}
			
			}else{

				//Jika Id img bkan 1 Lakukan Full Update
				$format = array('png','jpg','jpeg');
				$img_nama = $_FILES['img_new']['name'];
				$img_size = $_FILES['img_new']['size'];
				$img_temp = $_FILES['img_new']['tmp_name'];

				$x = explode('.', $img_nama);
				$eformat = strtolower(end($x));

				$nama_mix = "PROFILE"."-".$img_nama;
					
					if (empty($img_temp))
						{
							$_SESSION['message2'] = 'Change Image Failed, File is out of size OR File is not selected';
							header("location: ../form-edit-profil.php?id=$id");
						}else{

							if (strstr($nama_mix, " "))
							{

								$nama_fix = str_replace(" ", "_", $nama_fix);

									if (in_array($eformat, $format) === true)
									{
										$folder_tujuan = "../asset/database/img-profil/".$nama_fix;
										move_uploaded_file($img_temp, $folder_tujuan);

										$id_img_tb = $user->get_img_profile_user_by_username($nama_fix);
										$id_img_tb2 = $id_img_tb['id_img_profil_penumpang'];

										$upload3 = $user->update_profil_user_full($username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img_tb2, $id);

											if ($upload3 == true)
											{
												$_SESSION['message'] = 'Update Success';
												header("location: ../index.php");
											}else{
												
												$_SESSION['message'] = 'Update Profile Failed, c-proses.php Line 172';
												header("location: ../index.php");											
											}
									}else{

											$_SESSION['message2'] = 'File Format JPG, PNG, OR JPEG only';
											header("location: ../form-edit-profil.php?id=$id");

										}

							}else{

								if (in_array($eformat, $format) === true)
									{
										$folder_tujuan = "../asset/database/img-profil/".$nama_mix;
										move_uploaded_file($img_temp, $folder_tujuan);

										$update_img = $user->update_to_img_profil_by_id($nama_mix, $id_img);

										$id_img_tb = $user->get_img_profile_user_by_username($nama_mix); 
										$id_img_tb2 = $id_img_tb['id_img_profil_penumpang']; 

										$upload3 = $user->update_profil_user_full($username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img_tb2, $id);

										$_SESSION['id'] = $username;

											if ($upload3 == true)
											{
												$_SESSION['message'] = 'Update Success';
												header("location: ../index.php");
											}else{
												
												$_SESSION['message2'] = 'Update Profile Failed, c-proses.php Line 172';
												header("location: ../index.php");	 									
											}
									}else{

											$_SESSION['message2'] = 'File Format JPG, PNG, OR JPEG only';
											header("location: ../form-edit-profil.php?id=$id");

										}

							}

						}

			}

		}else{
			$_SESSION['message2'] = 'Confirm Password Must Same With Password';
			header("location: ../form-edit-profil.php?id=$id");
		}

	}else{
		header("location: ../index.php");
	}

?>