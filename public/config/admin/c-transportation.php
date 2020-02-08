<?php  
	require_once "loader.php";


	if (isset($_POST['btnAddTransportation']))
	{
		$kode = $_POST['kode'];
		$seat = $_POST['seat'];
		$ket = $_POST['ket'];
		$id_type = $_POST['id_type'];

		$result_transportation = $transportation->addTransportation2($kode, $seat, $ket, $id_type);

		if ($result_transportation)
		{
			$_SESSION['message'] = 'Add Data Success';

			header("location: ../../admin-page/transportation-page.php");
		}
		else
		{
			$_SESSION['message2'] = 'Failed to Add Data';

			header("location: ../../admin-page/transportation-page.php");
		}
	}

?>