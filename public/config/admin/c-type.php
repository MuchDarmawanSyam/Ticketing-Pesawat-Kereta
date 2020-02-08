<?php  
	require_once "loader.php";

	if (isset($_POST['btnAddType']))
	{
		$type_data = $_POST['type'];
		$ket_data = $_POST['ket'];

		var_dump($_POST);

		$result_data = $type->addType($type_data, $ket_data);

		if ($result_data)
		{
			$_SESSION['message'] = 'Add Data Success';

			header("location: ../../admin-page/type_transportations-page.php");
		}else
		{

			$_SESSION['message2'] = 'Failed to Add Data';

			header("location: ../../admin-page/type_transportations-page.php");
		}
	}

	if (isset($_GET['btnDeleteTipe']))
	{
		$id = $_GET['id'];
		$from = $_GET['from'];

		$res = $type->deleteType($id);

		if ($res)
		{
			$_SESSION['message'] = 'Data Berhasil Dihapus';

			header("location: ../../admin-page/$from");
		}
		else
		{
			$_SESSION['message2'] = 'Data Gagal Dihapus';

			header("location: ../../admin-page/$from");
		}
	}
?>