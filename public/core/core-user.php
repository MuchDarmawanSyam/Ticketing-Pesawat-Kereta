<?php  
	require_once "database.php";

	class user{

		public $dbHost = host;
		public $dbRoot = root;
		public $dbPass = pass;
		public $dbName = db;
		public $conn;

		public function __construct(){

			$this->connect();

		}

		public function connect(){

			$this->conn = new mysqli($this->dbHost, $this->dbRoot, $this->dbPass, $this->dbName); 

		}

		public function get_all_data_user($session_id){  // Get Semua Data dari User yang telah Login

			$stmt = $this->conn->prepare("SELECT * FROM penumpang WHERE username = ?");
			$stmt->bind_param("s", $session_id);
			if ($stmt->execute())
			{
				$res = $stmt->get_result();
				$fetch = $res->fetch_assoc();

				return $fetch;
			}
		}

		public function get_all_data(){

			$stmt = $this->conn->prepare("SELECT * FROM penumpang");
			if ($stmt->execute())
			{
				$res = $stmt->get_result();
				$fetch = $res->fetch_assoc();

				return $fetch;
			}
		}

		public function get_all_data_user_id($id){  // Get Semua Data dari User yang telah Login

			$stmt = $this->conn->prepare("SELECT * FROM penumpang WHERE id_penumpang = ?");
			$stmt->bind_param("i", $id);
			if ($stmt->execute())
			{
				$res = $stmt->get_result();
				$fetch = $res->fetch_assoc();

				return $fetch;
			}
		}

		public function update_id_img_penumpang($id, $id_img)
		{
			$stmt = $this->conn->prepare("UPDATE `penumpang` SET id_img_profil_penumpang = ? WHERE id_penumpang = ?");
			$stmt->bind_param("ii", $id_img, $id);
			if ($stmt->execute())
			{
				$stmt->close();

				return true;
			}
		}

		public function update_profil_user_full($username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img, $id){

			$stmt = $this->conn->prepare("UPDATE `penumpang` SET username = ?, password = ?, nama_penumpang = ?, alamat_penumpang = ?, tanggal_lahir = ?, jenis_kelamin = ?, telefone = ?, no_ktp = ?, id_img_profil_penumpang = ? WHERE id_penumpang = ?");
			
			if (isset($stmt) !== FALSE && $stmt !== NULL)
			{
				$stmt->bind_param("ssssssiiii", $username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img, $id);
				$stmt->execute();
				$stmt->close();

				return true;
			}
		}

		public function update_profil_user($id ,$username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp){

			$stmt = $this->conn->prepare("UPDATE `penumpang` SET username = ?, password = ?, nama_penumpang = ?, alamat_penumpang = ?, tanggal_lahir = ?, jenis_kelamin = ?, telefone = ?, no_ktp = ? WHERE id_penumpang = ?");
			$stmt->bind_param("ssssssiii", $username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id);
			if ($stmt->execute())
			{
				$stmt->close();

				return true;
			}
		}


		public function get_img_user($id_img){

			$stmt = $this->conn->prepare("SELECT * FROM img_profil_penumpang WHERE id_img_profil_penumpang = ?");
			$stmt->bind_param("i", $id_img);
			if ($stmt->execute())
			{
				$res = $stmt->get_result();
				$fetch = $res->fetch_assoc();

				return $fetch;
			}
		}

		public function get_img_user_2($id_img){

			$stmt = $this->conn->prepare("SELECT * FROM `img_profil_penumpang` WHERE id_img_profil_penumpang = ?");
			$stmt->bind_param("i", $id_img);
			if ($stmt->execute())
			{
				$res = $stmt->get_result();
				$f = $res->fetch_array();

				return $f;
			}
		}

		public function upload_img($id_img, $img_name){

			$stmt = $this->conn->prepare("INSERT INTO `img_profil_penumpang` (id_img_profil_penumpang, img_src) VALUES (?, ?)");
			$stmt->bind_param("is", $id_img, $img_name);
			if ($stmt->execute())
			{

				return true;
			}
		}

		public function get_img_profile_user_by_username($username){

			$stmt = $this->conn->prepare("SELECT * FROM img_profil_penumpang WHERE img_src = '$username'");	
			if ($stmt->execute())
			{

				$res = $stmt->get_result();
				$fetch = $res->fetch_assoc();

				return $fetch;
			}else{
				echo "stmt NULL";
			}
		}

		public function update_to_img_profil_by_id($img, $id_img){

			$stmt = $this->conn->prepare("UPDATE img_profil_penumpang SET img_src = ? WHERE id_img_profil_penumpang = ?");
			if (isset($stmt) !== FALSE && $stmt !== NULL)
			{
				$stmt->bind_param("si", $img, $id_img);
				$stmt->execute();
				$res = $stmt->get_result();

				return true;
			}
		}

	}

?>