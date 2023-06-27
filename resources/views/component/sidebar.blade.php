  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="#" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Details</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              {{-- <div class="image">
          @if (Auth::user()->image_icon)
          <img src="{{ asset('uploads/users/'. Auth::user()->image_icon) }}" class="img-circle elevation-2" alt="User Image">
              @else
              <img src="{{ asset('dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div> --}}
              {{-- <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div> --}}
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ url('index') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt fa fa-spin"></i>
                          <p>
                              Dashboard
                              <span class="right badge badge-danger">Home</span>
                          </p>
                      </a>
                  <li class="nav-item">
                      <a href="{{ url('/logout   ') }}" class="nav-link">
                          <i class="nav-icon fa fa-cog"></i>
                          <p>
                              Log Out
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/contacts') }}" class="nav-link">
                          <i class="nav-icon fa fa-cog"></i>
                          <p>
                              Contact Details
                          </p>
                      </a>
                  </li>




















              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
