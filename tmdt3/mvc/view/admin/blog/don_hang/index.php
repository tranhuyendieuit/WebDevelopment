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
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Thành Tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i =1;
                    $total = 0;
                        while ($don_hang = mysqli_fetch_array($data["don_hang"])) {
                          $total =$don_hang["so_luong"]*$don_hang["gia"];
                          ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $don_hang["ten_hang_hoa"]; ?></td>
                                <td><?php echo $don_hang["so_luong"] ; ?></td>
                                <td><?php echo  number_format($don_hang["gia"]); ?></td>
                                <td><?php echo number_format($total); ?></td>
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