<?php  

	class carousel{

		public $conn;

		public function __construct(){

			$this->connect();

		}

		public function connect(){

			$this->conn = new mysqli('localhost', 'root', '', 'db_latihan_ukk_tickect');

		}

		public function addCarousel($id, $img){

			$stmt = $this->conn->prepare("INSERT INTO `img_carousel` (id_carousel, img_src) VALUES (?, ?)");
			if (isset($stmt) !== FALSE && $stmt !== NULL)
			{
				$stmt->bind_param("is", $id, $img);
				$stmt->execute();

				$stmt->close();

				return true;
			}
		}

		public function carousel(){

			$stmt = $this->conn->prepare("SELECT * FROM `img_carousel`");
			if (isset($stmt) !== FALSE && $stmt !== NULL)
			{
				$stmt->execute();
				$arr = $stmt->get_result();

				return $arr;
			}
		}
	}

?>