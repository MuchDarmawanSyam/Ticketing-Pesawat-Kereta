<?php  

	class {

		public $conn;

		public function __construct()
		{

			$this->connect();

		}

		public function connect()
		{

			$this->conn = new mysqli('localhost', 'root', '', 'db_latihan_ukk_tickect');

		}

	}

?>