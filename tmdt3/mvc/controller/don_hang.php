<?php 

	class don_hang extends controller {
		public $loai_hang_hoamodel;
		public $hang_hoamodel;
		public $don_hangmodel;
		public $chi_tiet_don_hangmodel;
		public $trang_thaimodel;

		function __construct(){

			$this->loai_hang_hoamodel = $this->model("loai_hang_hoamodel");
			$this->hang_hoamodel = $this->model("hang_hoamodel");
			$this->don_hangmodel = $this->model("don_hangmodel");
			$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
			$this->trang_thaimodel = $this->model("trang_thaimodel");
		}

		public function homePage(){

			$this->viewadmin("masterlayout",[
				"page"=>"don_hang/all_order",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"don_hang"=>$this->don_hangmodel->get_all_order(),
			]);
		}
		public function status_2(){

			$this->viewadmin("masterlayout",[
				"page"=>"don_hang/order_status2",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"don_hang"=>$this->don_hangmodel->get_all_order2(),
			]);
		}

		public function update($id){
			$product = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
			$chi_tiet = $this->chi_tiet_don_hangmodel->chi_tiet($id);
			while ($row = mysqli_fetch_array($chi_tiet)) {
				$id_don = $row['id_Don_hang'];
			}
			foreach ($chi_tiet as  $items) {
				$so_luong = $this->hang_hoamodel->update_hang($items['id_hang_hoa'],$items['so_luong']);
			}
			$kq = $this->don_hangmodel->update($id);
				$this->viewadmin("masterlayout",[
				"page"=>"don_hang/index",
				"don_hang"=>$this->don_hangmodel->get_don_hang($id),
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"result"=>$kq,
			]);
		}
		public function delete($id){

			$delete_chi_tiet = $this->chi_tiet_don_hangmodel->delete($id);
			$delete_don_hang = $this->don_hangmodel->delete($id);
				$this->viewadmin("masterlayout",[
				"page"=>"don_hang/chi_tiet",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"chi_tiet_don_hang"=>$this->don_hangmodel->view_don($id),
				"don_hang"=>$this->don_hangmodel->get_don_hang($id),
				"result2"=>$delete_don_hang,
			]);
		}
		public function view_chi_tiet($id){

			$this->viewadmin("masterlayout",[
				"page"=>"don_hang/chi_tiet",
				"chi_tiet_don_hang"=>$this->don_hangmodel->view_don($id),
				"don_hang"=>$this->don_hangmodel->get_don_hang($id),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),


			]);
		}
		public function view_don_hang($id){
			
				$this->viewadmin("masterlayout",[
				"page"=>"don_hang/index",
				"chi_tiet_don_hang"=>$this->don_hangmodel->view_don($id),
				"don_hang"=>$this->don_hangmodel->get_don_hang($id),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),


			]);

		}
	}
 ?>