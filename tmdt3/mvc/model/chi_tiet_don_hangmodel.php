<?php 
	class chi_tiet_don_hangmodel extends DB {

		public function insert($id_hang_hoa,$so_luong,$gia_don_hang,$id_Don_hang){
			$sql ="INSERT INTO `chi_tiet_don_hangs`(`id_hang_hoa`, `so_luong`, `gia_don_hang`, `id_Don_hang`) VALUES ('$id_hang_hoa','$so_luong','$gia_don_hang','$id_Don_hang')";
			  $result = false;
            if(mysqli_query($this->con,$sql)){
                $result = true;
            }
            return json_encode($result);
		}
		public function delete($id_chi_tiet){
			$sql ="DELETE FROM chi_tiet_don_hangs where id_Don_hang =$id_chi_tiet";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function chi_tiet($id_Don_hang){

			$sql ="SELECT *FROM chi_tiet_don_hangs where id_Don_hang=$id_Don_hang";
			return mysqli_query($this->con,$sql);
		}
		public function view_chi_tiet($id){
			$sql ="SELECT chi_tiet_don_hangs.so_luong as 'so_luong',hang_hoas.Ten_hang_hoa as 'ten_hang_hoa',hang_hoas.gia as 'gia' FROM `chi_tiet_don_hangs`,hang_hoas WHERE chi_tiet_don_hangs.id_hang_hoa = hang_hoas.id and id_Don_hang=$id";
			return mysqli_query($this->con,$sql);
		}
		public function total_month(){
			$start =  date("Y-").date('m-1');
			$final =date('Y-m-t');
			$sql ="SELECT sum(tong_tien) as 'total' FROM `don_hangs` WHERE Trang_Thai=1 and Ngay_Dat_Hang >='$start' and Ngay_Dat_Hang<= '$final'";

			return mysqli_query($this->con,$sql);
		}
		public function total_all(){
			$sql="SELECT sum(don_hangs.tong_tien)as 'total' FROM `don_hangs` WHERE Trang_Thai =1";
				return mysqli_query($this->con,$sql);
		}
		public function sum2(){
			$sql ="SELECT sum(so_luong) as 'so_luong' FROM `chi_tiet_don_hangs`,don_hangs where chi_tiet_don_hangs.id_Don_hang = don_hangs.id and don_hangs.Trang_Thai=1 ";
			return mysqli_query($this->con,$sql);

		}
		public function add_cart($id_hang_hoa,$so_luong,$id_Don_hang){

			$sql ="INSERT INTO `chi_tiet_don_hangs`(`id_hang_hoa`, `so_luong`, `id_Don_hang`) VALUES ('$id_hang_hoa','$so_luong','$id_Don_hang')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				
				$result = true;
			}
			return json_encode($result);
		}
		public function order(){

			$sql ="SELECT group_concat(hang_hoas.Ten_hang_hoa separator ',')
		    from chi_tiet_don_hangs left join hang_hoas 
			 on (chi_tiet_don_hangs.id_hang_hoa = hang_hoas.id)
			 group by chi_tiet_don_hangs.id_Don_hang";
			 
			return mysqli_query($this->con,$sql);
		}
	}
 ?>