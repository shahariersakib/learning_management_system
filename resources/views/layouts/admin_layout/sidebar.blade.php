<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Educo Lab</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       {{--  <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">Course Management</li>
          <li class="nav-item">
            <a href="{{ route('courses.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Courses</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('lessons.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Lessons</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('lives.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Live Video</p>
            </a>
          </li>
          <li class="nav-header">Notice</li>
          <li class="nav-item">
            <a href="{{ route('syllabus.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Syllabus</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('routines.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Routine</p>
            </a>
          </li>
          <li class="nav-header">User Management</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('role-list')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role Manage</p>
                </a>
              </li>
              @endcan
              @can('user-list')
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Manage</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-microscope"></i>
              <p>
                Exam Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('exam-create')
              <li class="nav-item">
                <a href="{{route('exams.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Exam</p>
                </a>
              </li>
              @endcan
              @can('exam-list')
              <li class="nav-item">
                <a href="{{route('exams.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Exam</p>
                </a>
              </li>
              @endcan
              @can('qustion-create')
              <li class="nav-item">
                <a href="{{route('qustion.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Qustion</p>
                </a>
              </li>
              @endcan
              @can('qustion-list')
              <li class="nav-item">
                <a href="{{route('qustion.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Qustion</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('website-list')
              <li class="nav-item">
                <a href="{{ route('website.setting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Settings</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="nav-item">
              <a href="{{ route('enrollment-request.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Enroll Request</p>
              </a>
          </li>
          <li class="nav-header">Logging Tracker</li>
          <li class="nav-item">
            <a href="{{ route('login.history') }}" class="nav-link">
              <i class="nav-icon fas fa-lock text-info"></i>
              <p class="text">Login Log</p>
            </a>
          </li>
          <li class="nav-header">Profile</li>
          <li class="nav-item">
            <a href="{{ route('website.setting') }}" class="nav-link">
              <i class="nav-icon fas fa-key text-info"></i>
              <p class="text">Password Change</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
