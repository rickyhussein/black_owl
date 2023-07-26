<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ url('assets/img/images.JPEG') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Black Owl</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex {{ Request::is('my-profile*') ? 'btn btn-primary' : '' }}">
            <div class="image">
                @if(auth()->user()->foto == null)
                    <img src="{{ url('assets/img/foto_default.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ url('storage/'.auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ url('/my-profile') }}" class="d-block" style="{{ Request::is('my-profile*') ? 'color: white' : '' }}">My Profile</a>
            </div>
        </div>
        @if (Request::is('my-profile*'))
            <hr style="background-color:dimgray">
        @endif

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

        <hr style="background-color:dimgray">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MASTER</li>

                <li class="nav-item">
                    <a href="{{ url('/users') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-solid fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/roles') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-solid fa-hat-cowboy"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>

        <hr style="background-color:dimgray">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
