<?php 
		
		class apiori extends controller {

			public $chi_tiet_don_hangmodel;
			public $hang_hoamodel;
			function __construct(){

				$this->chi_tiet_don_hangmodel = $this->model("chi_tiet_don_hangmodel");
				$this->hang_hoamodel = $this->model("hang_hoamodel");
			}

			public function homePage(){
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
		            $alt_item = $theitems[ ($x + 1) % count($theitems)];
		            echo "[+] $ia_key($ia_value) --> $item_name($item_total) => ". $in_float ."\r\n";
		            echo "<pre>";
		            echo "    ". $in_percent ."% yang membeli $item_name juga membeli $alt_item\r\n\r\n";
		        }
		    }


			}
			public function replace(){

				
			}
		}

 ?>