<?php  
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
	|			|		DATABASE CONNECTION CONFIGURATION		 |
	*/
	
		const ASSEMBLY_DATABASE	=	[

								'DBName' => 'db_latihan_ukk_tickect',			// <<== CHANGE TO YOUR DATABASE NAME
								'DBHost' => 'localhost',	// <<== THIS DEFAULT, CHANGE IF YOUR HOST IS DIFFERENT
								'DBUser' => 'root',			// <<== THIS DEFAULT, CHANGE IF YOUR DB USER IS DIFFERENT
								'DBPass' => ''				// <<== THIS DEFAULR TOO, CHANGE IF YOUR DB PASSWORD IS DIFFERENT

								];

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
	|			|		CORES TO AUTO LOAD		 |
	*/

		const AUTO_LOAD = ['crud','data','auth'];
	
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
	|			|		CORES DIRECTORY CONFIGURATION		 |
	*/

		const CORE_DIR = 'Assembly_Core';
		const SPLICE_DIR = '/';

	/*
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
	|
	|			|		CORES BASE PATH		 |
	*/
		
		const CORE_PATH = __DIR__;	// <<=== DO NOT MAKE ANY CHANGE ON THIS LINE

		$n = 0;


?>