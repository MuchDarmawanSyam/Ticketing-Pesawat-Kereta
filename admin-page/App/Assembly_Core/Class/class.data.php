<?php  

	class data extends Connection{

		public function get($table, $arrData){

			$field = "";
			$data = "";

			foreach ($arrData as $fields => $datas) {
				$field = "$fields";
				$data = "$datas";
			}

			$sql_get = "SELECT * FROM `$table` WHERE `$field` = '$data'";
			$query_get = $this->conn->query($sql_get);

			if ($query_get){

				$arr_get = $query_get->fetch_assoc();
					return $arr_get;
			}else{

				return 'GAGAL DAPATKAN DATA, CEK SQL DULU. <br>Table : '.$table.'. <br>SQL : '.$sql_get;

			}
		}

	}

?>