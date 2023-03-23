<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Staff </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    {{-- <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor\datatables\css\jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js\jquery.js')}}"></script>

    <link href="{{ asset('vendor\owl-carousel\css\owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor\owl-carousel\css\owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor\jqvmap\css\jqvmap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css\style.css')}}" rel="stylesheet" type="text/css">




</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <h2>Kinawataka</h2>

                                </span>
                                <div class="dropdown-menu p-0 m-0">

                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">

                                    <i class="mdi mdi-account">   {{ Auth::user()->name }} </i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('myprofile') }}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                      this.closest('form').submit();"
                                        >
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout</span>
                                    </a>
                                </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{route('dashboard')}}"  aria-expanded="false">
                        <i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li>


                    <li class="nav-label">Members</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-users"></i><span class="nav-text">Manage Members</span></a>
                        <ul aria-expanded="false">
                            @if(Auth::user()->role->view_familymember )
                            <li><a href="{{ route('members.index')}}">Members</a></li>
                            @endif
                        </ul>
                    </li>


                    <li class="nav-label">Savings</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-money"></i><span class="nav-text">Manage Savings</span></a>
                        <ul aria-expanded="false">
                            @if(Auth::user()->role->view_saving )
                            <li><a href="{{ route('savings.index')}}"> Savings</a></li>
                            @endif

                            @if(Auth::user()->role->view_savingsummary )
                            <li><a href="{{ route('savingsummary.index')}}">Savingsummary</a></li>
                            @endif
                            </li>
                        </ul>
                    </li>


                    <li class="nav-label">Loans</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-id-card"></i><span class="nav-text">Manage Loans</span></a>
                        <ul aria-expanded="false">
                            @if(Auth::user()->role->view_loan )
                            <li><a href="{{ route('loans.index')}}">Loans</a></li>
                            @endif
                        </li>
                        </ul>
                    </li>


                    <li class="nav-label">Audit Trails</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-id-card"></i><span class="nav-text">Manage Trails</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('audits')}}">Audits</a></li>
                        </li>
                        </ul>
                    </li>



                    <li class="nav-label">Permissions</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="ion ion-ios-grid"></i><span class="nav-text">Manage Permissions</span></a>
                        <ul aria-expanded="false">
                            @if(Auth::user()->role->view_permission )
                            <li><a href="{{ route('userpermission.index')}}">Permissions</a></li>
                       @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
              @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Alvin</a> 2023</p>

            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor\global\global.min.js') }}"></script>
    <script src="{{ asset('js\quixnav-init.js') }}"></script>
    <script src="{{ asset('js\custom.min.js') }}"></script>

    <script src="{{ asset('vendor\raphael\raphael.min.js') }}"></script>


    <script src="{{ asset('vendor\circle-progress\circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor\chart.js\Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor\gaugeJS\dist\gauge.min.js') }}"></script>

    <script src="{{ asset('vendor\flot\jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor\flot\jquery.flot.resize.js') }}"></script>

    <script src="{{ asset('vendor\owl-carousel\js\owl.carousel.min.js') }}"></script>

    <script src="{{ asset('vendor\jqvmap\js\jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor\jqvmap\js\jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('vendor\jquery.counterup\jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('vendor\datatables\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js\plugins-init\datatables.init.js') }}"></script>
    <script src="{{ asset('jquery.js')}}"></script>

    <script src="{{ asset('js\sweetalert.js')}}"></script>



    <?php
    if(session('message')){
      ?>
    <script>
    swal({
        title: "Success",
        text: "@php echo session('message') @endphp",
        icon: "success",
        button: "Ok",
    });
    </script>
    <?php
    }

    if(session('error')){
      ?>
    <script>
    swal({
        title: "Error",
        text: "@php echo session('error') @endphp",
        icon: "error",
        button: "Ok",
    });
    </script>
    <?php
    }
    ?>

</body>

</html>
