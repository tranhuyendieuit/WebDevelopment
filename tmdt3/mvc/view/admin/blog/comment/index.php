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
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Nội dung bình luận</th>
                      <th>Sản phẩm</th>
                      <th>&nbsp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i =1;
                    $total = 0;
                        while ($comment = mysqli_fetch_array($data["comment"])) {
                          ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $comment["ten_khach_hang"]; ?></td>
                                <td><?php echo $comment["email"] ; ?></td>
                                <td><?php echo $comment["sdt"] ?></td>
                                <td>

                                  <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $comment["id"]?>" aria-expanded="false" aria-controls="collapseOne">
                                    Xem nội dung
                                  </button>
                                </h2>
                              </div>

                              <div id="collapseOne<?php echo $comment["id"] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                  <?php echo $comment["noi_dung"]; ?>
                               
                                </div>
                              </div>
                            </div>
                          </div>
                                  
                                </td>
                                <td><?php echo $comment["ten_hang_hoa"]; ?></td>
                                <td><a href="" class="btn btn-danger">Xóa</a></td>
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