<?php 
	class admin extends controller {

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
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"all_product"=>$this->hang_hoamodel->get(),
				"ngay"=>$this->don_hangmodel->get(),
				"total"=>$this->chi_tiet_don_hangmodel->total_month(),
				"count"=>$da_ban,
				"total_all"=>$this->chi_tiet_don_hangmodel->total_all(),
				"id_don"=>$this->don_hangmodel->get_all_id(),
			]);
		}

	}
 ?>