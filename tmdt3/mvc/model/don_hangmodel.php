<?php 

	class don_hangmodel extends DB {

		public function insert($ten_khach_hang,$so_dien_thoai,$dia_chi,$Ngay_Dat_Hang){

			$sql ="INSERT INTO `don_hangs`(`id`, `ten_khach_hang`, `so_dien_thoai`, `dia_chi`,Ngay_Dat_Hang ,`Trang_Thai`) VALUES (null,'$ten_khach_hang','$so_dien_thoai','$dia_chi','$Ngay_Dat_Hang',2)";
			  $result = false;
            if(mysqli_query($this->con,$sql)){
                $result = true;
            }
            return json_encode($result);
		}
		public function max(){

			$sql ="SELECT MAX(id) as'id' FROM `don_hangs`";
			return mysqli_query($this->con,$sql);
		}
		public function get(){
			$start =  date("Y-").date('m-1');
			$final =date('Y-m-t');
			$sql ="SELECT count(id) as 'id' FROM don_hangs where Ngay_Dat_Hang >='$start' and Ngay_Dat_Hang<='$final'";
			return mysqli_query($this->con,$sql);
		}
		public function get_don_hang($id){
			$sql = "SELECT chi_tiet_don_hangs.id_Don_hang as 'id', chi_tiet_don_hangs.so_luong as 'so_luong',hang_hoas.Ten_hang_hoa as 'ten_hang_hoa',hang_hoas.gia as 'gia' FROM chi_tiet_don_hangs,hang_hoas WHERE chi_tiet_don_hangs.id_hang_hoa = hang_hoas.id and chi_tiet_don_hangs.id_Don_hang =$id";
			return mysqli_query($this->con,$sql);
		}
		public function update($id){
			$sql ="UPDATE `don_hangs` SET `Trang_Thai`=1 WHERE id =$id";
			$result = false;
            if(mysqli_query($this->con,$sql)){
                $result = true;
            }
            return json_encode($result);
		}
		public function delete($id){
			$sql ="DELETE FROM don_hangs where id =$id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function insert_cart($ten_khach_hang,$so_dien_thoai,$dia_chi,$ngay_dat_hang,$tong_tien){

			$sql ="INSERT INTO `don_hangs`(`ten_khach_hang`, `so_dien_thoai`, `dia_chi`, `Ngay_Dat_Hang`, `Trang_Thai`, `tong_tien`) VALUES ('$ten_khach_hang','$so_dien_thoai','$dia_chi','$ngay_dat_hang',2,'$tong_tien')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);

		}
		public function get_all_id(){
			$sql ="SELECT *FROM don_hangs";
			return mysqli_query($this->con,$sql);
		}
		public function view_don($id){
			$sql ="SELECT don_hangs.id as 'id', don_hangs.ten_khach_hang as 'ten_khach_hang',don_hangs.so_dien_thoai as 'so_dien_thoai',don_hangs.dia_chi as 'dia_chi',don_hangs.Ngay_Dat_Hang 'ngay_dat_hang',don_hangs.tong_tien as 'tong_tien',trang_thais.Ten_Trang_Thai as 'trang_thai',trang_thais.id as 'id_trang_thai' FROM `don_hangs`,trang_thais WHERE don_hangs.Trang_Thai=trang_thais.id and don_hangs.id = $id";
				return mysqli_query($this->con,$sql);
		}
			public function get_all_order(){
			$sql ="SELECT don_hangs.ten_khach_hang as 'ten_khach_hang',don_hangs.dia_chi as 'dia_chi',don_hangs.so_dien_thoai as 'sdt',don_hangs.Ngay_Dat_Hang as 'ngay_dat_hang',don_hangs.Trang_Thai as 'id_status',don_hangs.tong_tien as 'tong_tien',trang_thais.Ten_Trang_Thai as 'name_status',don_hangs.id as 'id' FROM `don_hangs`,trang_thais WHERE don_hangs.Trang_Thai=trang_thais.id and don_hangs.trang_thai = 1";
			return mysqli_query($this->con,$sql);
		}
		public function get_all_order2(){
			$sql ="SELECT don_hangs.ten_khach_hang as 'ten_khach_hang',don_hangs.dia_chi as 'dia_chi',don_hangs.so_dien_thoai as 'sdt',don_hangs.Ngay_Dat_Hang as 'ngay_dat_hang',don_hangs.Trang_Thai as 'id_status',don_hangs.tong_tien as 'tong_tien',trang_thais.Ten_Trang_Thai as 'name_status',don_hangs.id as 'id' FROM `don_hangs`,trang_thais WHERE don_hangs.Trang_Thai=trang_thais.id and don_hangs.trang_thai = 2";
			return mysqli_query($this->con,$sql);
		}


	}

 ?>