<?php 
	session_start();

	
	$_SESSION['message2'] = NULL;
	$_SESSION['status'] = NULL;
	$_SESSION['id'] = NULL;
	$_SESSION['page-from-admin'] = NULL;
	$_SESSION['message'] = 'Logout Success';
	$fromPage = $_SESSION['page-from'];

	header("location: $fromPage");
?>