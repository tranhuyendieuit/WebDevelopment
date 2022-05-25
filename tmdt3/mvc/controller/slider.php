<?php 
	class slider extends controller{
			public $loai_hang_hoamodel;
			public $hang_hoamodel;
			public $don_hangmodel;
			public $chi_tiet_don_hangmodel;
            public $slidermodel;
			function __construct(){
			$this->loai_hang_hoamodel = $this->model("loai_hang_hoamodel");
			$this->hang_hoamodel = $this->model("hang_hoamodel");
			$this->don_hangmodel = $this->model("don_hangmodel");
			$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
            $this->slidermodel = $this->model("slidermodel");
		}
		public function homePage(){

			$this->viewadmin("masterlayout",[
				"page"=>"slider/index",
				// "loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"slider"=>$this->slidermodel->get(),
			]);
		}
		public function delete($id){

			$kq = $this->slidermodel->delete($id);
				$this->viewadmin("masterlayout",[
				"page"=>"slider/index",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"slider"=>$this->slidermodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"result"=>$kq,
			]);
		}
		public function view_insert(){

			$this->viewadmin("masterlayout",[
				"page"=>"slider/insert",
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
			]);
		}
		public function insert(){
			$result_mess = false;
			if (isset($_POST["submit"])) {
					$tenSlider = $_POST["tenSlider"];
					$name_search = $_POST["name_search"];
					$image = $_FILES["image"];
					$uploadsOk = 0;
					$fileName ="";
					$fileName_up ="";
					$path ="public/uploads/";
					if (isset($_FILES["image"])) {
						if ($_FILES["image"]["type"]=="image/jpeg" ||$_FILES["image"]["type"]=="image/jpg"||$_FILES["image"]["type"]=="image/png" || $_FILES["image"]["type"]=="image/gif") {
							if ($_FILES["image"]["size"]<3*1024*1024) {
								if ($_FILES["image"]["error"]=="0") {
									$filename =$_FILES["image"]["tmp_name"];
									$fileName .= "public/uploads/".$_FILES["image"]["name"];
									if (file_exists($fileName)) {
										$rand = rand(0,99);
										move_uploaded_file($filename, $path.$rand.'-'.$_FILES["image"]["name"]);
										$fileName_up .="public/uploads/".$rand.'-'.$_FILES["image"]["name"];
										$kq = $this->slidermodel->insert($tenSlider,$fileName_up);
											$this->viewadmin("masterlayout",[
											"page"=>"slider/insert",
											"result"=>$kq,
											]);
									}
									else
									{
										move_uploaded_file($filename, $path.$_FILES["image"]["name"]);
										$kq = $this->slidermodel->insert($tenSlider,$fileName);
											$this->viewadmin("masterlayout",[
											"page"=>"slider/insert",
											"result"=>$kq,
											]);
									}

								}
								else{

									echo 1;
								}
							}
							else{
								echo 1;
							}
						}
						else{
							echo 1;
						}
					}
			}
		}
		public function update($id){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				
				if (empty($_POST["tenSlider"])) {
					$this->viewadmin("masterlayout",[
						"page"=>"slider/edit",
						"slider"=>$this->slidermodel->edit($id),
						// "id_don"=>$this->don_hangmodel->get_all_id(),
						"result"=>$result_mess,
					]);
				}
				else {

					$ten_san_pham = $_POST["ten_san_pham"];
					$so_luong_hang = $_POST["so_luong_hang"];
					$gia = $_POST["gia"];
					$mo_ta = $_POST["mo_ta"];
					$kq = $this->hang_hoamodel->update($id,$ten_san_pham,$gia,$so_luong_hang,$mo_ta);
						$this->viewadmin("masterlayout",[
						"page"=>"sanpham/edit",
						"hang_hoa"=>$this->hang_hoamodel->edit($id),
						"id_don"=>$this->don_hangmodel->get_all_id(),
						"result"=>$kq,
					]);
				}
			}	
		}
	}
 ?>