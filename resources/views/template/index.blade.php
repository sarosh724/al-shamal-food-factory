@include('template.layout.header')

<!--================================-->
<!-- Page Container Start -->
<!--================================-->
<div class="page-container">
    <!--================================-->
    <!-- Page Sidebar Start -->
    <!--================================-->
    <div class="page-sidebar">
        <div class="logo">
            <a class="logo-img" href="{{route('admin.dashboard.dashboard')}}">
                <img class="desktop-logo" src="{{ asset('assets/images/logo.png') }}" alt="">
                <img class="small-logo" src="{{ asset('assets/images/small-logo.png') }}" alt="">
            </a>
            <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
        </div>
        <!--================================-->
        <!-- Sidebar Menu Start -->
        <!--================================-->
        <div class="page-sidebar-inner">
            <div class="page-sidebar-menu">
                <ul class="accordion-menu">
                    @include('template.layout.menu')
                </ul>
            </div>
        </div>
        <!--/ Sidebar Menu End -->
        <!--================================-->
        <!-- Sidebar Footer Start -->
        <!--================================-->
        <div class="sidebar-footer">
            <a class="pull-left" href="{{ route('admin.profile') }}" data-toggle="tooltip" data-placement="top"
                data-original-title="Profile">
                <i data-feather="user" class="ht-15"></i></a>
            <a class="pull-left" href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top"
                data-original-title="Sing Out">
                <i data-feather="log-out" class="ht-15"></i></a>
        </div>
        <!--/ Sidebar Footer End -->
    </div>
    <!--/ Page Sidebar End -->
    <!--================================-->
    <!-- Page Content Start -->
    <!--================================-->
    <div class="page-content">
        <!--================================-->
        <!-- Page Header Start -->
        <!--================================-->
        <div class="page-header">
            <div class="search-form">
                <form action="#" method="GET">
                    <div class="input-group">
                        <input class="form-control search-input" name="search" placeholder="Type something..."
                            type="text" />
                        <span class="input-group-btn">
                            <span id="close-search"><i class="ion-ios-close-empty"></i></span>
                        </span>
                    </div>
                </form>
            </div>
            <!--================================-->
            <!-- Page Header  Start -->
            <!--================================-->
            <nav class="navbar navbar-expand-lg">
                <ul class="list-inline list-unstyled mg-r-20">
                    <!-- Mobile Toggle and Logo -->
                    <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#"
                            id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                    <!-- PC Toggle and Logo -->
                    <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#"
                            id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                </ul>
                <!--================================-->
                <!-- Mega Menu Start -->
                <!--================================-->
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                </div>
                <!--/ Mega Menu End-->
                <!--/ Brand and Logo End -->
                <!--================================-->
                <!-- Header Right Start -->
                <!--================================-->
                <div class="header-right pull-right">
                    <ul class="list-inline justify-content-end">
                        {{--                        <li class="list-inline-item align-middle"><a href="#" id="search-button"><i --}}
                        {{--                                    class="ion-ios-search-strong tx-20"></i></a></li> --}}
                        <!--================================-->
                        <!-- Notifications Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown hidden-xs">
                            <a class="notification-icon" href="" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-bell tx-16"></i>
                                <span class="notification-count wave in"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-2">
                                <!-- Top Notifications Area -->
                                <div class="top-notifications-area">
                                    <!-- Heading -->
                                    <div class="notifications-heading">
                                        <div class="heading-title">
                                            <h6>Notifications</h6>
                                        </div>
                                        <span>5+ New Notifications</span>
                                    </div>
                                    <div class="notifications-box" id="notificationsBox">
                                        <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-success">
                                                    <i class="fa fa-smile-o tx-success tx-16"></i>
                                                </div>
                                                <div>
                                                    <span>Your order is placed</span>
                                                    <span class="small tx-gray-600 ft-right">Jun 10</span>
                                                    <div class="tx-gray-600 tx-11">Dummy text of the printing and type
                                                        setting industry.</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-warning">
                                                    <i class="fa fa-bell tx-warning tx-16"></i>
                                                </div>
                                                <div>
                                                    <span>Your item is shipped</span>
                                                    <span class="small tx-gray-600 ft-right">Jun 05</span>
                                                    <div class="tx-gray-600 tx-11">Dummy text of the printing and type
                                                        setting industry.</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-success">
                                                    <i class="fa fa-check tx-success tx-16"></i>
                                                </div>
                                                <div>
                                                    <span>New Message received</span>
                                                    <span class="small tx-gray-600 ft-right">Jun 02</span>
                                                    <div class="tx-gray-600 tx-11">Dummy text of the printing and type
                                                        setting industry.</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-danger">
                                                    <i class="fa fa-heartbeat tx-danger tx-16"></i>
                                                </div>
                                                <div>
                                                    <span>Payment failed!</span>
                                                    <span class="small tx-gray-600 ft-right">May 29</span>
                                                    <div class="tx-gray-600 tx-11">Dummy text of the printing and type
                                                        setting industry.</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-primary">
                                                    <i class="fa fa-info tx-info tx-16"></i>
                                                </div>
                                                <div>
                                                    <span>New document available</span>
                                                    <span class="small tx-gray-600 ft-right">May 25</span>
                                                    <div class="tx-gray-600 tx-11">Dummy text of the printing and type
                                                        setting industry.</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-primary">
                                                    <i class="fa fa-info tx-info tx-16"></i>
                                                </div>
                                                <div>
                                                    <span>New document available</span>
                                                    <span class="small tx-gray-600 ft-right">May 08</span>
                                                    <div class="tx-gray-600 tx-11">Dummy text of the printing and type
                                                        setting industry.</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="notifications-footer">
                                        <a href="">View all Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--/ Notifications Dropdown End -->
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown">
                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="select-profile">Hi, @if (!empty(auth()->user()))
                                        {{ auth()->user()->name }}
                                    @else
                                        IT Staff
                                    @endif!</span>
                                <img src="{{ asset('assets/images/avatar/avatar1.png') }}"
                                    class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                                <div class="user-profile-area">
                                    <div class="user-profile-heading">
                                        <div class="profile-thumbnail">
                                            <img src="{{ asset('assets/images/avatar/avatar1.png') }}"
                                                class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                        </div>
                                        <div class="profile-text">
                                            @if (!empty(auth()->user()))
                                                <h6>{{ auth()->user()->name }}</h6>
                                                <span>{{ auth()->user()->email }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.profile') }}" class="dropdown-item"><i class="icon-user"
                                            aria-hidden="true"></i> My profile</a>
                                    {{--                                    <a href="" class="dropdown-item"><i class="icon-envelope" --}}
                                    {{--                                            aria-hidden="true"></i> Messages <span --}}
                                    {{--                                            class="badge badge-success ft-right mg-t-3">10+</span></a> --}}
                                    {{--                                    <a href="" class="dropdown-item"><i class="icon-settings" --}}
                                    {{--                                            aria-hidden="true"></i> settings</a> --}}
                                    {{--                                    <a href="" class="dropdown-item"><i class="icon-share" --}}
                                    {{--                                            aria-hidden="true"></i> My Activity <span --}}
                                    {{--                                            class="badge badge-warning ft-right mg-t-3">5+</span></a> --}}
                                    {{--                                    <a href="" class="dropdown-item"><i class="icon-cloud-download" --}}
                                    {{--                                            aria-hidden="true"></i> My Download <span --}}
                                    {{--                                            class="badge badge-success ft-right mg-t-3">10+</span></a> --}}
                                    {{--                                    <a href="" class="dropdown-item"><i class="icon-heart" --}}
                                    {{--                                            aria-hidden="true"></i> Support</a> --}}
                                    <a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-power"
                                            aria-hidden="true"></i> Sign-out</a>
                                </div>
                            </div>
                        </li>
                        <!-- Profile Dropdown End -->
                    </ul>
                </div>
                <!--/ Header Right End -->
            </nav>
        </div>
        <!--/ Page Header End -->
        <!--================================-->
        <!-- Page Inner Start -->
        <!--================================-->
        <div class="page-inner">
            <!-- Main Wrapper -->
            <div id="main-wrapper">

                <!--================================-->
                <!-- Breadcrumb Start -->
                <!--================================-->
                <div class="pageheader pd-t-25 pd-b-35">
                    <div class="pd-t-5 pd-b-5 d-flex justify-content-between align-items-center">
                        <h1 class="pd-0 mg-0 tx-20">@yield('title')</h1>
                        <div>@yield('page-action')</div>
                    </div>
                    <div class="breadcrumb pd-0 mg-0">
                        @yield('breadcrumb')
                    </div>
                </div>
                <!--/ Breadcrumb End -->
                <div>
                    @yield('content')
                </div>
            </div>
            <!--/ Main Wrapper End -->
        </div>
        <!--/ Page Inner End -->
        <!--================================-->
        <!-- Page Footer Start -->
        <!--================================-->
        {{-- <footer class="page-footer">
            <div class="pd-t-4 pd-b-0 pd-x-20">
                <div class="tx-10 tx-uppercase">
                    <p class="pd-y-10 mb-0">Copyright&copy; {{ date('Y') }} | All rights reserved.</p>
                </div>
            </div>
        </footer> --}}
        <!--/ Page Footer End -->
    </div>
    <!--/ Page Content End -->
</div>
<!--/ Page Container End -->
<!--================================-->
<!-- Scroll To Top Start-->
<!--================================-->
<a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
<!--/ Scroll To Top End -->

@include('template.layout.modal')
@include('template.layout.footer')
