<?php 
	
	class comment_model extends DB {

		public function get($name_search){

			$sql ="SELECT comment.noi_dung as 'noi_dung',khach_hang.ten_khach_hang as 'ten_khach_hang' FROM `comment`,khach_hang,hang_hoas WHERE comment.id_khach_hang = khach_hang.id and comment.id_hang_hoa = hang_hoas.id and  hang_hoas.name_search ='$name_search' order by comment.id DESC LIMIT 5";
			return mysqli_query($this->con,$sql);
		}
		public function insert($id_hang_hoa,$id_khach_hang,$noi_dung){
			$sql ="INSERT INTO `comment`(`id`, `id_hang_hoa`, `id_khach_hang`, `noi_dung`) VALUES (null,'$id_hang_hoa','$id_khach_hang','$noi_dung')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
				
			}
			return json_encode($result);
		}
		public function select(){

			$sql ="SELECT comment.id as 'id', comment.noi_dung as 'noi_dung',khach_hang.ten_khach_hang as 'ten_khach_hang',khach_hang.email as 'email',khach_hang.so_dien_thoai as 'sdt',hang_hoas.Ten_hang_hoa as 'ten_hang_hoa' FROM `comment`,hang_hoas,khach_hang WHERE comment.id_hang_hoa=hang_hoas.id and comment.id_khach_hang=khach_hang.id";
			return mysqli_query($this->con,$sql);
		}
	}
 ?>