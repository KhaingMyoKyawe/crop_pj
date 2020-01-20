<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Title Page-->
    <title>Crop Agency</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('backend/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('backend/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('backend/css/theme.css')}}" rel="stylesheet" media="all">

</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="#" class="logo">
                            <img src="{{asset('backend/images/icon/logo.png')}}" alt="CropAdmin"/>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{route('admin.category.index')}}">Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.subcategory.index')}}">Sub_Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.list.index')}}">User List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.postlist.index')}}">Buyer Post List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.sellerpost.index')}}">Seller Post List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.bcomment.index')}}">Comments List</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('img/core-img/cc.jpg')}}" alt=""/><b> Admin</b>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <!-- <li class="active has-sub">
                            <a class="js-arrow" href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> -->
                       
                        <li>
                            <a href="{{route('admin.category.index')}}">Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.subcategory.index')}}">Sub_Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.list.index')}}">User List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.postlist.index')}}">Buyer Post List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.sellerpost.index')}}">Seller Post List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.bcomment.index')}}">Comments List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.message.index')}}">Suggestions List</a>
                        </li>
                    </ul>
                    
                        
                    
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap float-right">
                            
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu float-right">
                                        @if(Auth::check() && Auth::user()->role=='admin')

                                       <div class="content">
                                        <img src="{{asset(Auth::user()->userinfo->image)}}" class="rounded-circle" width="50" height="50">
                                        <a  class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                      
                                     </div>
                                        @endif
                                       
                                        <div class="account-dropdown js-dropdown">
                                         <div class="account-dropdown__header">
                                             <div class="account-dropdown__item">
                                                 <a href="#">
                                                     {{Auth::user()->name}}
                                                 </a>
                                             </div>
                                             <hr>
                                         </div>  
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{route('profile.edit',Auth::user()->id)}}">
                                                    <i class="zmdi zmdi-account"></i>Profile
                                                </a>
                                            </div>
                                        </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
                        @yield('content')
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 BFT. All rights reserved. Template by <a href="#">BFT</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   <!-- Jquery JS-->
    <script src="{{asset('backend/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('backend/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('backend/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('backend/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('backend/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('backend/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('backend/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('backend/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('backend/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('backend/js/main.js')}}"></script>
    @yield('script')

</body>

</html>
<!-- end document-->
