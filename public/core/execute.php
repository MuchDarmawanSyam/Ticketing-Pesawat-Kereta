<?php 
//================================================
	// Panggil Class Utama
	require_once "core.php";
	require_once "core-cart.php";
	require_once "core-user.php";
	require_once "core-carousel.php";
	require_once "core-filter.php";

	//Kembalikan Ke Halaman Admin Jika Masuk Halaman Index Sesudah Keluar Web
	if ($_SESSION['status'] == 'AdminLogged' || $_SESSION['status'] == 'PetugasLogged')
        {

        	$frompage = $_SESSION['page-from-admin'];

            header("location: $frompage");

        }
    
    //Halaman Asal
	$fromPage = $_SESSION['page-from'];

//=================================================
//=================================================
//=================================================
//=================================================
//=================================================
//=================================================
	// Eksekusi Class Utama
	$core = new core();
	// Eksekusi Class Date
	$date = new date();
	// Eksekusi Class Session
	$session = new session();
	// Eksekusi Class Crud_Harga_Waktu
	$crud_pt = new crud_harga_waktu();
//=================================================|
//=================================================
//=================================================
	// Eksekusi Class Utama
	$cart = new cart();
//=================================================|
//=================================================|
//=================================================|
	// Eksekusi Class Utama
	$user = new user();
//=================================================|
//=================================================|
//=================================================|
	// Eksekusi Class Carousel
	$carousel = new carousel();
//=================================================|
//=================================================|
//=================================================|
//=================================================|
//=================================================|
//=================================================|
	// Eksekuasi Class Filter
	$filter = new filter(); 
//=================================================|
//==Dimohon Untuk Tidak Menggunakan Variabel Atau==|
//===========Mengubah Isi File Ini !!!!============|
//=================================================|
//=================================================|
//=================================================|
//==================DEVELOP BY=====================|
//==============MUCH DARMAWAN SYAM=================|
//=================================================|
//==================SCRIPTED BY====================|
//==============MUCH DARMAWAN SYAM=================|
//=================================================|
//===================DESIGN BY=====================|
//==============MUCH DARMAWAN SYAM=================|
//=================================================|
//=================LIECENCED BY====================|
//==============MUCH DARMAWAN SYAM=================|
//=================================================|
//=================================================|
?>