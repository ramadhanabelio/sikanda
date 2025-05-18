<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <!-- Sidebar Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="{{ route('login') }}" class="logo navbar-brand d-flex align-items-center text-light fw-bold"
                    style="font-size: 20px;">
                    <img src="{{ asset('assets/img/diskominfo.png') }}" alt="Logo SiKANDA"
                        style="height: 30px; margin-right: 10px;">
                    SiKANDA
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
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item {{ request()->is('anggaran') ? 'active' : '' }}">
                    <a href="{{ route('anggaran.index') }}">
                        <i class="fas fa-wallet"></i>
                        <p>Anggaran</p>
                    </a>
                </li>
                <!-- <li class="nav-item {{ request()->is('laporan') ? 'active' : '' }}">
                    <a href="{{ route('laporan.export.pdf') }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Laporan Anggaran</p>
                    </a>
                </li> -->

                <!-- New Account Settings and Logout Menu Items -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Akun</h4>
                </li>

                <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Pengaturan Akun</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
