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
         <a href="slider/view_insert" class="btn btn-secondary">Thêm slider</a>
       </div>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên slider</th>
            <th>Ảnh đại diện</th>
            <th>Lựa chọn</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i =1;
              while ($slider = mysqli_fetch_array($data["slider"])) {?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $slider["tenSlider"]; ?></td>
                      <td class="uploads"><img src="<?php echo $slider["image"] ?>"></td>
                      <!-- <td>
                      <div class="collapse" id="collapseExample<?php echo $hang_hoa["id"]; ?>">
                        <div class="card card-body">
                        <?php echo $hang_hoa["mo_ta"]; ?>
                        </div>
                      </div>     
                        </td> -->
                        <td><a href="slider/delete/<?php echo $slider["id"]; ?>" class="btn btn-danger">Delete</a></td>
                        <!-- <td><a href="slider/edit/<?php echo $slider["id"]; ?>" class="btn btn-success">Edit</a></td> -->
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