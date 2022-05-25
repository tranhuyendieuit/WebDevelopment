<?php 
	
	class comment extends controller {

		public $comment_model;
		public $don_hangmodel;
		function __construct(){	

			$this->comment_model = $this->model("comment_model");
			$this->don_hangmodel = $this->model("don_hangmodel");


		}
		public function homePage(){

			$this->viewadmin("masterlayout",[

			"page"=>"comment/index",
			"comment"=>$this->comment_model->select(),
			"id_don"=>$this->don_hangmodel->get_all_id(),

			]);
		}
	}

 ?>