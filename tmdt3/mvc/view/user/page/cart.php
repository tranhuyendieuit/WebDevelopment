<div class="container">
    <div class="row cart-title">
        <div class="col-12 col-lg-10 col-md-12">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="comback-index">
                        <a href="../view/masterlayout.php"><h4><i class="fa fa-undo"></i> Muốn mua thêm sản phẩm khác</h4></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-12 right-title">
                    <div class="name-cart">
                        <h5>giỏ hàng của bạn</h5>
                    </div>
                </div>
            </div>
            <div class="row item-cart">
                <?php 
                    while ($cart = mysqli_fetch_array($data["detail"])) {?>
                <div class="col-12 col-lg-2 img-cart">
                        <img src="public/uploads/<?php echo $cart["hinh"]; ?>">
                </div>
                <div class="col-12 col-lg-8">
                    <div class="list-item-cart">
                        <!----------- chi tiết sản phẩm bán kèm----------------->
                        <ul>
                            <li><a href="home/detail/<?php echo $cart["id"]; ?>"><?php echo $cart["Ten_hang_hoa"]; ?></a></li>
                            <li>Nước rửa tay mini</li>
                            <li>Xà phòng khô</li>
                            <li> Mua kèm Áo len ưu đãi giảm 60.000đ</li>
                        </ul>
                        <!------------------------------------------------------->
                    </div>
                </div>
                <div class="col-12 col-lg-2">
                        <div class="price-cart">
                            <h5><?php echo  number_format($cart["gia"]); ?></h5>
                        </div>
                    <!--------------- số lượng -------------------->
                    <div class="count-cart">
                           
                    </div>
                    <!--------------------------------------------------->
                </div>
                <!------------ tổng tiền bán của hàng hóa ------------------>
                <div class="col-12 col-lg-12 total-cart">
                    <div>
                        <span>Đơn giá:</span>
                        <span class="right-cart"><input type="text" name="price" id="gia" disabled="true" class="form-control" value="<?php echo  $cart["gia"]; ?>"></span>
                    </div>
                    <div class="shipping_home">

                        <div class="total" data-value="27490000">
                            <b>Cần thanh toán:</b>
                          <strong><input type="text" name="money_total" id="total2" class="form-control" value="<?php echo  $cart["gia"]; ?>" disabled="true"></strong>
                        </div>
                    </div>
                </div>
               
  
                <!-------------------------------------------------------------->
                <div class="col-12 col-lg-12">
                    <!---------------- Thông tin khách hàng để giao -------------------->

                    <form class="cod-ship" method="POST" action="home/add_to_cart/<?php echo $cart["id"]; ?>">
                        <h3>Thông tin nhận hàng</h3>
                                    <div class="news" method="POST">
                            <label>Tên hàng</label>
                            <input type="text" name="ten_hang" class="form-control" value="<?php echo $cart["Ten_hang_hoa"]; ?>" readonly="" name="ten_hang">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="sl" id="sl" value="1" min="1" max ="<?php echo $cart["so_luong_hang"]; ?>">
                            <label>Tổng giá đơn hàng</label>
                            <input type="text"  class="form-control" value="<?php echo  $cart["gia"]; ?>" readonly name="price" id="total">
                            <input type="text" placeholder="Họ Tên" class="form-control" name="ho_ten">
                            <input type="text" placeholder="Nhập số điện thoại" class="form-control" name="sdt" id="sdt">
                        </div>
                        <input type="hidden" name="ngay_dat_hang" value="<?php echo date('y-m-d'); ?>">
                        <div class="address-cod"> 
                            <input type="text" placeholder="Nhập địa chỉ" class="form-control" name="dia_chi">
                            <input type="submit" value="Đặt hàng" name="submit" class="form-control">
                        </div>

                    </div>
                    </form>

                        <?php
                    }
                 ?>
                 <?php 
        if (isset($data["result"])){?>
        <h6>
            <?php 
            if($data["result"]=="true"){
             echo "Đặt hàng thành công";
            }
            else {
                echo "Đặt hàng thất bại";
             }
            ?>
        </h6>
        <?php } ?>
                    <!--------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>