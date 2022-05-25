<div class="container">
    <div class="row row-cart">
        <div class="col-12">
            <h3 class="form-group" style="margin-top: 2%;">Giỏ hàng</h3>
        </div>
        <div class="col-12">
                  <div class="table table-responsive">
            <?php 
                $product = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
                ?>
         <form action="home/dat_hang" method="POST">
            <table class="table" cellpadding="0">
              <thead class="thead-light">
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Đơn giá</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Thành Tiền</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i =1 ;
                $tong2 = 0;
                $sl_sp = 0;
                        foreach ($product as  $items) {
                            $total= $items["gia"]*$items["so_luong"];
                            $total2= $items["gia"]*$items["so_luong"];
                            $tong = 0;
                            $tong2  +=$total2;
                            $sl_sp +=$items["so_luong"];
                            ?>
                        <tr>
                          <td scope="row"><?php echo $i; ?><input type="hidden" name="id_hang_hoa" value="<?php echo $items["id"]; ?>"></td>
                          <td><?php echo $items["Ten_hang_hoa"] ?>
                            <input type="hidden" name="Ten_hang_hoa" value="<?php echo $items["Ten_hang_hoa"] ?>">
                          </td>
                          <td class="img"><img src="<?php echo $items["hinh"]; ?>"></td>
                          <td><?php echo number_format( $items["gia"]); ?></td>
                          <td>
                            <input type="number" name="so_luong<?php echo $items['name_search']; ?>" value="<?php echo $items["so_luong"]; ?>" class="form-control" min="1">
                          <td><?php echo number_format($total); ?></td>
                          <td><a href="home/deletecart/<?php echo $items['name_search']; ?>">Xóa</a></td>
                        </tr>
                        <?php
                   $i++; }
                 ?>
                <tr>
                    <td>&nbsp;</td>
                  <td>Tổng Tiền</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><?php if (isset($tong2)) {
                     echo number_format($tong2);
                  }
                  else {
                    echo $tong2 = 0;
                  }  ?>
                    <input type="hidden" name="tong_don_hang" value="<?php echo $tong2; ?>">
                    <input type="hidden" name="tong_sl" value="<?php echo $sl_sp; ?>">
                  </td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
           <input type="submit" name="update_sl" class="btn btn-warning form-control" value="Cập nhật">
          <a href="home" class="btn btn-danger" style="margin-top: 2%;">Mua thêm sản phẩm khác</a>
           <div  style="margin-top: 20px;">
              <?php 
                  if (isset($data["result"])) {
                      if ($data["result"]=="true") {?>
                        <label class="alert alert-success">Mua thành công, chúng tôi sẽ liên hệ xác nhận với bạn sớm</label>
                      <?php
                      }
                      else {?>
                          <label class="alert alert-danger">Bạn chưa điền đủ thông tin</label>
                      <?php
                    }
                  }
               ?>
           </div>
            <div class="form-group">
             <label>Tên khách hàng:</label>
             <input type="text" name="ten_khach_hang" class="form-control">    
            </div>
            <div class="form-group">
             <label>Số điện thoại:</label>
             <input type="text" name="sdt" class="form-control">    
            </div>
            <div class="form-group">
             <label>Địa chỉ:</label>
             <input type="text" name="dia_chi" class="form-control">    
            </div>
            <div class="form-group">
              <input type="hidden" name="ngay_dat_hang" value="<?php echo date('y-m-d'); ?>">
             <input type="submit" name="submit" class="form-control btn btn-success" value="Đặt hàng">    
            </div>
            </form>   
        </div>
        </div>
    </div>
</div>
</div>
</div>