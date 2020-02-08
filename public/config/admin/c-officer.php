<?php  
	require_once "loader.php";

	if (isset($_POST['btnAddOfficer']))
	{
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$format = array('png','jpg','jpeg');
		$nama_gmbr = $_FILES['pic']['name'];
		$ukuran = $_FILES['pic']['size'];
		$temp = $_FILES['pic']['tmp_name'];

		$x = explode('.', $nama_gmbr);
		$eformat = strtolower(end($x));

		$acak = 'PROFIL-PETUGAS';
		$nama_acak = $acak."_".$nama_gmbr;

		if (empty($temp))
		{
			echo "<script>alert('File Tidak Ditemukan Atau Ukuran File Terlalu Besar (MAX 2 MB) !');
				  document.location.href='../../admin-page/officer-page.php';
		  		  </script>";
		}
		else
		{
			if (strstr($nama_acak, " "))
			{
				$nama_fix = str_replace(" ", "_", $nama_acak);

				if (in_array($eformat, $format) === TRUE)
				{
					$folder_tujuan = "../../asset/database/img-profil/profil-admin/".$nama_fix;

					move_uploaded_file($temp, $folder_tujuan);
					$ex = $off->addOfficer($nama, $username, $password, $nama_fix);

					if ($ex) 
					{
						$_SESSION['message'] = 'Add Data Success';

						header("location: ../../admin-page/officer-page.php");
					}
					if (!$ex) 
					{
						$_SESSION['message2'] = 'Failed Add Data';

						header("location: ../../admin-page/officer-page.php");
					}
				}
				else
				{
					echo "<script>alert('Format File Tidak Mendukung !, Format(jpg, jpeg, png)');
				 				  document.location.href='../index.php';
		  		 		  </script>";
				}
			}
			else
			{
				if (in_array($eformat, $format) === TRUE)
				{
					$folder_tujuan = "../../asset/database/img-profil/profil-admin/".$nama_acak;

					move_uploaded_file($temp, $folder_tujuan);
					$ex = $off->addOfficer($nama, $username, $password, $nama_acak);

						if ($ex) 
						{
							$_SESSION['message'] = 'Add Data Success';

							header("location: ../../admin-page/officer-page.php");
						}
						if (!$ex)
						{
							$_SESSION['message2'] = 'Failed Add Data';

							header("location: ../../admin-page/officer-page.php");
						}
				}
				else
				{
					echo "<script>alert('Format File Tidak Mendukung !, Format(jpg, jpeg, png)');
				 				  document.location.href='../index.php';
		  		 		  </script>";
				}
			}
		}
	}

?>