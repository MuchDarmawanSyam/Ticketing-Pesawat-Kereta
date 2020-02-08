<?php  
	session_start();
	/*
	|
	|	//==================================================================================================================//
	|	//============================================= ASSEMBLY FRAMEWORK =================================================//
	|	//==================================================================================================================//
	|
	|	 								|												|
	|	 								|	FOR USING THIS TECH ON YOUR FIRST TIME  	|
	|	 								|			READ THE DOCUMENTATION				|
	|	 								|												|
	|	 								|	DEVELOPMENT BY MUCH DARMAWAN IRIANSYAH SYAM	|
	|	 								|												|
	|
	|
	|
	|
	|
	|
	|			|		LOADER  PART		 |
	*/

		// Load Config First
		require_once __DIR__."\config.php";

		// Load Connection
		require_once CORE_PATH."\Assembly_Core\connection.php";

		// Load Cores
		foreach (AUTO_LOAD as $core) {

			require_once CORE_PATH."\Assembly_Core\Class\class.".$core.".php";

		}


	/*
	|
	|
	|
	|
	|
	|	 								|												|
	|	 								|	DEVELOPMENT BY MUCH DARMAWAN IRIASYAH SYAM	|
	|	 								|			COPYRIGHT 2020 ASEMBLY TEAM			|
	|	 								|												|
	|	 								
	|	 								
	|
	|
	|
	|
	|
	|
	|
	|
	|			|		CORES TO LOAD		 |
	*/
		// DISINI NANTI ISI OBJEK DARI KLAS YANG DILOAD
		$crud = new crud();
		$data = new data();
		$auth = new Auth();
?>