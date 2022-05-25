<!DOCTYPE html>
<html>
<head>
	<title>SHOPPING SRORE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="http://localhost/tmdt3/">
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/style2.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<meta charset="utf-8"/>
<meta name="author" content=""/>
<meta name="description" content="tmdt,shopping"/>
<meta name="keyword" content="tmdt,abc,xyz"/>
    <link href = "public/css/jquery-ui.css" rel ="stylesheet">
    <script type="text/javascript">
	$('.carousel').carousel({
  interval: 20000000
});
</script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="public/js/owlcarousel/owl.carousel.js"></script>
  <script type="text/javascript" src="public/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="public/js/bootstrap.js"></script>


</head>
<body>
	<header class="sticky-top" style="background:rgb(6 6 6);">
		<div class="container">
			<div class="row header-top-2 sticky-top ">
				<div class="col-12">
					<div class="row tablet">
						<div class="col-12 col-lg-2 col-md-2 logo">
							<a href="home/homepage"><img src="public/uploads/logoHades.png"></a>
						</div>
						<div class="col-12 col-lg-10 col-md-10" style="padding-left: 0px;">
							<div class="menu-product mean-bar">
								<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-light">
  							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background: #F17528;">
  						  <span class="navbar-toggler-icon"></span>
  						</button>
  						<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item"><a href="trangchu" style="color: #F17528; font-weight: bold;">Trang chủ</a></li>
									
									<li class="nav-item"><a href="gioithieu" style="color: #F17528; font-weight: bold;">Giới thiệu</a></li>
															<?php 

																while ($loai_hang = mysqli_fetch_array($data["loai_hang"])) {
																?>
																	<li class="nav-item"><a href="home/product/<?php echo $loai_hang["id"]; ?>" style="color: #F17528; font-weight: bold;"><?php echo $loai_hang["Ten_loai"]; ?></a></li>

																<?php
															}

															 ?>
								
								
									<li class="nav-item"><a href="home/cart2"><i class="fa fa-shopping-cart text text-danger" style="color: #f75415!important;">
										<?php
										if ($product = !empty($_SESSION['cart'])?$_SESSION['cart']:[]) {
              						 		 $total = 0;
										 	  foreach ($_SESSION['cart'] as  $sl_sp) {
		              						  	$total +=$sl_sp['so_luong'];
		              						  }
					              				if ($total>=0) {?>
			              						  	
			              						  	<i class="badge badge-danger badge-counter" style="background: #f76700; color: #ffffff;"><?php echo $total; ?></i>
			              						  <?php
			              						}
			              						  else{
			              						  	echo $total.""."+";
			              						  }
										 }  
									 ?>
									</i></a></li>
									
								</ul>
							</div>
							</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
	</header>
	
	<div class="container">
		<div class="row header-top">
			<div class="col-12">
				<div class="row header-top-child">
					<div class="col-12">
						<div class="address">
							<a href="#" class="email"><i class="fa fa-envelope"></i> shopping@gmail.com</a>
							<a href="tel:0982824398" class="phone"><i class="fa fa-phone"></i> 0966 08 06 02</a>
								<ul class="menu-icon">
									<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								</ul>
									
						</div>
					</div>
				</div>
			</div>
			<div class="col-4" style="padding: 0">
					<input type="search" name="search_product" id="search_product" class="form-control" style="border-radius: 20px;">
							<ul class="list-group" id="product" style="position: absolute; z-index: 99999; width: 100%;background-color: #fff;">
							</ul>
			</div>
			</div>
