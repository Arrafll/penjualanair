<div class="app-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="index.html" class="logo-light">
            <img src="{{ asset('templates/assets/images/logo-text-airmoo.png') }}" alt="logo" class="logo-lg">
            <img src="{{ asset('templates/assets/images/logo-icon-airmoo.png') }}" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="{{ asset('templates/assets/images/logo-text-airmoo.png') }}" alt="dark logo" class="logo-lg"
                width="120">
            <img src="{{ asset('templates/assets/images/logo-icon-airmoo.png') }}" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block"
                    data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted mb-0">{{ auth()->user()->role->name }}</p>
        </div>

        <!--- Menu -->
        <ul class="menu">
            @if (auth()->user()->role_id == 1)
                <li class="menu-title">MENU</li>
                <li class="menu-item {{ Route::is('admin_dashboard*') ? 'menuitem-active' : '' }}">
                    <a href="/admin_dashboard"
                        class="menu-link {{ \Request::route()->getName() == 'admin_dashboard' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-view-dashboard-outline"></i></span>
                        <span class="menu-text"> Dashboard </span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('admin_product*') ? 'menuitem-active' : '' }}">
                    <a href="/admin_product"
                        class="menu-link {{ \Request::route()->getName() == 'admin_product' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-shape-outline"></i></span>
                        <span class="menu-text"> Product </span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('admin_order_list*') ? 'menuitem-active' : '' }}">
                    <a href="/admin_order_list"
                        class="menu-link {{ \Request::route()->getName() == 'admin_order_list' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-clipboard-check-multiple-outline"></i></span>
                        <span class="menu-text"> Pesanan </span>
                    </a>
                </li>
                <li class="menu-title">Pengaturan</li>
                <li class="menu-item {{ Route::is('customer_profile*') ? 'menuitem-active' : '' }}">
                    <a href="/customer_profile"
                        class="menu-link {{ \Request::route()->getName() == 'customer_profile' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="fe-user"></i></span>
                        <span class="menu-text"> Profile </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" onclick="isLogout()" class="menu-link">
                        <span class="menu-icon"><i class="fe-log-out"></i></span>
                        <span class="menu-text"> Logout </span>
                    </a>
                </li>
            @else
                <li class="menu-title">MENU</li>

                <li class="menu-item {{ Route::is('customer_dashboard*') ? 'menuitem-active' : '' }}">
                    <a href="/customer_dashboard"
                        class="menu-link {{ \Request::route()->getName() == 'customer_dashboard' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-home-variant-outline"></i></span>
                        <span class="menu-text"> Home </span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('customer_shop*') ? 'menuitem-active' : '' }}">
                    <a href="/customer_shop"
                        class="menu-link {{ \Request::route()->getName() == 'customer_shop' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-shopping-outline"></i></span>
                        <span class="menu-text"> Toko </span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('customer_cart*') ? 'menuitem-active' : '' }}">
                    <a href="/customer_cart_list"
                        class="menu-link {{ \Request::route()->getName() == 'customer_cart_list' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-cart-outline"></i></span>
                        <span class="menu-text"> Keranjang </span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('customer_order_list*') ? 'menuitem-active' : '' }}">
                    <a href="/customer_order_list"
                        class="menu-link {{ \Request::route()->getName() == 'customer_order_list' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="mdi mdi-clipboard-check-multiple-outline"></i></span>
                        <span class="menu-text"> Pesanan </span>
                    </a>
                </li>
                <li class="menu-title">Pengaturan</li>

                <li class="menu-item {{ Route::is('customer_profile*') ? 'menuitem-active' : '' }}">
                    <a href="/customer_profile"
                        class="menu-link {{ \Request::route()->getName() == 'customer_profile' ? 'active' : '' }}">
                        <span class="menu-icon"><i class="fe-user"></i></span>
                        <span class="menu-text"> Profile </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" onclick="isLogout()" class="menu-link">
                        <span class="menu-icon"><i class="fe-log-out"></i></span>
                        <span class="menu-text"> Logout </span>
                    </a>
                </li>
            @endif

        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
