<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Clean Blog </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Ajax categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('admin.ajax-categories.create')}}" class="nav-link {{request()->is('dashboard/ajax-categories/create*')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.ajax-categories.index')}}" class="nav-link {{request()->is('dashboard/ajax-categories')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>All categories</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('admin.categories.create')}}" class="nav-link {{request()->is('categories/create*')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.categories.index')}}" class="nav-link {{request()->is('categories/')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>All categories</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('admin.posts.create')}}" class="nav-link {{request()->is('categories/create*')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add posts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.posts.index')}}" class="nav-link {{request()->is('categories/')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>All posts</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
        <a 
        href="{{ route('admin.comments.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>

        
        Comments


          
        </a>
</li>
        <li class="nav-item">
        <a  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        href="{{ route('logout') }}" class="nav-link">
<i class="nav-icon fas fa-th"></i>
<p>
  Logout
  <span class="right badge badge-danger"><i class="fas fa-sign-out-alt"></i></span>
</p>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </a>
</li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>