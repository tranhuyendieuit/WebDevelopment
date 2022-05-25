    <div class="container-fluid">

          <!-- Page Heading -->
        <!--   <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
        <!--       <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php 
                    if (isset($data["result"])) {
                        if ($data["result"]=="true") {?>
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
                   <a href="hanghoa/view_insert" class="btn btn-secondary">Thêm sản phẩm</a>
                 </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Ảnh đại diện</th>
                      <th>Loại sản phẩm</th>
                      <th>Mô tả</th>
                      <th>Action</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i =1;
                        while ($hang_hoa = mysqli_fetch_array($data["all_product"])) {?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $hang_hoa["Ten_hang_hoa"]; ?></td>
                                <td><?php echo number_format($hang_hoa["gia"]) ; ?></td>
                                <td><?php echo $hang_hoa["so_luong_hang"]; ?></td>
                                <td class="uploads"><img src="<?php echo $hang_hoa["hinh"] ?>"></td>
                                <td><?php echo $hang_hoa["id_loai"]; ?></td>
                                <td>
                                  <p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $hang_hoa["id"]; ?>" aria-expanded="false" aria-controls="collapseExample">
                                    Xem Mô Tả
                                  </button>
                                </p>
                                <div class="collapse" id="collapseExample<?php echo $hang_hoa["id"]; ?>">
                                  <div class="card card-body">
                                  <?php echo $hang_hoa["mo_ta"]; ?>
                                  </div>
                                </div>     
                                  </td>
                                  <td><a href="hanghoa/delete/<?php echo $hang_hoa["id"]; ?>" class="btn btn-danger">Delete</a></td>
                                  <td><a href="hanghoa/edit/<?php echo $hang_hoa["id"]; ?>" class="btn btn-success">Edit</a></td>
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