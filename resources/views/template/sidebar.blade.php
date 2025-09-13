<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('storage/image/logo-footer.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Company Profile</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar relative">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center bg-dark rounded-lg shadow p-3">
            <!-- Foto profil -->
            <div class="image me-3">
                <img src="{{ asset('admin_lte/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2 border border-primary" alt="User Image"
                    style="width: 55px; height: 55px; object-fit: cover;">
            </div>

            <!-- Nama + Dropdown -->
            <div class="info flex-grow-1">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="d-flex align-items-center text-white bg-transparent border-0 fw-semibold">
                            {{ Auth::user()->name }}
                            <i class="fa-solid fa-caret-down ms-2"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Jangan kasih div tambahan, styling langsung di sini -->
                        <x-dropdown-link :href="route('profile.edit')"
                            class="flex items-center text-white hover:bg-secondary px-3 py-2">
                            <i class="fa-regular fa-user me-2"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                class="flex items-center text-white hover:bg-secondary px-3 py-2"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket me-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->is('transaksi/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('news-home') }}"
                                class="nav-link {{ Route::is('news-home') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-home') }}"
                                class="nav-link {{ Route::is('product-home') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('master/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category_home') }}"
                                class="nav-link {{ Route::is('category_home') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('settings/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('role_home') }}"
                                class="nav-link {{ Route::is('role_home') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role & Access</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user-access') }}"
                                class="nav-link {{ Route::is('user-access') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ml-3 mt-2 d-flex align-items-center">
                    <i class="nav-icon fa-solid fa-arrow-left mr-2"></i>
                    <a href="/" class="text-white">Back To Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
