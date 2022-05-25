<?php 

class khach_hangmodel extends DB {

	public function get(){

		$sql ="SELECT *FROM khach_hang";
		 return mysqli_query($this->con,$sql);
	}
		public function insert($ten_khach_hang,$email,$so_dien_thoai){

		$sql ="INSERT INTO `khach_hang`(`id`, `ten_khach_hang`, `email`, `so_dien_thoai`) VALUES (null,'$ten_khach_hang','$email','$so_dien_thoai')";
		$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
	}
	public function max(){
		$sql ="SELECT max(id) as 'id' FROM `khach_hang` ";
		 return mysqli_query($this->con,$sql);

	}
}

 ?>