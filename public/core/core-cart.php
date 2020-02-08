<?php  
	require_once "database.php";

	class cart{

		public $dbHost = host;
		public $dbRoot = root;
		public $dbPass = pass;
		public $dbName = db;
		public $conn;

		public function __construct(){

			$this->connect();

		}

		private function connect(){

			$this->conn = new mysqli($this->dbHost, $this->dbRoot, $this->dbPass, $this->dbName);

		}

		public function addCart($id_cart, $id_cart_tiket, $id_penumpang, $tgl_tandai){

			$stmt = $this->conn->prepare("INSERT INTO `cart_tiket` (id_cart_tiket, id_rute, id_penumpang, tgl_tandai) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("iiis", $id_cart, $id_cart_tiket, $id_penumpang, $tgl_tandai);
			if ($stmt->execute())
			{
				$stmt->close();
				$this->conn->close();

				return true;
			}
		}

		public function deleteCart($id, $id_user){

			$stmt = $this->conn->prepare("DELETE FROM `cart_tiket` WHERE id_rute = ? AND id_penumpang = ?");
			if (isset($stmt) !== FALSE && $stmt !== NULL)
			{
				$stmt->bind_param("ii", $id, $id_user);
				$stmt->execute();

				$stmt->close();

				return true;
			}
		}

	}

?>