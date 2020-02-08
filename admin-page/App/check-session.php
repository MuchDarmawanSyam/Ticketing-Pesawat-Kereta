<?php  
	session_start();

	if ($_SESSION['login_status']){

		if ($_SESSION['lvl_login'] == 'Admin'){
			
			 header("location: index.php");
		}elseif ($_SESSION['lvl_login'] == 'Pegawai'){
			
			header("location: index.php");
		}else{

			header("location: login.php");
		}
			
	}else{

		header("location: login.php");
	}

?>