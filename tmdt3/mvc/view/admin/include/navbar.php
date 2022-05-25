 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #229ec3;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="login/logout">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Đăng xuất</span></a>
      </li>
      <?php 
          if (isset($_SESSION["id"])) {
            # code...
          }
       ?>
      <li class="nav-item active">
        <span type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal<?php echo $_SESSION["id"]; ?>">
          Đổi mật khẩu
        </span>

      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Quản lý sản phẩm</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="hanghoa">Danh sách sản phẩm</a>
          </div>
        </div>
      </li>

      

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Loại Sản Phẩm</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="loai_hang_hoa">Danh sách</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Quản lý đơn hàng</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php 
                while ($id_don = mysqli_fetch_array($data["id_don"])) {?>
               <a class="collapse-item" href="don_hang/view_chi_tiet/<?php  echo $id_don['id'];  ?>">Đơn hàng #<?php echo $id_don['id']; ?></a>
                <?php
                }
             ?>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="user">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Quản lý user</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="don_hang">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Đơn đã được duyệt</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="don_hang/status_2">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Đơn chờ xác nhận</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="slider">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Quản lý slider</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $_SESSION["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="modal-body" action="<?php echo $_SESSION["id"]; ?>"onsubmit="return false;" id="formChangePass" method="POST">
          <div class="form-group">
            <label>Nhập mật khẩu cũ</label>
            <input type="password" name="old_pass" id="old_pass" class="form-control">
          </div>
          <div class="form-group">
            <label>Nhập mật khẩu mới</label>
            <input type="password" name="new_pass" id="new_pass" class="form-control">
          </div>
         <div class="form-group">
            <label>Nhập mật khẩu xác nhận</label>
            <input type="password" name="re_new_pass" id="re_new_pass" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="re_new_pass" id="submit" class="form-control btn btn-success" value="Lưu mật khẩu mới">
          </div>
               <div class="alert alert-danger hidden"></div>
               <div class="alert alert-success hidden"></div>
          </form>
    </div>
  </div>
</div>