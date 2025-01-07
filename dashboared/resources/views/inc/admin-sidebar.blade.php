<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo" style="color: white; ">
          LumiPick
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
        
                
                <a href="{{ url('admin/dashboard')}}">
                  <span class="sub-item"><i class="fas fa-home"></i> Dashboard </span>
                </a>
            
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Components</h4>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#base">
                <i class="fas fa-layer-group"></i>
                <p>Users</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="base">
                <ul class="nav nav-collapse">
                  {{-- <li>
                    <a href="{{ url('admin/add-user')}}">
                      <span class="sub-item">Add Users</span>
                    </a>
                  </li> --}}
                  <li>
                    <a href="{{ url('admin/user')}}">
                      <span class="sub-item">View Users</span>
                    </a>
                  </li>
                
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#sidebarLayouts">
                <i class="fas fa-th-list"></i>
                <p>Category</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{ url('admin/add-category')}}">
                      <span class="sub-item">Add Category</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('admin/category')}}">
                      <span class="sub-item">View Category</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#forms">
                <i class="fas fa-pen-square"></i>
                <p>Products</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                  {{-- <li>
                    <a href="{{ url('admin/add-product')}}">
                      <span class="sub-item">Add Products</span>
                    </a>
                  </li> --}}
                  <li>
                    <a href="{{ url('admin/product')}}">
                      <span class="sub-item">view Products</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#tables">
                <i class="fas fa-table"></i>
                <p>Orders</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{ url('admin/order')}}">
                      <span class="sub-item">View Orders</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#maps">
                <i class="fas fa-book"></i>
                <p>Messages</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="maps">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{ url('admin/contact')}}">
                      <span class="sub-item">View Messages</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#charts">
                <i class="far fa-chart-bar"></i>
                <p>Review</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{ url('admin/review')}}">
                      <span class="sub-item">View Review</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            {{-- <li class="nav-item">
              <a data-bs-toggle="collapse" href="#maps">
                <i class="fas fa-book"></i>
                <p>Reviews</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="maps">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{ url('admin/review')}}">
                      <span class="sub-item">View Reviews</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#charts">
                <i class="far fa-chart-bar"></i>
                <p>Charts</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="charts/charts.html">
                      <span class="sub-item">Chart Js</span>
                    </a>
                  </li>
                  <li>
                    <a href="charts/sparkline.html">
                      <span class="sub-item">Sparkline</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="widgets.html">
                <i class="fas fa-desktop"></i>
                <p>Widgets</p>
                <span class="badge badge-success">4</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../documentation/index.html">
                <i class="fas fa-file"></i>
                <p>Documentation</p>
                <span class="badge badge-secondary">1</span>
              </a>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#submenu">
                <i class="fas fa-bars"></i>
                <p>Menu Levels</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="submenu">
                <ul class="nav nav-collapse">
                  <li>
                    <a data-bs-toggle="collapse" href="#subnav1">
                      <span class="sub-item">Level 1</span>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="subnav1">
                      <ul class="nav nav-collapse subnav">
                        <li>
                          <a href="#">
                            <span class="sub-item">Level 2</span>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span class="sub-item">Level 2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a data-bs-toggle="collapse" href="#subnav2">
                      <span class="sub-item">Level 1</span>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="subnav2">
                      <ul class="nav nav-collapse subnav">
                        <li>
                          <a href="#">
                            <span class="sub-item">Level 2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a href="#">
                      <span class="sub-item">Level 1</span>
                    </a>
                  </li>
                </ul>
              </div>
          </li> --}}
        </ul>
      </div>
    </div>
  </div>