<?php  
	
	class filter{

		public $conn;

		public function __construct(){

			$this->connect();

		}

		public function connect()
		{

			$this->conn = new mysqli('localhost', 'root', '', 'db_latihan_ukk_tickect');

		}

		public function filter_route($status, $to){

			$data_filter = $this->conn->prepare("SELECT * FROM `rute` WHERE status_keberangkatan = ? AND tujuan = ?");
			$data_filter->bind_param("ss", $status, $to);

			if ($data_filter->execute())
			{
				$data_filter_res = $data_filter->get_result();

				return $data_filter_res;
			}

		}

		public function filter_route_status($status){

			$data_filter = $this->conn->prepare("SELECT * FROM `rute` WHERE status_keberangkatan = ?");
			$data_filter->bind_param("s", $status);

			if ($data_filter->execute())
			{
				$data_filter_res_status = $data_filter->get_result();

				return $data_filter_res_status;
			}

		}

		public function filter_route_to($to){

			$data_filter = $this->conn->prepare("SELECT * FROM `rute` WHERE tujuan = ?");
			$data_filter->bind_param("s", $to);

			if ($data_filter->execute())
			{
				$data_filter_res_to = $data_filter->get_result();

				return $data_filter_res_to;
			}
		}

	}

?>