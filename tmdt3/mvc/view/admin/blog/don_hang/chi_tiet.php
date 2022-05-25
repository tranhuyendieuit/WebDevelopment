    <div class="container-fluid">

          <!-- Page Heading -->
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php 
                    if (isset($data["result2"])) {
                        if ($data["result2"]=="true") {?>
                          <h5 class="alert alert-success"><?php echo "Xóa Thành Công"; ?></h5>
                        <?php
                      }
                      else{?>
                          <h5 class="alert alert-warning"><?php echo "Xóa thất bại"; ?></h5>
                      <?php
                      }
                    }
                 ?>
                 <div class="form-group">
                   <a href="hanghoa" class="btn btn-warning">Danh sách sản phẩm</a>
                 </div>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên khách hàng</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Ngày đặt hàng</th>
                      <th>Tổng giá trị</th>
                      <th>Tình trạng đơn</th>
                      <th>Action</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i =1;
                        while ($don_hang = mysqli_fetch_array($data["chi_tiet_don_hang"])) {?>
                        <a href="don_hang/view_don_hang/<?php echo $don_hang['id']; ?>" class="btn btn-primary form-group">Xem Chi tiết</a>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $don_hang["ten_khach_hang"]; ?></td>
                                <td><?php echo $don_hang["so_dien_thoai"] ; ?></td>
                                <td><?php echo $don_hang["dia_chi"]; ?></td>
                                <td><?php echo $don_hang["ngay_dat_hang"]; ?></td>
                                <td><?php echo number_format($don_hang["tong_tien"]) ; ?></td>
                                <td><?php  if ($don_hang["id_trang_thai"]==1) {?>
                                        <h5 class="text text-success"><?php echo "Đã xác nhận"; ?></h5>
                                  <?php
                                      }
                                      else {?>
                                        <h5 class="text text-danger"><?php echo "Chưa xác nhận"; ?></h5>
                                      <?php
                                    }
                                 ?>
                               </td>
                                  <td><?php  if ($don_hang["id_trang_thai"]==1) {?>
                                        <h5 class="text text-success"><?php echo "Đã xác nhận"; ?></h5>
                                  <?php
                                      }
                                      else {?>
                                       <a href="don_hang/update/<?php echo $don_hang["id"]; ?>" class="btn btn-success">Xác nhận đơn</a>
                                      <?php
                                    }
                                 ?>
                               </td>
                               
                                 <td><a href="don_hang/delete/<?php echo $don_hang["id"]; ?>" class="btn btn-warning">Xóa đơn hàng</a></td>
                              </tr>
                        <?php
                       $i++; }
                     ?>
                  </tbody>
                </table>

               
             
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>