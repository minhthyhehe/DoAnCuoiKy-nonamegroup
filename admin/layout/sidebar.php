<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../category">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">My Shop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($active_page == 'category') { echo 'active'; } ?>">
                <a class="nav-link" href="../category">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Danh Mục</span></a>
            </li>
            <li class="nav-item <?php if($active_page == 'product') { echo 'active'; } ?>">
                <a class="nav-link" href="../product">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Sản Phẩm</span></a>
            </li>
            <li class="nav-item <?php if($active_page == 'order') { echo 'active'; } ?>">
                <a class="nav-link" href="../order">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Đơn Hàng</span></a>
            </li>
            <li class="nav-item <?php if($active_page == 'user') { echo 'active'; } ?>">
                <a class="nav-link" href="../user">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Tài khoản</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>