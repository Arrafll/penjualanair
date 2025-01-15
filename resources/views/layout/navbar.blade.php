<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>


        </div>

        <ul class="topbar-menu d-flex align-items-center">
            <!-- Topbar Search Form -->


            <!-- Fullscreen Button -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                    <i class="fe-maximize font-22"></i>
                </a>
            </li>

            <!-- Search Dropdown (for Mobile/Tablet) -->
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ri-search-line font-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..."
                            aria-label="Recipient's username">
                    </form>
                </div>
            </li>



            <!-- Light/Darj Mode Toggle Button -->
            <li class="d-none d-sm-inline-block">
                <div class="nav-link waves-effect waves-light" id="light-dark-mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>

            <!-- User Dropdown -->
            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img @if (!auth()->user()->user_data->pic) src="{{ asset('templates/assets/images/users/empty-profile.png') }}" @else src="{{ '/uploads' . '/user-avatar' . '/' . auth()->user()->user_data->pic }} " @endif
                        alt="user-image" class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">
                        {{ auth()->user()->username }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->

                    <a href="@if (auth()->user()->id == 1) {{ route('admin_profile') }} @else {{ route('customer_profile') }} @endif"
                        class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account </span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="#" onclick="isLogout()" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

            <!-- Right Bar offcanvas button (Theme Customization Panel) -->
            <li>
                <a class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas"
                    href="#theme-settings-offcanvas">
                    <i class="fe-settings font-22"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
