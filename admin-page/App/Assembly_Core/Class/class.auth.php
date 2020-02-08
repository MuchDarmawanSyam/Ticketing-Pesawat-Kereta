<?php 

	class Auth extends Connection{

		public $auth_status;

		public function login($table_login, $data_login){

			$count_requires = count($data_login);

			if ($count_requires > 1) {
				
				$sql_auth_path = '';
				$count_from_zero = 0;

				foreach ($data_login as $field_login => $value_login) {
					$sql_auth_path .= " AND `$field_login` = '$value_login'";
				}

					$sql_auth_path = $sql_auth_path;
					$sql_auth_path_first = substr($sql_auth_path, 4);

					if ($sql_auth_path_first){

						$sql_auth = "SELECT * FROM `$table_login` WHERE$sql_auth_path_first";
						$query_auth = $this->conn->query($sql_auth);


						if ($query_auth){

							if ($query_auth->fetch_assoc() == TRUE){

								return $this->auth_status = TRUE;

							}else{

								return $this->auth_status = FALSE;
							}
						}else{

							return $errors = "<h1>KESALAHAN DALAM EKSEKUSI SQL :</h1> <br><b>Database : ".ASSEMBLY_DATABASE['DBName'].".<br>Tabel : ".$table_login.".<br>Parameter : ".$sql_auth_path_first.".</b>";
						}

					}

			}else{

				$sql_auth_path2 = '';

				foreach ($data_login as $field_login2 => $value_login2) {
					$sql_auth_path2 = " `$field_login2` = '$value_login2'";
				}

				$sql_auth2 = "SELECT * FROM `$table_login` WHERE$sql_auth_path2";

				$query_auth2 = $this->conn->query($sql_auth2);


				if ($query_auth2){

					if ($query_auth2->fetch_assoc() == TRUE){

						return $this->auth_status = TRUE;

					}else{

						return $this->auth_status = FALSE;

					}
				}else{

					return $errors = "<h1>KESALAHAN DALAM EKSEKUSI SQL :</h1> <br><b>Database : ".ASSEMBLY_DATABASE['DBName'].".<br>Tabel : ".$table_login.".<br>Parameter : ".$sql_auth2.".</b>";
				}
			}

		}

		public function redirect($to, $format_file = "php"){

			$redirect_to = $to.".".$format_file;
			header("location: $redirect_to");

		}

	}

?>