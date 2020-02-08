<?php  

	require_once "loader.php";

	if (isset($_POST['btnAddRoute'])){

		$dest = strtoupper($_POST['dest']);
		$from = strtoupper($_POST['from']);
		$first_route = strtoupper($_POST['first_route']);
		$final_route = strtoupper($_POST['final_route']);
		$price = $_POST['price'];
		$date = $_POST['date'];
		$time = $_POST['jam'].':'.$_POST['menit'].':'.'00';
		$status = $_POST['status'];
		$id_trans = $_POST['id_trans'];


		$result_add_route = $route->addRoute($dest, $from, $first_route, $final_route, $price, $date, $time, $status, $id_trans);



		if ($result_add_route)
		{
			$_SESSION['message'] = 'Data Berhasil Ditambahkan';

			header("location: ../../admin-page/routes-page.php");
		}
		else
		{
			$_SESSION['message2'] = 'Data Gagal Ditambahkan';

			header("location: ../../admin-page/routes-page.php");
		}

	}

?>