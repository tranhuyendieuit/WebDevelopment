    <div class="container-fluid">

          <!-- Page Heading -->
       <!--    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             <!--  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php 
                    if (isset($data["result"])) {
                        if ($data["result"]=="true") {?>
                          <h5 class="alert alert-success"><?php echo "Sửa Thành Công"; ?></h5>
                        <?php
                      }
                      else{?>
                          <h5 class="alert alert-warning"><?php echo "Sửa thất bại"; ?></h5>
                      <?php
                      }
                    }
                 ?>
                        <?php 
                    if (isset($data["result2"])) {
                        if ($data["result2"]=="true") {?>
                          <h5 class="alert alert-success"><?php echo "Sửa Thành Công"; ?></h5>
                        <?php
                      }
                      else{?>
                          <h5 class="alert alert-dark"><?php echo "Loại sản phẩm đã tồn tại"; ?></h5>
                      <?php
                      }
                    }
                 ?>
                <div class="form-group">
                   <a href="loai_hang_hoa" class="btn btn-warning">Danh sách sản phẩm</a>
                 </div>
                 <?php 
                    if ($loai_hang_hoa = mysqli_fetch_array($data["chi_tiet"])) {?>
                  <form method="POST" action="loai_hang_hoa/update/<?php echo $loai_hang_hoa["id"]; ?>">
                    <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="ten_loai" class="form-control" placeholder="Nhập loại sản phẩm" value="<?php echo $loai_hang_hoa["Ten_loai"]; ?>">
                    </div>
                    <div class="form-group">
                    <button name="submit" type="submit" class="form-control btn btn-info">
                      Sửa Thông Tin Loại Sản Phẩm
                    </button>
                    </div>
                  </form>

                    <?php
                    }
                  ?>
               </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>