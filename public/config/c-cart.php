<?php  session_start();
	require_once "../core/execute.php";

	// Add to Cart
	if (isset($_POST['btnAddCart']))
	{
		$id = '';
		$id_rute_cart = $_POST['id_rute_cart'];
		$id_user = $_POST['id_user'];
		$date_cart = $_POST['date_cart'];

		$res = $cart->addCart($id, $id_rute_cart, $id_user, $date_cart);

		if ($res == true)
		{
			$_SESSION['message'] = 'Telah Ditambahkan ke Cart';

			header("location: ../detail-tiket.php?id=$id_rute_cart");
		}
		else{
			echo "Gagal";
		}
	}

	// Delete From Cart
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$id_user = $_GET['id_user'];

		$res = $cart->deleteCart($id, $id_user);

		if ($res == true)
		{
			$_SESSION['message'] = 'Telah Terhapus Dari Cart';
			header("location: ../cart-tiket.php?$id_user");
		}
	}
?>