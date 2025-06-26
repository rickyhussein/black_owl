<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ url('assets/img/madrid.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Cluster Madrid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;" src="{{ auth()->user()->foto ? url('/storage/'.auth()->user()->foto) : asset('assets/img/foto_default.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

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

                <li class="nav-item">
                    <a href="{{ url('/notification') }}" class="nav-link {{ Request::is('notification*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Notification
                            @if (auth()->user()->notifications()->whereNull('read_at')->count() > 0)
                                <span class="badge badge-danger navbar-badge">{{ auth()->user()->notifications()->whereNull('read_at')->count() }}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/users') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-solid fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/fasilitas') }}" class="nav-link {{ Request::is('fasilitas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-football-ball"></i>
                        <p>
                            Fasilitas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kontak') }}" class="nav-link {{ Request::is('kontak*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Kontak
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/tata-tertib') }}" class="nav-link {{ Request::is('tata-tertib*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                            Tata Tertib
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/pengurus') }}" class="nav-link {{ Request::is('pengurus*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Pengurus
                        </p>
                    </a>
                </li>

                @if (auth()->user()->hasRole('superadmin'))
                    <li class="nav-item">
                        <a href="{{ url('/ipkl') }}" class="nav-link {{ Request::is('ipkl*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>
                                IPKL
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('/laporan-ipkl') }}" class="nav-link {{ Request::is('laporan-ipkl*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Laporan IPKL
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/donasi') }}" class="nav-link {{ Request::is('donasi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Donasi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/laporan-donasi') }}" class="nav-link {{ Request::is('laporan-donasi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Laporan Donasi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/gate-card') }}" class="nav-link {{ Request::is('gate-card*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-credit-card"></i>
                        <p>
                            Gate Card
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/laporan-gate-card') }}" class="nav-link {{ Request::is('laporan-gate-card*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Laporan Gate Card
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/pengeluaran') }}" class="nav-link {{ Request::is('pengeluaran*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Pengeluaran
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/surat-pengantar') }}" class="nav-link {{ Request::is('surat-pengantar*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Surat Pengantar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/surat-izin-renovasi') }}" class="nav-link {{ Request::is('surat-izin-renovasi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Surat Izin Renovasi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kritik-saran') }}" class="nav-link {{ Request::is('kritik-saran*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Kritik & Saran
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/berita') }}" class="nav-link {{ Request::is('berita*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita Publik
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/olahraga') }}" class="nav-link {{ Request::is('olahraga*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-running"></i>
                        <p>
                            Olahraga
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/social') }}" class="nav-link {{ Request::is('social*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-thumbs-up"></i>
                        <p>
                            Social
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/agama') }}" class="nav-link {{ Request::is('agama*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star-and-crescent"></i>
                        <p>
                            Agama
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/infrastruktur') }}" class="nav-link {{ Request::is('infrastruktur*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Infrastruktur
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ url('/roles') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-solid fa-hat-cowboy"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li> --}}

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
