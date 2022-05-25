    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <!--   <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
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
                          <h5 class="alert alert-dark"><?php echo "Email đã tồn tại"; ?></h5>
                      <?php
                      }
                    }
                 ?>
                 <div class="form-group">
                   <a href="user" class="btn btn-warning">Danh sách user</a>
                 </div>
                 <?php 
                    while ($user = mysqli_fetch_array($data["user"])) {?>
                   <form method="POST" action="user/update/<?php echo $user["id"]; ?>">
                    <div class="form-group">
                    <label>Họ Tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập Họ Tên" value="<?php echo $user["name"]; ?>">
                    </div>
                    <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="dia_chi" class="form-control" placeholder="Nhập Địa Chỉ" value="<?php echo $user["Dia_Chi"] ?>">
                    </div>
                    <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" placeholder="Nhập Số điện thoại" value="<?php echo $user["So_Dien_Thoai"]; ?>">
                    </div>
                    <div class="form-group">
                    <button name="submit" type="submit" class="form-control btn btn-info">
                     Sửa Thông tin người quản lý
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