<?php  
	session_start();

	require_once "../../core/admin-core/user.php";
	require_once "../../core/admin-core/type.php";
	require_once "../../core/admin-core/transportation.php";
	require_once "../../core/admin-core/officer.php";
	require_once "../../core/admin-core/route.php";

	//INISIASI

	$user = new adminUser();
	$type = new adminType();
	$transportation = new adminTransportation();
	$off = new adminOfficer();
	$route = new route();


	//LOADER PENUNJANG

		//script untuk data admin
		$id_login = $_SESSION['id'];
		$data_login = $user->get_petugas_by_id_login($id_login);
		$fetch_data_admin = $data_login->fetch_assoc();
?>