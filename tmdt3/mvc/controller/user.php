<?php 
	class user extends controller {
		public $loai_hang_hoamodel;
		public $hang_hoamodel;
		public $don_hangmodel;
		public $chi_tiet_don_hangmodel;
		public $trang_thaimodel;
		public $usermodel;

		function __construct(){

			$this->loai_hang_hoamodel = $this->model("loai_hang_hoamodel");
			$this->hang_hoamodel = $this->model("hang_hoamodel");
			$this->don_hangmodel = $this->model("don_hangmodel");
			$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
			$this->trang_thaimodel = $this->model("trang_thaimodel");
			$this->usermodel = $this->model("usermodel");
		}

		public function homePage(){
			$this->viewadmin("masterlayout",[
				"page"=>"user/index",
				"user"=>$this->usermodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
			]);
		}
		public function view_insert(){

			$this->viewadmin("masterlayout",[
				"page"=>"user/insert",
				"user"=>$this->usermodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				"trang_thai"=>$this->trang_thaimodel->get(),
			]);
		}
		public function insert(){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				if (empty($_POST["username"])||empty($_POST["password"])||empty($_POST["name"])||empty($_POST["dia_chi"])||empty($_POST["sdt"])) {
						$this->viewadmin("masterlayout",[
						"page"=>"user/insert",
						"user"=>$this->usermodel->get(),
						"trang_thai"=>$this->trang_thaimodel->get(),
						"id_don"=>$this->don_hangmodel->get_all_id(),
						"result"=>$result_mess,
					]);
				}
				else{

					$email = $_POST["username"];
					$password = $_POST["password"];
					$password = password_hash($password, PASSWORD_DEFAULT);
					$name = $_POST["name"];
					$dia_chi = $_POST["dia_chi"];
					$sdt = $_POST["sdt"];
					$result_max = $this->usermodel->max($email);
					if (mysqli_num_rows($result_max)>0) {
						$this->viewadmin("masterlayout",[
						"page"=>"user/insert",
						"user"=>$this->usermodel->get(),
						"trang_thai"=>$this->trang_thaimodel->get(),
						"result2"=>$result_mess,
						"id_don"=>$this->don_hangmodel->get_all_id(),

						]);
					}
					else{

						$kq = $this->usermodel->insert($name,$dia_chi,$sdt,$email,$password);
						$this->viewadmin("masterlayout",[
						"page"=>"user/insert",
						"user"=>$this->usermodel->get(),
						"trang_thai"=>$this->trang_thaimodel->get(),
						"id_don"=>$this->don_hangmodel->get_all_id(),
						"result"=>$kq,
						]);
					}
				}
			}
		}
		public function update($id){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				if (empty($_POST["name"])||empty($_POST["dia_chi"])||empty($_POST["sdt"])) {
						$this->viewadmin("masterlayout",[
							"page"=>"user/edit",
							"user"=>$this->usermodel->edit($id),
							"result"=>$result_mess,
						]);
				}
				else{

					$name = $_POST["name"];
					$dia_chi = $_POST["dia_chi"];
					$sdt = $_POST["sdt"];
					$kq = $this->usermodel->update($id,$name,$dia_chi,$sdt);
					$this->viewadmin("masterlayout",[
							"page"=>"user/edit",
							"user"=>$this->usermodel->edit($id),
							"result"=>$kq,
						]);
					}
			}
		}
		public function delete($id){

			$kq = $this->usermodel->delete($id);
			header("Location:http://localhost/tmdt3/user");
		}
	}
 ?>