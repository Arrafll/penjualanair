@extends('layout.main')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar">
                <div class="topbar-menu d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-box">
                        <!-- Brand Logo Light -->
                        <a href="index.html" class="logo-light">
                            <img src="assets/images/logo-light.png" alt="logo" class="logo-lg">
                            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                        </a>

                        <!-- Brand Logo Dark -->
                        <a href="index.html" class="logo-dark">
                            <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg">
                            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="dropdown d-none d-xl-block">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            Create New
                            <i class="mdi mdi-chevron-down ms-1"></i>
                        </a>
                        <div class="dropdown-menu">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-briefcase me-1"></i>
                                <span>New Projects</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-user me-1"></i>
                                <span>Create Users</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-bar-chart-line- me-1"></i>
                                <span>Revenue Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-headphones me-1"></i>
                                <span>Help & Support</span>
                            </a>

                        </div>
                    </div>

                    <!-- Mega Menu Dropdown -->
                    <div class="dropdown dropdown-mega d-none d-xl-block">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            Mega Menu
                            <i class="mdi mdi-chevron-down  ms-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-megamenu">
                            <div class="row">
                                <div class="col-sm-8">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="text-dark mt-0">UI Components</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="widgets.html">Widgets</a>
                                                </li>
                                                <li>
                                                    <a href="extended-nestable.html">Nestable List</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Range Sliders</a>
                                                </li>
                                                <li>
                                                    <a href="pages-gallery.html">Masonry Items</a>
                                                </li>
                                                <li>
                                                    <a href="extended-sweet-alert.html">Sweet Alerts</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Treeview Page</a>
                                                </li>
                                                <li>
                                                    <a href="extended-tour.html">Tour Page</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="text-dark mt-0">Applications</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="ecommerce-products.html">eCommerce Pages</a>
                                                </li>
                                                <li>
                                                    <a href="crm-dashboard.html">CRM Pages</a>
                                                </li>
                                                <li>
                                                    <a href="email-inbox.html">Email</a>
                                                </li>
                                                <li>
                                                    <a href="apps-calendar.html">Calendar</a>
                                                </li>
                                                <li>
                                                    <a href="contacts-list.html">Team Contacts</a>
                                                </li>
                                                <li>
                                                    <a href="task-kanban-board.html">Task Board</a>
                                                </li>
                                                <li>
                                                    <a href="email-templates.html">Email Templates</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="text-dark mt-0">Extra Pages</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="javascript:void(0);">Left Sidebar with User</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Menu Collapsed</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Small Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">New Header Style</a>
                                                </li>
                                                <li>
                                                    <a href="pages-search-results.html">Search Result</a>
                                                </li>
                                                <li>
                                                    <a href="pages-gallery.html">Gallery Pages</a>
                                                </li>
                                                <li>
                                                    <a href="pages-coming-soon.html">Maintenance & Coming Soon</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center mt-3">
                                        <h3 class="text-dark">Special Discount Sale!</h3>
                                        <h4>Save up to 70% off.</h4>
                                        <a href="https://1.envato.market/uboldadmin" target="_blank"
                                            class="btn btn-primary rounded-pill mt-3">Download Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center">
                    <!-- Topbar Search Form -->
                    <li class="app-search dropdown me-3 d-none d-lg-block">
                        <form>
                            <input type="search" class="form-control rounded-pill" placeholder="Search..."
                                id="top-search">
                            <span class="fe-search search-icon font-22"></span>
                        </form>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found 22 results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-home me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-aperture me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex align-items-start">
                                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-2.jpg"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex align-items-start">
                                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-5.jpg"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>

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

                    <!-- App Dropdown -->
                    <li class="dropdown d-none d-md-inline-block">
                        <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-grid font-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                            <div class="p-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/slack.png" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/github.png" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                            <span>G Suite</span>
                                        </a>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div>
                    </li>

                    <!-- Language flag dropdown  -->
                    <li class="dropdown d-none d-md-inline-block">
                        <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="18">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1"
                                    height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1"
                                    height="12"> <span class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li>

                    <!-- Notofication dropdown -->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell font-22"></i>
                            <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="px-1" style="max-height: 300px;" data-simplebar>

                                <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                                <!-- item-->

                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp <small
                                                        class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                    Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-info">
                                                    <i class="mdi mdi-account-plus"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Admin <small
                                                        class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">New user registered</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/avatar-2.jpg"
                                                        class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small
                                                        class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about
                                                    our next meeting</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                    Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/avatar-4.jpg"
                                                        class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                <small class="noti-item-subtitle text-muted">Wow ! this admin looks good
                                                    and awesome design</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="text-center">
                                    <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                </div>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                View All
                            </a>

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
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="ms-1 d-none d-md-inline-block">
                                Geneva <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
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
        <!-- ========== Topbar End ========== -->

        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Checkout</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Checkout</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center"
                                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active show py-2" id="custom-v-pills-billing-tab"
                                                data-bs-toggle="pill" href="#custom-v-pills-billing" role="tab"
                                                aria-controls="custom-v-pills-billing" aria-selected="true">
                                                <i class="mdi mdi-account-circle d-block font-24"></i>
                                                Billing Info
                                            </a>
                                            <a class="nav-link mt-2 py-2" id="custom-v-pills-shipping-tab"
                                                data-bs-toggle="pill" href="#custom-v-pills-shipping" role="tab"
                                                aria-controls="custom-v-pills-shipping" aria-selected="false">
                                                <i class="mdi mdi-truck-fast d-block font-24"></i>
                                                Shipping Info</a>
                                            <a class="nav-link mt-2 py-2" id="custom-v-pills-payment-tab"
                                                data-bs-toggle="pill" href="#custom-v-pills-payment" role="tab"
                                                aria-controls="custom-v-pills-payment" aria-selected="false">
                                                <i class="mdi mdi-cash-multiple d-block font-24"></i>
                                                Payment Info</a>
                                        </div>

                                        <div class="border mt-4 rounded">
                                            <h4 class="header-title p-2 mb-0">Order Summary</h4>

                                            <div class="table-responsive">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <tbody>
                                                        @foreach ($product as $item)
                                                            <tr>
                                                                <td style="width: 90px;">
                                                                    <img src="{{ asset('uploads') }}/product/{{ $item->name }}"
                                                                        alt="product-img" title="product-img"
                                                                        class="rounded" height="48" />
                                                                </td>
                                                                <td>
                                                                    <a href="ecommerce-product-detail.html"
                                                                        class="text-body fw-semibold">{{ $item->name }}</a>
                                                                    <small class="d-block">1 x $39</small>
                                                                </td>

                                                                <td class="text-end">
                                                                    $39
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr class="text-end">
                                                            <td colspan="2">
                                                                <h6 class="m-0">Sub Total:</h6>
                                                            </td>
                                                            <td class="text-end">
                                                                $157
                                                            </td>
                                                        </tr>
                                                        <tr class="text-end">
                                                            <td colspan="2">
                                                                <h6 class="m-0">Shipping:</h6>
                                                            </td>
                                                            <td class="text-end">
                                                                FREE
                                                            </td>
                                                        </tr>
                                                        <tr class="text-end">
                                                            <td colspan="2">
                                                                <h5 class="m-0">Total:</h5>
                                                            </td>
                                                            <td class="text-end fw-semibold">
                                                                $157
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div> <!-- end .border-->
                                    </div> <!-- end col-->
                                    <div class="col-lg-8">
                                        <div class="tab-content p-3">
                                            <div class="tab-pane fade active show" id="custom-v-pills-billing"
                                                role="tabpanel" aria-labelledby="custom-v-pills-billing-tab">
                                                <div>
                                                    <h4 class="header-title">Billing Information</h4>

                                                    <p class="sub-header">Fill the form below in order to
                                                        send you the order's invoice.</p>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="billing-first-name"
                                                                        class="form-label">First Name</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter your first name"
                                                                        id="billing-first-name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="billing-last-name" class="form-label">Last
                                                                        Name</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter your last name"
                                                                        id="billing-last-name" />
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="billing-email-address"
                                                                        class="form-label">Email Address <span
                                                                            class="text-danger">*</span></label>
                                                                    <input class="form-control" type="email"
                                                                        placeholder="Enter your email"
                                                                        id="billing-email-address" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="billing-phone" class="form-label">Phone
                                                                        <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="(xx) xxx xxxx xxx"
                                                                        id="billing-phone" />
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="billing-address"
                                                                        class="form-label">Address</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter full address"
                                                                        id="billing-address">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="billing-town-city" class="form-label">Town
                                                                        / City</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter your city name"
                                                                        id="billing-town-city" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="billing-state"
                                                                        class="form-label">State</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter your state"
                                                                        id="billing-state" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="billing-zip-postal" class="form-label">Zip
                                                                        Code</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Enter your zip code"
                                                                        id="billing-zip-postal" />
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            id="customCheck2">
                                                                        <label class="form-check-label"
                                                                            for="customCheck2">Ship to different address
                                                                            ?</label>
                                                                    </div>
                                                                </div>

                                                                <div class="my-3">
                                                                    <label for="example-textarea" class="form-label">Order
                                                                        Notes:</label>
                                                                    <textarea class="form-control" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->

                                                        <div class="row mt-4">
                                                            <div class="col-sm-6">
                                                                <a href="ecommerce-cart.html" class="btn btn-secondary">
                                                                    <i class="mdi mdi-arrow-left"></i> Back to Shopping
                                                                    Cart </a>
                                                            </div> <!-- end col -->
                                                            <div class="col-sm-6">
                                                                <div class="text-sm-end mt-2 mt-sm-0">
                                                                    <a href="ecommerce-checkout.html"
                                                                        class="btn btn-success">
                                                                        <i class="mdi mdi-truck-fast me-1"></i> Proceed to
                                                                        Shipping </a>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-v-pills-shipping" role="tabpanel"
                                                aria-labelledby="custom-v-pills-shipping-tab">
                                                <div>
                                                    <h4 class="header-title">Saved Address</h4>

                                                    <p class="sub-header">Fill the form below in order to
                                                        send you the order's invoice.</p>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="border p-3 rounded mb-3 mb-md-0">
                                                                <div class="float-end">
                                                                    <a href="#"><i
                                                                            class="mdi mdi-square-edit-outline text-muted font-20"></i></a>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio1"
                                                                        name="customRadio" class="form-check-input"
                                                                        checked>
                                                                    <label class="form-check-label font-16 fw-bold"
                                                                        for="customRadio1">Home</label>
                                                                </div>
                                                                <h5 class="mt-3">Brent Rowe</h5>

                                                                <p class="mb-2"><span
                                                                        class="fw-semibold me-2">Address:</span> 3559
                                                                    Roosevelt Wilson Lane San Bernardino, CA 92405</p>
                                                                <p class="mb-2"><span
                                                                        class="fw-semibold me-2">Phone:</span> (123)
                                                                    456-7890</p>
                                                                <p class="mb-0"><span
                                                                        class="fw-semibold me-2">Mobile:</span> (+01) 12345
                                                                    67890</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="border p-3 rounded mb-3 mb-md-0">
                                                                <div class="float-end">
                                                                    <a href="#"><i
                                                                            class="mdi mdi-square-edit-outline text-muted font-20"></i></a>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2"
                                                                        name="customRadio" class="form-check-input">
                                                                    <label class="form-check-label font-16 fw-bold"
                                                                        for="customRadio2">Office</label>
                                                                </div>

                                                                <h5 class="mt-3">Brent Rowe</h5>

                                                                <p class="mb-2"><span
                                                                        class="fw-semibold me-2">Address:</span> 3559
                                                                    Roosevelt Wilson Lane San Bernardino, CA 92405</p>
                                                                <p class="mb-2"><span
                                                                        class="fw-semibold me-2">Phone:</span> (123)
                                                                    456-7890</p>
                                                                <p class="mb-0"><span
                                                                        class="fw-semibold me-2">Mobile:</span> (+01) 12345
                                                                    67890</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row-->

                                                    <h4 class="header-title mt-4">Shipping Method</h4>

                                                    <p class="text-muted mb-3">Fill the form below in order to
                                                        send you the order's invoice.</p>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="border p-3 rounded mb-3">
                                                                <div class="form-check">
                                                                    <input type="radio" id="shippingMethodRadio1"
                                                                        name="shippingOptions" class="form-check-input"
                                                                        checked>
                                                                    <label class="form-check-label font-16 fw-bold"
                                                                        for="shippingMethodRadio1">Standard Delivery -
                                                                        FREE</label>
                                                                </div>
                                                                <p class="mb-0 ps-3 pt-1">Estimated 5-7 days shipping
                                                                    (Duties and tax may be due upon delivery)</p>
                                                            </div>

                                                            <div class="border p-3 rounded">
                                                                <div class="form-check">
                                                                    <input type="radio" id="shippingMethodRadio2"
                                                                        name="shippingOptions" class="form-check-input">
                                                                    <label class="form-check-label font-16 fw-bold"
                                                                        for="shippingMethodRadio2">Fast Delivery -
                                                                        $25</label>
                                                                </div>
                                                                <p class="mb-0 ps-3 pt-1">Estimated 1-2 days shipping
                                                                    (Duties and tax may be due upon delivery)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row-->

                                                    <div class="row mt-4">
                                                        <div class="col-sm-6">
                                                            <a href="ecommerce-cart.html" class="btn btn-secondary">
                                                                <i class="mdi mdi-arrow-left"></i> Back to Shopping Cart
                                                            </a>
                                                        </div> <!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="text-sm-end mt-2 mt-sm-0">
                                                                <a href="ecommerce-checkout.html" class="btn btn-success">
                                                                    <i class="mdi mdi-cash-multiple me-1"></i> Continue to
                                                                    Payment </a>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-v-pills-payment" role="tabpanel"
                                                aria-labelledby="custom-v-pills-payment-tab">
                                                <div>
                                                    <h4 class="header-title">Payment Selection</h4>

                                                    <p class="sub-header">Fill the form below in order to
                                                        send you the order's invoice.</p>

                                                    <!-- Pay with Paypal box-->
                                                    <div class="border p-3 mb-3 rounded">
                                                        <div class="float-end">
                                                            <i class="fab fa-cc-paypal font-24 text-primary"></i>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="BillingOptRadio2"
                                                                name="billingOptions" class="form-check-input">
                                                            <label class="form-check-label font-16 fw-bold"
                                                                for="BillingOptRadio2">Pay with Paypal</label>
                                                        </div>
                                                        <p class="mb-0 ps-3 pt-1">You will be redirected to PayPal website
                                                            to complete your purchase securely.</p>

                                                    </div>
                                                    <!-- end Pay with Paypal box-->

                                                    <!-- Credit/Debit Card box-->
                                                    <div class="border p-3 mb-3 rounded">
                                                        <div class="float-end">
                                                            <i class="far fa-credit-card font-24 text-primary"></i>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="BillingOptRadio1"
                                                                name="billingOptions" class="form-check-input" checked>
                                                            <label class="form-check-label font-16 fw-bold"
                                                                for="BillingOptRadio1">Credit / Debit Card</label>
                                                        </div>
                                                        <p class="mb-0 ps-3 pt-1">Safe money transfer using your bank
                                                            account. We support Mastercard, Visa, Discover and Stripe.</p>

                                                        <div class="row mt-4">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label for="card-number" class="form-label">Card
                                                                        Number</label>
                                                                    <input type="text" id="card-number"
                                                                        class="form-control" data-toggle="input-mask"
                                                                        data-mask-format="0000 0000 0000 0000"
                                                                        placeholder="4242 4242 4242 4242">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="card-name-on" class="form-label">Name on
                                                                        card</label>
                                                                    <input type="text" id="card-name-on"
                                                                        class="form-control" placeholder="Master Shreyu">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="card-expiry-date"
                                                                        class="form-label">Expiry date</label>
                                                                    <input type="text" id="card-expiry-date"
                                                                        class="form-control" data-toggle="input-mask"
                                                                        data-mask-format="00/00" placeholder="MM/YY">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="card-cvv" class="form-label">CVV
                                                                        code</label>
                                                                    <input type="text" id="card-cvv"
                                                                        class="form-control" data-toggle="input-mask"
                                                                        data-mask-format="000" placeholder="012">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>
                                                    <!-- end Credit/Debit Card box-->

                                                    <!-- Cash on Delivery box-->
                                                    <div class="border p-3 mb-3 rounded">
                                                        <div class="float-end">
                                                            <i class="fas fa-money-bill-alt font-24 text-primary"></i>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="BillingOptRadio4"
                                                                name="billingOptions" class="form-check-input">
                                                            <label class="form-check-label font-16 fw-bold"
                                                                for="BillingOptRadio4">Cash on Delivery</label>
                                                        </div>
                                                        <p class="mb-0 ps-3 pt-1">Pay with cash when your order is
                                                            delivered.</p>
                                                    </div>
                                                    <!-- end Cash on Delivery box-->

                                                    <div class="row mt-4">
                                                        <div class="col-sm-6">
                                                            <a href="ecommerce-cart.html" class="btn btn-secondary">
                                                                <i class="mdi mdi-arrow-left"></i> Back to Shopping Cart
                                                            </a>
                                                        </div> <!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="text-sm-end mt-2 mt-sm-0">
                                                                <a href="ecommerce-checkout.html" class="btn btn-success">
                                                                    <i class="mdi mdi-cash-multiple me-1"></i> Complete
                                                                    Order </a>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row-->

                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Ubold - <a href="https://coderthemes.com/"
                                target="_blank">Coderthemes.com</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
