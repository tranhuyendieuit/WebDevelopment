		
		<footer>
			<div class="container">
	<div class="row">
		<div class="col-12 footer-center">
			<div class="row row-footer">
				<div class="col-12 col-lg-3 col-md-6">
					<div class="row">
						<div class="col-12">
							<h5><i class="fa fa-mobile fa-2x"></i> ÁO</h5>
						</div>
						<div class="col-12">
							<a href="#">Áo Hoodie</a>
						</div>
						<div class="col-12">
							<a href="#">Áo thun</a>
						</div>
						<div class="col-12">
							<a href="#">Áo khoác</a>
						</div>
						<div class="col-12">
							<a href="#">Áo len</a>
						</div>
					</div>
				</div>
					<div class="col-12 col-lg-3 col-md-6">
					<div class="row">
						<div class="col-12">
							<h5><i class="fa fa-laptop fa-2x"></i> QUẦN</h5>
						</div>
						<div class="col-12">
							<a href="#">Quần đùi</a>
						</div>
						<div class="col-12">
							<a href="#">Quần dài</a>
						</div>
						<div class="col-12">
							<a href="#">Quần thun</a>
						</div>
					</div>
				</div>
						<div class="col-12 col-lg-3 col-md-6">
					<div class="row">
						<div class="col-12">
							<h5><i class="fa fa-phone fa-2x"></i> Liên hệ</h5>
						</div>
						<div class="col-12">
							<a href="#"><span>Hổ trợ tư vấn:1900.9867</span></a>
						</div>
						<div class="col-12">
							<a href="#"><span>Hổ trợ mua hàng:1900.2556</span></a>

						</div>
						<div class="col-12">
							<a href="#"><span>Hổ trợ đổi trả:1900.5555</span></a>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-3 col-md-6">
					<div class="row">
						<div class="col-12">
							<h5><i class="fa fa-users fa-2x"></i> Thông tin tuyển dụng</h5>
						</div>
						<div class="col-12">
							<a href="#">Nhân viên bán hàng</a>
						</div>
							<div class="col-12">
							<a href="#">Nhân viên sale</a>
						</div>
							<div class="col-12">
							<a href="#">Nhân viên hổ trợ kỹ thuật</a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Đăng Nhập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form action="" class="login">
				<label for="#">Tài Khoản</label>
				<input type="text"name="username" value="" placeholder="nhập tài khoản"/>
				<p></p>
				<label for="#">Mật Khẩu</label>
				<input type="password"name="password" value="" placeholder="nhập mật khẩu" />
				<p></p>
				<button type="submit" name="submit_DN">Đăng nhập</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	</div>
</footer>


<!-------------------------------------------- End footer Promo --------------------------->
<!------------- start copy right ----------------------->
<div class="footer-end">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p>@Cửa hàng chuyên quần áo và phụ kiện phiên bản giới hạn HADES , SHOPPINGHADES@gmail.com, Địa chỉ: 470 Trần Đại Nghĩa - Quận Ngũ Hành Sơn - TP.Đà Nẵng</p>
            </div>
        </div>
    </div>
    <div class="ring">
        <div class="class-1">
            <div class="class-2"></div>
            <div class="class-3"></div>  
            <div class="class-4"><a href="tel:0966080602"><i class="fa fa-phone fa-3x" style="background: #dd7b03;"></i></a></div>
        </div>
    </div>
    <div class="hot-line">
    <!-- <a href="tel:0982824398"></a> -->
    </div>
</div>
<!-------------------- end footer copy right --------------->
</div>
</body>
<script type="text/javascript">
	
    $(document).ready(function(){
         var dongia = $("#gia").val();
         var rong = 0;
        $("#sl").click(function(){
            var tong = parseInt($("#sl").val())*parseInt(dongia);
            $("#total").val(tong);
            $("#total2").val(tong);
        });
            $("#sl").keyup(function(){
            	if ($("#sl").val()!="") {
            		var tong = parseInt($("#sl").val())*parseInt(dongia);
            		console.log($("#sl").val());
          		  	$("#total").val(tong);
            		$("#total2").val(tong);
            	}
            	else {
            		$("#total2").val(0);
            		$("#total").val(0);
            	}
               });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="public/js/jquery.elevatezoom.js" type="text/javascript"></script>	

<script>
    filter_data();
    function filter_data(page)
    {

        // $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var  page =  page;
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
           $.ajax({
            url:"home/action",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price,page:page},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
           
    }

 	 function pageclick(numberpage){
 		var  page =numberpage;
   		 filter_data(page);

 	}

    $('#slider').slider({
        range:true,
        min:0,
        max:65000000,
        values:[10000, 65000000],
        step:5000,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
 
   



</script>
<script type="text/javascript">
	$(document).ready(function(){

		var action = 'search';
			$("#search_product").keyup(function(){
				var search_product = $("#search_product").val();
				if (search_product != '') {
					$.ajax({
					url:"http://localhost/tmdt3/home/search_name",
					method:"POST",
					data:{action:action,search_product:search_product},
					success:function(data){
              			 $('#product').html(data);		
					}
				});

			}
			else{
						$('#product').html("");
					}
		});
	});
</script>
<script type="text/javascript">
	
	$(document).ready(function(){
		$("#submit").click(function(){
			$ten_khach_hang = $("#ten_khach_hang").val();
			$email = $("#email").val();
			$sdt = $("#sdt").val();
			$content = $("#content").val();
			$id_hang_hoa = $("#id_san_pham").val();
			$name_search = $("#name_search").val();
			if ($ten_khach_hang =='' || $email == '' || $sdt =='') {
                 $('#comment .alert').removeClass('hidden');
				alert("Vui lòng nhập thông tin");
			}
			else if ($content =="") {
				alert("Nhập nội dung bình luận");
			}
			else{
				$.ajax({
					url:"home/thongtin",
					method:"POST",
					data:{ten_khach_hang:$ten_khach_hang,email:$email,sdt:$sdt,content:$content,id_hang_hoa:$id_hang_hoa,name_search:$name_search
					},
					success:function(data){

							$('#ten_khach_hang').val([]);
							$('#email').val([]);
							$('#sdt').val([]);
							$('#content').val([]);
                	 		$('#comment .alert').html("Cảm ơn bạn đã góp ý");
                	 		$('#danhgia').html(data);
					}

				});
			}
			console.log($name_search);

		});
	});
</script>
</html>