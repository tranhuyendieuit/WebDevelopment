    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php 
                    if (isset($data["result"])) {
                        if ($data["result"]=="true") {?>
                          <h5 class="alert alert-success"><?php echo "Thêm Thành Công"; ?></h5>
                        <?php
                      }
                      else{?>
                          <h5 class="alert alert-warning"><?php echo "Thêm thất bại"; ?></h5>
                      <?php
                      }
                    }
                 ?>
                 <div class="form-group">
                   <a href="hanghoa" class="btn btn-warning">Danh sách sản phẩm</a>
                 </div>
                  <form method="POST" action="hanghoa/insert" enctype="multipart/form-data">
                    <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm">
                    </div>
                    <input type="hidden" name="name_search" id="name_search" class="form-control" placeholder="Nhập tên sản phẩm">

                   <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-control"name="id_loai">
                      <?php 
                          while ($id_loai = mysqli_fetch_array($data["loai_hang"])) {?>
                             <option value="<?php echo $id_loai["id"]; ?>" >
                                      <?php echo $id_loai["Ten_loai"]; ?>
                              </option>
                          <?php
                        }
                       ?>
                    
                    </select>
                   </div>
               
                    <div class="form-group">
                     <label>Đơn giá</label>
                    <input type="number" name="gia" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" name="so_luong_hang" class="form-control" min="1" value="1">
                    </div>
                    <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="hinh" class="form-control">
                    </div>
                 
                    <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control ckeditor" name="mo_ta" id="editor" cols="20" rows="20">
                    </textarea>
                    </div>
                    <div class="form-group">
                    <button name="submit" type="submit" class="form-control btn btn-info">
                      Thêm sản phẩm
                    </button>
                    </div>
                 
                  </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>