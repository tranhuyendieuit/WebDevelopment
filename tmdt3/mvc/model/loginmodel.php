<?php 
	class loginmodel extends DB {

		public function login($email){
			$sql ="SELECT *FROM users where email ='{$email}'";
			return mysqli_query($this->con,$sql);
		}
	}
 ?>