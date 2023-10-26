<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset ('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home.index') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('transaction.index') }}" class="nav-link {{ request()->is('transaction') || request()->is('transaction/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('book.index') }}" class="nav-link {{ request()->is('book') || request()->is('book/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('catalog.index') }}" class="nav-link {{ request()->is('catalog') || request()->is('catalog/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Catalog
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('publisher.index') }}" class="nav-link {{ request()->is('publisher') || request()->is('publisher/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Publisher
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('author.index') }}" class="nav-link {{ request()->is('author') || request()->is('author/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Author
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('member.index') }}" class="nav-link {{ request()->is('member') || request()->is('member/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Member
                  </p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>