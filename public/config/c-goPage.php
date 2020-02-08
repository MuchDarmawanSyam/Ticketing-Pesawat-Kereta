<?php  

	if (isset($_GET['btnGoPage']))
	{
		$topage = $_GET['go-page'];
		$frompage = $_GET['from-page'];

		if (strstr($topage, "#"))
		{
			$_SESSION['message2'] = 'Halaman Yang Dituju Tidak Ditemukan / Belum Tersedia';
			header("location: $frompage");
		}
		else
		{
			header("location: $topage");
		}
	}
?>