<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/admin_asset/dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">QUẢN LÝ CHUNG</li>
        <li class="treeview">
          <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview {{(\Request::route()->getName() == 'nhansu') ? 'active' : ''}} ">
          <a href="/admin/nhansu">
            <i class="fa fa-files-o"></i>
            <span>QUẢN LÝ NHÂN SỰ</span>
          </a>
        </li>

        <li class="treeview {{(\Request::route()->getName() == 'chamcong') ? 'active' : ''}} ">
          <a href="/admin/chamcong">
            <i class="fa fa-files-o"></i>
            <span>QUẢN LÝ CHẤM CÔNG</span>
          </a>
        </li>

        <li class="treeview {{(\Request::route()->getName() == 'thuong') ? 'active' : ''}} ">
          <a href="/admin/thuong">
            <i class="fa fa-files-o"></i>
            <span>QUẢN LÝ THƯỞNG</span>
          </a>
        </li>

         <li class="treeview {{(\Request::route()->getName() == 'luong') ? 'active' : ''}} ">
          <a href="/admin/luong">
            <i class="fa fa-files-o"></i>
            <span>QUẢN LÝ LƯƠNG</span>
          </a>
        </li>

        <li class="treeview {{(\Request::route()->getName() == 'phongban') ? 'active' : ''}} ">
          <a href="/admin/phongban">
            <i class="fa fa-files-o"></i>
            <span>QUẢN LÝ PHÒNG BAN</span>
          </a>
        </li>

        <?php if (Auth::user()->rule == 1): ?>
            <li class="treeview {{(\Request::route()->getName() == 'user') ? 'active' : ''}} ">
              <a href="/admin/user">
                <i class="fa fa-files-o"></i>
                <span>QUẢN LÝ USER</span>
              </a>
            </li>
        <?php endif ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>