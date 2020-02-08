<?php  

	class crud extends Connection{

		public $table;
		public $field;
		public $data;
		public $colum;

		public function __construct(){

			parent::__construct();

		}


		public function create($table, $datas){


			foreach ($datas as $fields => $data) {
				$this->field .= "'$fields',";
			}

			foreach ($datas as $kolom => $nilai) {
				$this->data .= "'$nilai',";
			}

			 $this->field = substr($this->field, 0, -1);
			 $this->data = substr($this->data, 0, -1);
			
			 $this->table = $table;
			
				$sql = "INSERT INTO `$this->table` VALUES ($this->data)";

				if ($sql){
					
					$result = $this->conn->query($sql);
					
					if ($result){
						
						return TRUE;
					}

				}
		}


		public function read($table2, $colums = '*'){

			if (is_array($colums)){

				foreach ($colums as $colum){
					$this->colum .= " `$colum`,"; 
				}

				 $this->colum = substr($this->colum, 0, -1);

				 	$stmt = "SELECT$this->colum FROM `$table2`";
				 	$prepare = $this->conn->prepare($stmt);

				 	if ($prepare){

				 		$prepare->execute();
				 		$result = $prepare->get_result();
						return $result;
					}else{

						return "<b>ERROR TABEL/FIELD TIDAK DITEMUKAN.<br> TABEL : ".$table2.".<br>FIELDS : ".$this->colum."</b>";
					}

			}else{

				$stmt = "SELECT * FROM `$table2`";
				$prepare = $this->conn->prepare($stmt);

				if ($prepare){

					$prepare->execute();
					$result = $prepare->get_result();
					return $result;
				}else{

					return "<b>ERROR TABEL TIDAK DITEMUKAN.<br>TABEL : ".$table2.".</b>";
				}
			}

		}


		public function update($table3, $columsValues, $id){
			$columsValues2 = "";
			$field3 = "";

			foreach ($columsValues as $colum3 => $value3) {
				$columsValues2 .= " `$colum3`='$value3',";
			}
			foreach ($id as $colum4 => $value4) {
				$field3 .= $colum4;
				$value4 = $value4;
			}

				$columsValues2 = substr($columsValues2, 0, -1);

				$stmt3 = "UPDATE `$table3` SET$columsValues2 WHERE `$table3`.`$field3` = $value4";
				$prepare3 = $this->conn->prepare($stmt3);


				if ($prepare3){

					$result3 = $prepare3->execute();
					return TRUE;
				}else{

					return "GAGAL UPDATE DATA";
				}

		}


		public function delete($table4, $id4){

			foreach ($id4 as $colum5 => $value5) {
				$field4 = "$colum5";
				$value5 = "$value5";
			}

			$stmt4 = "DELETE FROM `$table4` WHERE `$table4`.`$field4` = $value5";
			$prepare4 = $this->conn->prepare($stmt4);

			if ($prepare4){

				$result4 = $prepare4->execute();
				return $stmt4;
			}else{

				return "GAGAL DELETE DATA";
			}

		}

	}

?>