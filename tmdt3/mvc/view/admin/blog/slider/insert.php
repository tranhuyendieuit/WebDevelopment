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
         <a href="slider" class="btn btn-warning">Danh sách slider</a>
       </div>
        <form method="POST" action="slider/insert" enctype="multipart/form-data">
          <div class="form-group">
          <label>Tên slider</label>
          <input type="text" name="tenSlider" id="tenSlider" class="form-control" placeholder="Nhập tên sản phẩm">
          </div>
          <input type="hidden" name="name_search" id="name_search" class="form-control" placeholder="Nhập tên sản phẩm">

          <div class="form-group">
          <label>Ảnh đại diện</label>
          <input type="file" name="image" class="form-control">
          </div>
          <div class="form-group">
          <button name="submit" type="submit" class="form-control btn btn-info">
            Thêm slider
          </button>
          </div>
       
        </form>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>