<?php 

	class slidermodel extends DB {

		public function get(){

			$sql ="SELECT * FROM slider";

			return mysqli_query($this->con,$sql);
		}
		public function typeslider($id){

			$sql ="SELECT * FROM slider where id = $id ORDER BY id DESC";
			return mysqli_query($this->con,$sql);
		}
		
		public function delete($id){

			$sql ="DELETE FROM slider where id =$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function insert($tenSlider,$fileName_up){

			$sql ="INSERT INTO `slider`(`tenSlider`,`image`) VALUES ('$tenSlider','$fileName_up')";

			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		
		public function update($id,$tenSlider){

			$sql ="UPDATE `slider` SET `tenSlider`='$tenSlider' WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		
		public function search_name($search_slider){
			$sql ="SELECT * FROM `slider` WHERE tenSlider  LIKE '%$search_slider%' order by id DESC Limit 3";
			return mysqli_query($this->con,$sql);

		}
		public function nameSlider(){

			$sql ="SELECT tenSlider FROM slider";
			return mysqli_query($this->con,$sql);
		}
		public function lv_product($id,$in_percent){
			$sql ="UPDATE `hang_hoas` SET `lvproduct`='$in_percent' WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function replace(){

			
		}
	}

 ?>