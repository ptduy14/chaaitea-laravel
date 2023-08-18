<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="\admin" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="/admins/assets/img/icons/brands/chaai-logo2.png" alt="">
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Home -->
      <li class="menu-item active">
        <a href="\admin" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Home</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Dashboard</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="/admin/category" class="menu-link">
              <div data-i18n="Without menu">Danh Mục</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="/admin/product" class="menu-link">
              <div data-i18n="Without navbar">Sản Phẩm</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="/admin/order" class="menu-link">
              <div data-i18n="Without navbar">Đơn hàng</div>
            </a>
          </li>
          
          <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Layouts">Tài Khoản</div>
            </a>
    
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/admin/customer" class="menu-link">
                  <div data-i18n="Without menu">Khách hàng</div>
                </a>
              </li>
              @if (in_array('admin', Auth::user()->getRoleNames()->toArray()))
                <li class="menu-item">
                  <a href="/admin/admin" class="menu-link">
                    <div data-i18n="Without navbar">Admin</div>
                  </a>
                </li>     
              @endif
              <li class="menu-item">
                <a href="/admin/staff" class="menu-link">
                  <div data-i18n="Without navbar">Nhân viên</div>
                </a>
              </li>  
            </ul>
        </li>
        </ul>
    </ul>
  </aside>