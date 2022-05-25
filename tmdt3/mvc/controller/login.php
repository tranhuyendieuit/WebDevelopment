<?php 
	class login extends controller{
		public $loai_hang_hoamodel;
		public $hang_hoamodel;
		public $don_hangmodel;
		public $chi_tiet_don_hangmodel;
		public $trang_thaimodel;
		public $usermodel;
		public $loginmodel;

		function __construct(){

			$this->loai_hang_hoamodel = $this->model("loai_hang_hoamodel");
			$this->hang_hoamodel = $this->model("hang_hoamodel");
			$this->don_hangmodel = $this->model("don_hangmodel");
			$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
			$this->trang_thaimodel = $this->model("trang_thaimodel");
			$this->usermodel = $this->model("usermodel");
			$this->loginmodel = $this->model("loginmodel");
		}

		public function homePage(){

			$this->viewadmin("login",[
				"user"=>$this->usermodel->get(),
				"trang_thai"=>$this->trang_thaimodel->get(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
				
			]);
		}
		public function login(){
			$result_mess = false;
			if (isset($_POST["submit"])) {
				$email = $_POST["email"];
				$password_input = $_POST["password"];
				if (empty($_POST["email"])||empty($_POST["password"])) {
					$this->viewadmin("login",[
					"user"=>$this->usermodel->get(),
					"trang_thai"=>$this->trang_thaimodel->get(),
					"result"=>$result_mess,
					]);
				}
				else {
					$email = $_POST["email"];
					$password_input = $_POST["password"];
					$result_max = $this->loginmodel->login($email);
					if (mysqli_num_rows($result_max)>0) {
						// if (mysqli_num_rows($result_max)) {
							while ($row = mysqli_fetch_array($result_max)) {
							$id = $row["id"];	
							$email = $row["email"];
							$password = $row["password"];
						}
						if (password_verify($password_input, $password)) {
							$_SESSION["id"]= $id;
							$_SESSION["email"]= $email;
							$hang_kho = $this->hang_hoamodel->sum();
							$hang_ban = $this->chi_tiet_don_hangmodel->sum2();
							while ($row1 = mysqli_fetch_array($hang_kho)) {
								$so_hang = $row1["so_luong_hang"];
							}
							while ($row2 = mysqli_fetch_array($hang_ban)) {
									$hang_da_ban = $row2["so_luong"];
							}
							$tong = $so_hang + $hang_da_ban;
							$da_ban = ($hang_da_ban/$tong)*100;
							$this->viewadmin("masterlayout",[
								"page"=>"home/product",
								"user"=>$this->usermodel->get(),
								"ngay"=>$this->don_hangmodel->get(),
								"total"=>$this->chi_tiet_don_hangmodel->total_month(),
								"count"=>$da_ban,
								"id_don"=>$this->don_hangmodel->get_all_id(),
								"total_all"=>$this->chi_tiet_don_hangmodel->total_all(),
							]);
						}
						else {
							$this->viewadmin("login",[
							"user"=>$this->usermodel->get(),
							"trang_thai"=>$this->trang_thaimodel->get(),
							"result"=>$result_mess,
							"id_don"=>$this->don_hangmodel->get_all_id(),

							]);
							}	
						//}
					}
					else {
							$this->viewadmin("login",[
							"user"=>$this->usermodel->get(),
							"trang_thai"=>$this->trang_thaimodel->get(),
							"result"=>$result_mess,
							]);
					}
				}
			}
		}
		public function logout(){

			unset($_SESSION["id"]);
			session_destroy();
			$this->viewadmin("login",[

			]);
		}
		public function new_pass(){

			$old_pass = $_POST["old_pass"];
			$new_pass = $_POST["new_pass"];
			$re_new_pass = $_POST["re_new_pass"];
			$result = $this->loginmodel->login($_SESSION["email"]);
			while ($row = mysqli_fetch_array($result)) {
				$password = $row["password"];
			}
			if (password_verify($old_pass, $password)) {
				if ($new_pass == $re_new_pass) {
					
					$re_new_pass = password_hash($re_new_pass, PASSWORD_DEFAULT);
					$kq = $this->usermodel->news_pass($_SESSION["email"],$re_new_pass);
					echo 1;
				}
				else{
					echo "Mật khẩu không trùng khớp";
				}
			}
			else {

				echo "Mật khẩu cũ không đúng";
			}
		}
	}

 ?>