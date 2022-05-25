<?php 
	class loai_hang_hoa extends controller {
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
				"page"=>"loai_san_pham/index",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
			]);
		}
		public function view_insert(){
				$this->viewadmin("masterlayout",[
				"page"=>"loai_san_pham/insert",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
			]);
		}
		public function insert(){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				if (empty($_POST["ten_loai"])) {
				$this->viewadmin("masterlayout",[
				"page"=>"loai_san_pham/insert",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"result"=>$result_mess,
			]);
				}
				else {
					$ten_loai = $_POST["ten_loai"];
					$result_loai = $this->loai_hang_hoamodel->isset($ten_loai);
					$result_isset =false;
					if (mysqli_num_rows($result_loai)>0) {
							$this->viewadmin("masterlayout",[
							"page"=>"loai_san_pham/insert",
							"loai_hang"=>$this->loai_hang_hoamodel->get(),
							"trang_thai"=>$this->trang_thaimodel->get(),
							"id_don"=>$this->don_hangmodel->get_all_id(),
							"result2"=>$result_isset,
						]);
					}
					else{
						$kq = $this->loai_hang_hoamodel->insert($ten_loai);
						$this->viewadmin("masterlayout",[
						"page"=>"loai_san_pham/insert",
						"loai_hang"=>$this->loai_hang_hoamodel->get(),
						"trang_thai"=>$this->trang_thaimodel->get(),
						"result"=>$kq,
						"id_don"=>$this->don_hangmodel->get_all_id(),

						]);
					}
				
				}
			}
		}
		public function delete($id){

			$kq = $this->loai_hang_hoamodel->delete($id);
				$this->viewadmin("masterlayout",[
				"page"=>"loai_san_pham/index",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"result"=>$kq,
			]);

		}
		public function edit($id){

			$this->viewadmin("masterlayout",[
				"page"=>"loai_san_pham/edit",
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"chi_tiet"=>$this->loai_hang_hoamodel->edit($id),
			]);
		}
		public function update($id){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				if (empty($_POST["ten_loai"])) {
					$this->viewadmin("masterlayout",[
					"page"=>"loai_san_pham/edit",
					"chi_tiet"=>$this->loai_hang_hoamodel->edit($id),
					"id_don"=>$this->don_hangmodel->get_all_id(),
					"result"=>$result_mess,
					]);
				}
				else{

					$ten_loai = $_POST["ten_loai"];
					$loai_isset =$this->loai_hang_hoamodel->isset($ten_loai);
					if (mysqli_num_rows($loai_isset)>0) {
						$this->viewadmin("masterlayout",[
						"page"=>"loai_san_pham/edit",
						"chi_tiet"=>$this->loai_hang_hoamodel->edit($id),
						"id_don"=>$this->don_hangmodel->get_all_id(),
						"result2"=>$result_mess,
						]);
					}
					else{

						$kq = $this->loai_hang_hoamodel->update($id,$ten_loai);
						$this->viewadmin("masterlayout",[
						"page"=>"loai_san_pham/edit",
						"chi_tiet"=>$this->loai_hang_hoamodel->edit($id),
						"id_don"=>$this->don_hangmodel->get_all_id(),
						"result"=>$kq,
						]);
					}
				}
			}
		}
	}
 ?>