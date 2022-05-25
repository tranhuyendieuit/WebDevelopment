<?php 
	class trang_thaimodel extends DB {

		public function get(){

			$sql ="SELECT *FROM trang_thais";
			return mysqli_query($this->con,$sql);
		}
	}
 ?>