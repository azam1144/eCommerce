<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="E-commerce Fashion shopping" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ URL::to('/') }}">
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/assets/images/favicon.png')}}">
    <link href="{{ asset('dashboard/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/dist/css/style.min.css') }}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">

                    <a class="navbar-brand" href="javascript:void(0)">
                        <b class="logo-icon">
                            <img src="{{ asset('dashboard/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <img src="{{ asset('dashboard/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('dashboard/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{ asset('dashboard/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item search-box">  </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="javascript:void(0)"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('dashboard/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle"
                                    width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>

                                @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="ti-wallet m-r-5 m-l-5"></i>
                                            Logout</a>
                                    </form>
                                @else
                                    <a class="dropdown-item" href="{{route('login')}}" ><i class="ti-wallet m-r-5 m-l-5"></i>
                                        Login</a>
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        {{--left section--}}
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="{{ asset('dashboard/assets/images/users/1.jpg')}}" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @auth
                                            <h5 class="m-b-0 user-name font-medium">{{Auth::user()->name}} <i
                                                    class="fa fa-angle-down"></i></h5>
                                            <span class="op-5 user-email">{{Auth::user()->email}}</span>
                                        @endauth
                                    </a>

                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                     href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Orders</span></a></li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        {{--content --}}
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Orders Listing</h4>
                                    </div>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Order ID</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Total</th>
                                            <th class="border-top-0">Sub Total</th>
                                            <th class="border-top-0">Promo</th>
                                            <th class="border-top-0">Plan</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Mobile</th>
                                            <th class="border-top-0">City</th>
                                            <th class="border-top-0">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($orders ) > 0)
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="m-r-5"><a
                                                                    class="btn btn-circle d-flex btn-info text-white">#</a>
                                                            </div>
                                                            <div class="">
                                                                <h4 class="m-b-0 font-16">{{$order->id}}</h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$order->status}}</td>
                                                    <td>{{$order->total}}</td>
                                                    <td>
                                                        <label class="label label-danger">{{$order->subTotal}}</label>
                                                    </td>
                                                    @if($order->promo)
                                                        <td>{{$order->promo}}</td>
                                                    @else
                                                        <td>Nill</td>
                                                    @endif

                                                    @if($order->subscription)
                                                        <td>{{$order->subscription->plan}}</td>
                                                    @else
                                                        <td>Nill</td>
                                                    @endif
                                                    <td>{{$order->firstName}} {{$order->lastName}}</td>
                                                    <td>
                                                        <h5 class="m-b-0">{{$order->mobile}}</h5>
                                                    </td>
                                                    <td>{{$order->city}}</td>
                                                    <td>{{$order->line1}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{--footer--}}
        <footer class="footer text-center">
            All Rights Reserved by Splinter. Designed, Developed and Maintained by <b>Splinter.co.uk</b>.
        </footer>
    </div>
    <script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('dashboard/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dashboard/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dashboard/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dashboard/dist/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('dashboard/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>
