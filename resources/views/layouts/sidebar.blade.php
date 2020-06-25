<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ url('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Student Follow Up</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('home')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>DashBoard</p>
          </a>
        </li>
        <?php
            $role_id = DB::table('role_user')->where('user_id',Auth::user()->id)->first();
            $role_name = DB::table('roles')->where('id',$role_id->role_id)->first();
        ?>
        
        @can('isAdmin', Auth::user())
        <li class="nav-item has-treeview">
          <a href="{{route('view')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              All Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>
        @endcan
        <li class="nav-item has-treeview">
          <a href="{{route('show')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              StudentList
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>
      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>