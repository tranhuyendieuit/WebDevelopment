    <div class="container-fluid">

          <!-- Page Heading -->
      <!--     <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php 
                    if (isset($data["result"])) {
                        if ($data["result"]=="true") {?>
                          <h5 class="alert alert-success"><?php echo "Xác nhận Thành Công"; ?></h5>
                        <?php
                      }
                      else{?>
                          <h5 class="alert alert-warning"><?php echo "Xác nhận thất bại"; ?></h5>
                      <?php
                      }
                    }
                 ?>
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
                 <div style="margin-bottom: 20px;">
                 
                 </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <a href="javascript:history.go(-1)" class="btn btn-warning form-group">Trở lại</a>
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên khách hàng</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Ngày đặt</th>
                      <th>Trạng thái</th>
                      <th>Tổng giá trị</th>
                      <th>&nbsp</th>
                      <th>&nbsp</th>
                      <th>&nbsp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i =1;
                    $total = 0;
                        while ($don_hang = mysqli_fetch_array($data["don_hang"])) {
                          ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $don_hang["ten_khach_hang"]; ?></td>
                                <td><?php echo $don_hang["sdt"] ; ?></td>
                                <td><?php echo $don_hang["dia_chi"]; ?></td>
                                <td><?php echo $don_hang["ngay_dat_hang"]; ?></td>
                                <td>
                                <?php  if ($don_hang["id_status"]==1) {?>
                                    
                                    <h5 class="text text-success"><?php echo "Đã xác nhận" ?></h5>

                                <?php } 
                                  else{?>
                                          <h5 class="text text-danger"><?php echo "Đang chờ" ?></h5>
                                  <?php }


                                  ?>
                                  
                                </td>
                                <td><?php echo $don_hang["tong_tien"]; ?></td>
                                <td><a href="don_hang/view_don_hang/<?php  echo $don_hang['id'];  ?>" class="btn btn-primary">Xem chi tiết</a></td>
                                 <td><a href="don_hang/delete/<?php echo $don_hang["id"]; ?>" class="btn btn-warning">Xóa đơn hàng</a></td>
                                 <td><?php  if ($don_hang["id_status"]==1) {?>
                                        <h5 class="text text-success"><?php echo "Đã xác nhận"; ?></h5>
                                  <?php
                                      }
                                      else {?>
                                       <a href="don_hang/update/<?php echo $don_hang["id"]; ?>" class="btn btn-success">Duyệt đơn</a>
                                      <?php
                                    }
                                 ?>
                               </td>
                                

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