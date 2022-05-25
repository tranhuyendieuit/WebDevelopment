<?php 

	class home extends controller{

		public $loai_hang_hoamodel;
		public $hang_hoamodel;
		public $don_hangmodel;
		public $chi_tiet_don_hangmodel;
		public $khach_hangmodel;
		public $comment_model;
		public $slidermodel;

		function __construct(){

			$this->loai_hang_hoamodel = $this->model("loai_hang_hoamodel");
			$this->hang_hoamodel = $this->model("hang_hoamodel");
			$this->don_hangmodel = $this->model("don_hangmodel");
			$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
			$this->khach_hangmodel = $this->model("khach_hangmodel");
			$this->comment_model = $this->model("comment_model");
			$this->slidermodel = $this->model("slidermodel");
		}

		public function homePage(){
			$this->view("masterlayout",[
				"page"=>"page/trangchu",
				"slider"=>$this->slidermodel->get(),
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"all_product"=>$this->hang_hoamodel->get(),
				"page_product"=>$this->hang_hoamodel->get(),
			]);
		}
		
		public function allProduct(){
		if (isset($_GET["page"])) {
				
				$page = $_GET["page"];
			}
			else{
				$page = 1;
			}
			$this->view("masterlayout",[
				"page"=>"page/all_product",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"all_product"=>$this->hang_hoamodel->get(),
				"pagination"=>$this->hang_hoamodel->pagination($page),
				"page_product"=>$this->hang_hoamodel->get(),


			]);
		}
		public function product($id){

			$this->view("masterlayout",[
				"page"=>"page/product",
				"product"=>$this->hang_hoamodel->typeproduct($id),
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"detail"=>$this->hang_hoamodel->detail($id),
			]);
		}
		public function detail($name_search){

			$this->view("masterlayout",[
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"detail"=>$this->hang_hoamodel->detail($name_search),
				"detail2"=>$this->hang_hoamodel->detail($name_search),
				"page"=>"page/chitiet",
				"id_kh"=>$this->khach_hangmodel->get(),
				"comment"=>$this->comment_model->get($name_search),
				"product_api"=>$this->hang_hoamodel->apiori(),
			]);

		}
		public function cart($id){
				$this->view("masterlayout",[
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"detail"=>$this->hang_hoamodel->detail($id),
				"page"=>"page/cart",
			]);

		}
		/*---------------------------add to cart theo ID------------------------------------------------*/
		
		/*-------------------------------------------------------------------------*/
		public function cart2(){

			$this->view("masterlayout",[
				"page"=>"page/cart2",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),

			]);
		}
		public function dat_hang(){
				if (isset($_POST["submit"])) {
					$kq = false;
					if (empty($_POST["ten_khach_hang"]) || empty($_POST["sdt"])||empty($_POST["dia_chi"])) {
							$this->view("masterlayout",[
							"loai_hang"=>$this->loai_hang_hoamodel->get(),
							"page"=>"page/cart2",
							"result"=>$kq,
						]);
					}
					else {
						$product = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
						$ten_khach_hang = $_POST["ten_khach_hang"];
						$sdt = $_POST["sdt"];
						$dia_chi = $_POST["dia_chi"];
						$ngay_dat_hang = $_POST["ngay_dat_hang"];
						$tong_don_hang = $_POST["tong_don_hang"];
						$kq = $this->don_hangmodel->insert_cart($ten_khach_hang,$sdt,$dia_chi,$ngay_dat_hang,$tong_don_hang);
						$id_don_hang = $this->don_hangmodel->max();
							while ($id_max =mysqli_fetch_array($id_don_hang)) {
							$id_hang = $id_max["id"];
						}
						foreach ($product as $items) {
							$chi_tiet = $this->chi_tiet_don_hangmodel->add_cart($items['id'],$items['so_luong'],$id_hang);
						if ($hang_hoa = $this->hang_hoamodel->nameProduct()) {
							while ($i = $hang_hoa->fetch_row()) {
							
								$item[] = $i[0];
							}

		   					 $hang_hoa->close();
						}
				
			
				// echo "<pre>";	
				// var_dump($item);
						if ($chi_tiet = $this->chi_tiet_don_hangmodel->order()) {
							while ($b  = $chi_tiet->fetch_row()) {
								$belian[] = $b[0];
							}
		   					 $chi_tiet->close();	
							}
						
					
						$item1 = count($item)-1;
						$item2 = count($item);

		////////////////////////////////////////////////////////////////////////////////////////////////////////////		      
					   foreach ($item as $value) {
				        $total_per_item[$value] = 1;
				        foreach($belian as $item_belian) {            
				            if(strpos($item_belian, $value) !== false) {
				                $total_per_item[$value]++;
				            }
				        }
				    }
		////////////////////////////////////////////////////////////////////////////////////////////////////////////		      
			      
			          for($i = 0; $i < $item1; $i++) {
					        for($j = $i+1; $j < $item2; $j++) {
					            $item_pair = $item[$i].'|'.$item[$j]; 
					            $item_array[$item_pair] = 0;
					            foreach($belian as $item_belian) {
					                if((strpos($item_belian, $item[$i]) !== false) && (strpos($item_belian, $item[$j]) !== false)) {
					                    $item_array[$item_pair]++;
					                }
					            }
					        }
					    }
				////////////////////////////////////////////////////////////////////////////////////////////////////////////		      

			 
				    foreach ($item_array as $ia_key => $ia_value) {
			        $theitems = explode('|',$ia_key);
			        for($x = 0; $x < count($theitems); $x++) {
			            $item_name = $theitems[$x];
			            $item_total = $total_per_item[$item_name];
			            $in_float = $ia_value / $item_total;
			            $in_percent = round($in_float * 100, 2);
			            $in_percent = round($in_float * 100, 2);
			            $alt_item = $theitems[ ($x + 1) % count($theitems)];
			            // echo "[+] $ia_key($ia_value) --> $item_name($item_total) => ". $in_float ."\r\n";
			            // echo "<pre>";
			            // echo "    ". $in_percent ."% yang membeli $item_name juga membeli $alt_item\r\n\r\n";
			    	    }

			    } 
			    		$lv =$this->hang_hoamodel->lv_product($items['id'],round($in_float,2));


					}
							
				}


							unset($_SESSION['cart']);
							$this->view("masterlayout",[
							"loai_hang"=>$this->loai_hang_hoamodel->get(),
							"page"=>"page/cart2",
							"result"=>$kq,
							]);
						 // header('location:../home/cart2');
					}
				
				if (isset($_POST['update_sl'])) {
					$product = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
   						foreach ($product as $items) {
   							if ($_POST['so_luong'.$items['name_search']] <= 0) {
								unset($_SESSION['cart'][$items['name_search']]);
								// echo "<pre>";
   					// 			print_r($_SESSION['cart'][$items['id']]);
   							}
   							else{
   								$_SESSION['cart'][$items['name_search']]['so_luong']= $_POST['so_luong'.$items['name_search']];
   							}
   						}
				    // Prevent form resubmission...
				    header('location:../home/cart2');
				    // exit;
					
			}
		}		
		public function add_cart2($id){
			if (isset($_POST["submit"])) {
			$quantity = !empty($_POST["so_luong"])?(Int)$_POST["so_luong"]:1;
			$detail2 = $this->hang_hoamodel->detail($id);
			if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id]['so_luong'] +=$quantity;
			}
			else{
				while ($result = mysqli_fetch_array($detail2)) {
				$items = [
				'id' => $result["id"],
				'Ten_hang_hoa' => $result["Ten_hang_hoa"],
				'gia' => $result["gia"],
				// 'so_luong' => $result["so_luong_hang"],	
				'hinh' => $result["hinh"],
				'name_search'=>$result["name_search"],
				'so_luong' => $quantity,
				];
					$_SESSION['cart'][$id]=$items;

				}
			}

			}
					header("Location:../cart2");
		}
		public function deletecart($id){
			if (isset($_SESSION['cart'][$id])) {
				unset($_SESSION['cart'][$id]);	
				header("Location:../cart2");
			}

		}

		public function get_sl_gio_hang(){

		$product = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
		$total = 0;
		if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
			
			foreach ($_SESSION['cart'] as $sl_sp) {
				
				$total +=$sl_sp['so_luong'];
			}
			$this->view("masterlayout",[
				"total"=>$total,
				"page"=>"page/trangchu",
				"loai_hang"=>$this->loai_hang_hoamodel->get(),
				"all_product"=>$this->hang_hoamodel->get(),
			]);
		}

		}
		public function action(){
			if (isset($_POST["action"])) {
				if (isset($_POST["page"])) {
					$page = $_POST["page"];
				}
				else{
					$page = 1;
				}
				$minimum_price = $_POST["minimum_price"];
				$maximum_price = $_POST["maximum_price"];
				$kq = $this->hang_hoamodel->search_product($minimum_price,$maximum_price,$page);
				$output = '';

				foreach ($kq as  $row) {
							$output .= '
					             <div class="col-12 col-lg-3 col-md-3 padding-laptop col-2th">
										<div class="row">
												<div class ="col-12 content-laptop">
													<div class="laptop-sell">
															<div class="laptop-uploads">
																<a href="home/detail/'.$row["name_search"].'">
																	<img src="'.$row["hinh"].'" alt="không hổ trợ trình duyệt này"/>
																</a>
															</div>
															<div class="laptop-price">
																<div class="name-laptop">
																	<a href="home/detail/'.$row["name_search"].'"">
																		'.$row["Ten_hang_hoa"].'
																	</a>
																</div>
																<div class="price-laptop">
																	<a href="home/detail/'. $row["name_search"].'">
									                                    <span class="price-sell">'. number_format($row["gia"]).' VNĐ</span>
									                                        <p>Trong Kho:'. $row["so_luong_hang"].'</p>
									                                        <!-- <span class="price-dis"><s>60.000.000đ</s></span> -->
									                                    </a>
																</div>
															</div>
													</div>
												</div>
										</div>
		           				 </div>

						';
					}
					echo $output;
				}
				return $kq;
			}
			public function search_name(){
				if (isset($_POST["action"])) {

							$search_product = $_POST["search_product"];
							$kq = $this->hang_hoamodel->search_name($search_product);
							$output = '';
							foreach ($kq as  $value) {
								$output .='
								<li class="list-group">
									<div class="row">
											<div class="col-4 card-img">
												<a>
												<img src ="'.$value["hinh"].'" />
												</a>
											</div>
											<div class="col-8 col-price">
												<div class="card">
													<div class="card-body">
														<div class="name-laptop">
														<a href="home/detail/'.$value["name_search"].'">'.$value["Ten_hang_hoa"].'</a>
														</div>
														<div class="price-laptop">
														<a href="home/detail/'.$value["name_search"].'">'.number_format($value["gia"]).'</a>
														</div>
													</div>
												</div>
											</div>
									</div>
							
								</li>
								';
							}
							echo $output;

					}										 
			}
			///////////////////////////////// comment sản phânm//////////////////////////////////////////////////////////////////////////
			public function thongtin(){

				$ten_khach_hang = $_POST["ten_khach_hang"];
				$email = $_POST["email"];
				$sdt = $_POST["sdt"];
				$content = $_POST["content"];
				$id_hang_hoa = $_POST["id_hang_hoa"];
				$name_search =$_POST["name_search"];
				$kq = $this->khach_hangmodel->insert($ten_khach_hang,$email,$sdt);
				$result = $this->khach_hangmodel->max();
				while ($row = mysqli_fetch_array($result)) {
					 $id_khach_hang = $row["id"];
				}
				$kq2 = $this->comment_model->insert($id_hang_hoa,$id_khach_hang,$content);
				if ($kq2==1 && $kq == 1) {
					echo 1;
				}
				$comment = $this->comment_model->get($name_search);
				$output ="";
				foreach ($comment as $key) {
					
					$output .='
						<table class="table">
							  <thead>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row" style="width:20%;">'.$key["ten_khach_hang"].'</th>
							      <td><textarea class="form-control" rows="5" readonly="true">'.$key['noi_dung'].'</textarea></td>
							    </tr>
							  </tbody>
							</table>

					';
				}
				echo $output;
			}
		
	}

 ?>