<?php  
	require_once "database.php";

	class core{

		public $dbHost = host;
		public $dbRoot = root;
		public $dbPass = pass;
		public $dbName = db;
		public $conn;

		public function __construct()
		{
			$this->connect();
		}

		private function connect(){

			$this->conn = new mysqli($this->dbHost, $this->dbRoot, $this->dbPass, $this->dbName);
		}

		// FUNGSI REGISTER //
		public function register($id, $username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img){

			$stmt = $this->conn->prepare("INSERT INTO `penumpang` (id_penumpang, username, password, nama_penumpang, alamat_penumpang, tanggal_lahir, jenis_kelamin, telefone, no_ktp, id_img_profil_penumpang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("issssssiii", $id, $username, $password, $nama, $alamat, $tgl, $jenis_kelamin, $no_telp, $no_ktp, $id_img);
			if ($stmt->execute()) 
			{
				$stmt->close();
				$this->conn->close();

				return true;
			}
		}

		// FUNGSI LOGIN PENUMPANG//
		public function login($username, $password){

			$stmt = $this->conn->prepare("SELECT * FROM `penumpang` WHERE username = ? AND password = ?");
			$stmt->bind_param("ss", $username, $password);
			if ($stmt->execute())
			{
				$fetch = $stmt->get_result();
				$res = $fetch->fetch_assoc();


				return $res;
			}
		}

		// FUNGSI LOGIN PETUGAS//
		public function login_petugas($username, $password){

			$stmt = $this->conn->prepare("SELECT * FROM `petugas` WHERE username = ? AND password = ?");
			$stmt->bind_param("ss", $username, $password);
			if ($stmt->execute())
			{
				$fetch2 = $stmt->get_result();
				$res2 = $fetch2->fetch_assoc();

				return $res2;
			}
		}

		// FUNGSI TAMPILKAN SEMUA TIKET
		public function tiket_semua(){

			$stmt = $this->conn->prepare("SELECT * FROM `rute`");
			if ($stmt->execute())
			{
				$result = $stmt->get_result();

				return $return;
			}
		}

		// FUNGSI TAMPILKAN TIKET //
		public function tiket_khusus($id_transportasi){

			$stmt = $this->conn->prepare("SELECT * FROM `rute` WHERE id_transportasi = ?");
			$stmt->bind_param("i", $id_transportasi);
			if ($stmt->execute()) 
			{
				$result2 = $stmt->get_result();

				return $result2;
			}
		}

		// FUNGSI DAPATKAN DATA TIKET //
		public function get_tiket($id){

			$stmt = $this->conn->prepare("SELECT * FROM `rute` WHERE id_rute = ?");
			$stmt->bind_param("i", $id);
			if ($stmt->execute())
			{
				$result3 = $stmt->get_result();
				$fetch3 = $result3->fetch_assoc();

				return array(
					'tujuan' => $fetch3['tujuan'],
					'rute_awal' => $fetch3['rute_awal'],
					'asal' => $fetch3['asal'],
					'rute_akhir' => $fetch3['rute_akhir'],
					'harga' => $fetch3['harga'],
					'status_keberangkatan' => $fetch3['status_keberangkatan'],
					'id_transportasi' => $fetch3['id_transportasi'],
					'jam_berangkat' => $fetch3['jam_berangkat'],
					'tgl_keberangkatan' => $fetch3['tgl_keberangkatan']
				);
			}
		}

		// FUNGSI DAPATKAN DATA TRANSPORTASI BERDASARKAN ID //
		public function get_trans($id){

			$stmt = $this->conn->prepare("SELECT * FROM `transportasi` WHERE id_transportasi = ?");
			$stmt->bind_param("i", $id);
			if ($stmt->execute())
			{
				$result = $stmt->get_result();
				$result = $result->fetch_assoc();

				return $result;
			}
		}

		// FUNGSI DAPATKAN DATA TIKET CART //
		public function get_cart($id_penumpang){

			$stmt = $this->conn->prepare("SELECT * FROM `cart_tiket` WHERE id_penumpang = ?");
			$stmt->bind_param("i", $id_penumpang);
			if ($stmt->execute())
			{
				$result_cart = $stmt->get_result();

				return $result_cart;
			}
		}

		// FUNGSI DAPATKAN DATA id rute //
		public function get_cart_by_rute($id_rute){

			$stmt = $this->conn->prepare("SELECT * FROM `rute` WHERE id_rute = ?");
			$stmt->bind_param("i", $id_rute);
			if ($stmt->execute())
			{
				$result_cart = $stmt->get_result();

				return $result_cart;
			}
		}

		// FUNGSI DAPATKAN TIKET BERDASARKAN TANGGAL //
		public function get_tiket_by_date($date){

			$stmt = $this->conn->prepare("SELECT * FROM `rute` WHERE tgl_keberangkatan = ?");
			$stmt->bind_param("s", $date);
			if ($stmt->esecute())
			{
				$result = $stmt->get_result();

				return $result;
			}
		}

		// FUNGSI DAPATKAN TIKET BERDASARKAN TANGGAL & JENIS//
		public function get_tiket_by_date_type($date, $id_transportasi){

			$stmt = $this->conn->prepare("SELECT * FROM `rute` WHERE tgl_keberangkatan = ? AND id_transportasi = ?");
			$stmt->bind_param("si", $date, $id_transportasi);
			if ($stmt->execute())
			{
				$result = $stmt->get_result();

				return $result;
			}
		}

		// FUNGSI FILTER TIKET //
	}




	class date{

		public function date_now(){
			$date = date("m/d/Y");

			return $date;
		}

		public function date_convert_db($str){

			// $str2 = substr($str, 0, 5).substr($str, 5, 3).substr($str, 8, 2);
			// $date = str_replace("/", "", $str2);

			$pisah = explode('/', $str);
			$arr = array($pisah[2], $pisah[1], $pisah[0]);
			$date = implode('-', $arr);

			return $date;
		}
	}




	class session{

		public function null(){

			$_SESSION['message'] = '';
			$_SESSION['status'] = '';
			$_SESSION['id'] = '';

		}

		public function set($isi, $id){

			$_SESSION['status'] = $isi;
			$_SESSION['id'] = $id;
		}

		public function logout(){

			session_destroy();
		}
	}





	class crud_harga_waktu{


		public function to_checkin($time)
		{
			$times = substr($time, 0, 5);
			$date_awal  = new DateTime($times);
			$date_akhir = new DateTime('00'.":"."30");
			$selisih = $date_akhir->diff($date_awal);

			$jam = $selisih->format('%h');
			$menit = $selisih->format('%i');
			 
			 
			$hasil = $jam.":".$menit;
			$hasil = number_format($hasil,2);

			if (substr($hasil, 0, 2) <= 9)
			{
				$n = 0;
				$result = $n.$hasil;

				return $result;
			}else{

				return $hasil;
			}
		}

		public function formal_price($price){

			$str = strval($price);

			$strlen = strlen($str);

			if ($strlen == 4) //Support Harga Ribuan
			{
				$str1 = substr($str, 0, 1);
				$str2 = substr($str, 1, 3);
				$result = $str1.".".$str2;

				return $result;
				
			}
			elseif ($strlen == 5) //Support Harga Belasan Maupun Puluhan Ribu
			{
				$str1 = substr($str, 0, 2);
				$str2 = substr($str, 2, 3);
				$result = $str1.".".$str2;

				return $result;

			}
			elseif ($strlen == 6) //Support Harga Ratusan Ribu
			{
				$str1 = substr($str, 0, 3);
				$str2 = substr($str, 3, 3);
				$result = $str1.".".$str2;

				return $result;
			}
			elseif ($strlen == 7) //Support Harga Jutaan
			{ 
				$str1 = substr($str, 0, 1);
				$str2 = substr($str, 1, 3);
				$str3 = substr($str, 4, 3);
				$result = $str1.".".$str2.".".$str3;

				return $result;
			}
			elseif ($strlen == 8) //Support Harga Belasan Atau Puluhan Jutaan
			{
				$str1 = substr($str, 0, 2);
				$str2 = substr($str, 2, 3);
				$str3 = substr($str, 5, 3);
			    $result = $str1.".".$str2.".".$str3;

			    return $result;
			}
			elseif ($strlen == 9) //Support Harga Ratusan Juta
			{
				$str1 = substr($str, 0, 3);
				$str2 = substr($str, 3, 3);
				$str3 = substr($str, 6, 3);
				$result = $str1.".".$str2.".".$str3;

				return $result;
			}
			elseif ($strlen == 10) //Support Harga Milyaran
			{
				$str1 = substr($str, 0, 1);
				$str2 = substr($str, 1, 3);
				$str3 = substr($str, 4, 3);
				$str4 = substr($str, 7, 3);
				$result = $str1.".".$str2.".".$str3.".".$str4;

				return $result;
			}
			else
			{

				return $str;

			}

			//============================================================================================
			//==================FITUR DIATAS SUDAH SUPPORT HINGGA TIKET SEHARGA MILYARAN==================
			//============AKAN SAYA TAMBAHKAN KEDEPANNYA AGAR SUPPORT LEBIH BANYAK JENIS HARGA============
			//============================================================================================
		}
	}
?>