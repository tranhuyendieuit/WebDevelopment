<?php 

	class hang_hoamodel extends DB {

		public function get(){

			$sql ="SELECT * FROM hang_hoas";

			return mysqli_query($this->con,$sql);
		}
		public function detail($name_search){
				
			$sql ="SELECT * FROM hang_hoas where name_search='$name_search' ORDER BY id DESC";
			$result =mysqli_query($this->con,$sql);
			return $result;

		}
		public function typeproduct($id){

			$sql ="SELECT * FROM hang_hoas where id_loai = $id ORDER BY id DESC";
			return mysqli_query($this->con,$sql);
		}
		public function update_hang($id,$so_luomg){
			$sql ="UPDATE `hang_hoas` SET so_luong_hang = so_luong_hang - $so_luomg WHERE id =$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function get_hang(){
			$sql="SELECT hang_hoas.id as 'id',hang_hoas.Ten_hang_hoa as 'Ten_hang_hoa',hang_hoas.gia as 'gia',hang_hoas.so_luong_hang as'so_luong_hang',hang_hoas.hinh as'hinh',hang_hoas.mo_ta as'mo_ta',loai_hang_hoas.Ten_loai as'id_loai' FROM `hang_hoas`,loai_hang_hoas WHERE hang_hoas.id_loai=loai_hang_hoas.id";
			return mysqli_query($this->con,$sql);
		}
		public function delete($id){

			$sql ="DELETE FROM hang_hoas where id =$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function insert($Ten_hang_hoa,$name_search,$gia,$so_luong_hang,$fileName_up,$mo_ta,$id_loai){

			$sql ="INSERT INTO `hang_hoas`(`Ten_hang_hoa`,name_search, `gia`, `so_luong_hang`, `hinh`, `mo_ta`, `id_loai`) VALUES ('$Ten_hang_hoa','$name_search','$gia','$so_luong_hang','$fileName_up','$mo_ta','$id_loai')";

			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function edit($id){

			$sql ="SELECT * FROM hang_hoas where id = $id";
			return mysqli_query($this->con,$sql);
		}
		public function update($id,$ten_hang_hoa,$gia,$so_luong_hang,$mo_ta){

			$sql ="UPDATE `hang_hoas` SET `Ten_hang_hoa`='$ten_hang_hoa',`gia`='$gia',`so_luong_hang`='$so_luong_hang',`mo_ta`='$mo_ta' WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function sum(){

			$sql ="SELECT SUM(so_luong_hang) as 'so_luong_hang' FROM `hang_hoas` ";
			return mysqli_query($this->con,$sql);
			
		}
		public function search_product($min_price,$max_price,$page){
			$product_one_page = 20;
			$number_product = ($page -1)*$product_one_page;
			$sql ="SELECT * FROM `hang_hoas` WHERE gia BETWEEN $min_price and $max_price order by id DESC LIMIT $number_product,$product_one_page ";
			return mysqli_query($this->con,$sql);

		}
		public function pagination($page){
			$product_one_page = 20;
			$number_product = ($page -1)*$product_one_page;
			$sql ="SELECT * FROM hang_hoas order by id DESC LIMIT $number_product,$product_one_page";
			return mysqli_query($this->con,$sql);

		}
		public function search_name($search_product){
			$sql ="SELECT * FROM `hang_hoas` WHERE Ten_hang_hoa  LIKE '%$search_product%' order by id DESC Limit 3";
			return mysqli_query($this->con,$sql);

		}
		public function nameProduct(){

			$sql ="SELECT Ten_hang_hoa FROM hang_hoas";
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
		public function apiori(){

			$sql ="SELECT * FROM `hang_hoas` WHERE lvproduct BETWEEN 0.7 and 0.9";
			return mysqli_query($this->con,$sql);

		}
	}

 ?>