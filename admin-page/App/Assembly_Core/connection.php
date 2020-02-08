<?php

/*
	|
	|	//==================================================================================================================//
	|	//============================================= ASSEMBLY FRAMEWORK =================================================//
	|	//==================================================================================================================//
	|
	|	 								|												|
	|	 								|	  DO NOT MAKE ANY CHANGE ON THIS PAGE 		|
	|									|												|
	|	 								|  DEVELOPMENT BY MUCH DARMAWAN IRIANSYAH SYAM	|
	|	 								|												|
	|	 								
	|	 								
	|
	|
	|
	|
	|
	|
	|			|		CONNECTION		 |
*/  

	class Connection {

		public $conn;

		public function __construct(){

			$this->conn = new mysqli (ASSEMBLY_DATABASE['DBHost'], ASSEMBLY_DATABASE['DBUser'], ASSEMBLY_DATABASE['DBPass'], ASSEMBLY_DATABASE['DBName']);

		}

	}

?>
