<?php 
	
	class gioithieu extends controller {

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

		public function homepage(){

			$this->view("masterlayout",[
				"page"=>"page/gioithieu",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				
			]);
		}
	}
 ?>