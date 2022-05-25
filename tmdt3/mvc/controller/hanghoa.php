<?php 
	class hanghoa extends controller{
			public $loai_hang_hoamodel;
			public $hang_hoamodel;
			public $don_hangmodel;
			public $chi_tiet_don_hangmodel;
			function __construct(){
			$this->loai_hang_hoamodel = $this->model("loai_hang_hoamodel");
			$this->hang_hoamodel = $this->model("hang_hoamodel");
			$this->don_hangmodel = $this->model("don_hangmodel");
			$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
		}
		public function homePage(){

			$this->viewadmin("masterlayout",[
				"page"=>"sanpham/index",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"all_product"=>$this->hang_hoamodel->get_hang(),
			]);
		}
		public function delete($id){

			$kq = $this->hang_hoamodel->delete($id);
				$this->viewadmin("masterlayout",[
				"page"=>"sanpham/index",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"all_product"=>$this->hang_hoamodel->get_hang(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"result"=>$kq,
			]);
		}
		public function view_insert(){

			$this->viewadmin("masterlayout",[
				"page"=>"sanpham/insert",
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
			]);
		}
		public function insert(){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				
					$ten_san_pham = $_POST["ten_san_pham"];
					$name_search = $_POST["name_search"];
					$loai_san_pham = $_POST["id_loai"];
					$gia = $_POST["gia"];
					$so_luong_hang = $_POST["so_luong_hang"];
					$mo_ta = $_POST["mo_ta"];
					$image = $_FILES["hinh"];
					$uploadsOk = 0;
					$fileName ="";
					$fileName_up ="";
					$path ="public/uploads/";
					if (isset($_FILES["hinh"])) {
						if ($_FILES["hinh"]["type"]=="image/jpeg" ||$_FILES["hinh"]["type"]=="image/jpg"||$_FILES["hinh"]["type"]=="image/png" || $_FILES["hinh"]["type"]=="image/gif") {
							if ($_FILES["hinh"]["size"]<3*1024*1024) {
								if ($_FILES["hinh"]["error"]=="0") {
									$filename =$_FILES["hinh"]["tmp_name"];
									$fileName .= "public/uploads/".$_FILES["hinh"]["name"];
									if (file_exists($fileName)) {
										$rand = rand(0,99);
										move_uploaded_file($filename, $path.$rand.'-'.$_FILES["hinh"]["name"]);
										$fileName_up .="public/uploads/".$rand.'-'.$_FILES["hinh"]["name"];
										$kq = $this->hang_hoamodel->insert($ten_san_pham,$name_search,$gia,$so_luong_hang,$fileName_up,$mo_ta,$loai_san_pham);
											$this->viewadmin("masterlayout",[
											"page"=>"sanpham/insert",
											"loai_hang"=>$this->loai_hang_hoamodel->get(),
											"id_don"=>$this->don_hangmodel->get_all_id(),
											"result"=>$kq,
											]);
									}
									else
									{
										move_uploaded_file($filename, $path.$_FILES["hinh"]["name"]);
										$kq = $this->hang_hoamodel->insert($ten_san_pham,$gia,$so_luong_hang,$fileName,$mo_ta,$loai_san_pham);
											$this->viewadmin("masterlayout",[
											"page"=>"sanpham/insert",
											"loai_hang"=>$this->loai_hang_hoamodel->get(),
											"id_don"=>$this->don_hangmodel->get_all_id(),
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
		public function edit($id){

			$this->viewadmin("masterlayout",[
				"page"=>"sanpham/edit",
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"hang_hoa"=>$this->hang_hoamodel->edit($id),
			]);
		}
		public function update($id){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				
				if (empty($_POST["ten_san_pham"])||empty($_POST["so_luong_hang"])||empty($_POST["gia"])||empty($_POST["mo_ta"])) {
					$this->viewadmin("masterlayout",[
						"page"=>"sanpham/edit",
						"hang_hoa"=>$this->hang_hoamodel->edit($id),
						"id_don"=>$this->don_hangmodel->get_all_id(),
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