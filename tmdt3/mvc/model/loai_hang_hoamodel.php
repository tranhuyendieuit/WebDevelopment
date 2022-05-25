<?php 

	class loai_hang_hoamodel extends DB {

		public function get(){

			$sql ="SELECT * FROM loai_hang_hoas";
			return mysqli_query($this->con,$sql);
		}
		public function insert($ten_loai){
			$sql ="INSERT INTO `loai_hang_hoas`( `Ten_loai`) VALUES ('$ten_loai')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		public function isset($ten_loai){

			$sql ="SELECT *FROM loai_hang_hoas where ten_loai = '{$ten_loai}'";
			return mysqli_query($this->con,$sql);
		}
		public function delete($id){

			$sql ="DELETE FROM loai_hang_hoas where id =$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
		public function edit($id){

			$sql ="SELECT *FROM loai_hang_hoas where id = $id";
			return mysqli_query($this->con,$sql);

		}
		public function update($id,$ten_loai){

			$sql ="UPDATE `loai_hang_hoas` SET `Ten_loai`='$ten_loai' WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_encode($result);
		}
	}

 ?>