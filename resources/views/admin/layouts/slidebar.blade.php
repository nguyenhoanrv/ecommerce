  <div class="vertical-menu">

      <div data-simplebar="init" class="h-100">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title" key="t-menu">Menu</li>

                  <li>
                      <a href="javascript: void(0);" class="waves-effect">
                          <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end">04</span>
                          <span key="t-dashboards">Dashboards</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="index.html" key="t-default">Default</a></li>
                          <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                          <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                          <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="bx bx-layout"></i>
                          <span key="t-layouts">Category</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="true">
                          <li><a href="{{ URL::to('/admin/category') }}" key="t-light-sidebar">Category</a></li>
                          <li><a href="{{ URL::to('/admin/brand') }}" key="t-compact-sidebar">Brand</a></li>
                          <li><a href="{{ URL::to('/admin/subcategory') }}" key="t-scrollable">SubCategory</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="bx bx-store"></i>
                          <span key="t-ecommerce">Coupon</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ URL::to('/admin/coupon') }}" key="t-coupon">Coupon</a></li>
                          <li><a href="{{ URL::to('/admin/newletter') }}" key="t-letter">New letter</a></li>
                      </ul>
                  </li>
                  <li class="menu-title" key="t-apps">Apps</li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="bx bx-tone"></i>
                          <span key="t-ui-product">Product</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ URL::to('/admin/product/create') }}" key="t-new-product">New product</a>
                          </li>
                          <li><a href="{{ URL::to('/admin/product') }}" key="t-new-product">All product</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
