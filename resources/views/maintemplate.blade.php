<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Crop Services</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700')}}" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <div class="click-closed"></div>


  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="#">C<span class="color-b">R</span>O<span class="color-b">P</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
           <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li>
            <div class="dropdown mt-2 mb-2">
                <a class=" dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                  <strong>Category</strong>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @foreach($categories as $category)
                  <a class="dropdown-item" href="{{route('dropdown.show',$category->id)}}">{{$category->name}}</a>
                  @endforeach
                </div>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog.index')}}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about.index')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
          </li>
            
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true"></i>{{ __('login')}}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}"><i class="fa fa-user" aria-hidden="true"></i>{{ __('Register')}}</a>
          </li>
            @endif

            @else
          @if(Auth::check()&& Auth::user()->role=='company')
          <li class="nav-item">
            <a class="nav-link" href="{{route('seller.index')}}">Seller Post</a>
          </li>
          
          @foreach($recordlists as $recordlist)
          @if(Auth::check() && $recordlist->status == '1')
          <li class="nav-item">
            <a class="nav-link" href="{{route('company.create')}}">Upload Post</a>
          </li>
          @endif
          @endforeach

            
          <li class="nav-item">
            <a class="nav-link" href="{{route('cposthistory.index',Auth::user()->id)}}">History</a>
          </li>
          
          
     
        

          @elseif(Auth::check()&& Auth::user()->role=='seller')
          <li class="nav-item">
            <a class="nav-link" href="{{route('company.index')}}">Buyer Post</a>
          </li>
           
          @foreach($recordlists as $recordlist)
          @if(Auth::check() && $recordlist->status == '1')
          <li class="nav-item">
            <a class="nav-link" href="{{route('seller.create')}}">Upload Post</a>
          </li>
           @endif
          @endforeach
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('sposthistory.index',Auth::user()->id)}}">History</a>
          </li>
          

          @elseif(Auth::check() && Auth::user()->role=='admin')
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin')}}">Backend</a>
          </li>
          
          
          @endif  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
             <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <h6 class="dropdown-item">{{Auth::user()->name}}</h6>
              <a class="dropdown-item" href="{{route('profile.edit',Auth::user()->id)}}">Profile</a>
              <a class="dropdown-item"href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
                    
            </div>
          </li>
        @endguest 

        
        </ul>
      </div>
    <!--   <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> -->
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Carousel Star /-->
 <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url('{{asset('img/bg4.jpg')}}')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Hey!
                      <br>Welcome You</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">Our</span> Belief
                      <br>We  <span class="color-b">don't</span> work <span class="color-b"> for</span> us. <span class="color-b"> We</span> do  <span class="color-b">work </span>for  <span class="color-b">you.</span></h1>
                    <p class="intro-subtitle intro-price">
                      <span class="price-a">We are  <span class="color-b">leading only</span> you.</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url('{{asset('img/bg6.jpg')}}')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Hey!
                      <br> Welcome You</p>
                   <h1 class="intro-title mb-4">
                      <span class="color-b">Our</span> Belief
                      <br>We  <span class="color-b">don't</span> work <span class="color-b"> for</span> us. <span class="color-b"> We</span> do  <span class="color-b">work </span>for  <span class="color-b">you.</span></h1>
                    <p class="intro-subtitle intro-price">
                      <span class="price-a">We are  <span class="color-b">leading only</span> you.</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url('{{asset('img/bg5.jpg')}}')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Hey!
                      <br> Welcome You</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">Our</span> Belief
                      <br>We  <span class="color-b">don't</span> work <span class="color-b"> for</span> us. <span class="color-b"> We</span> do  <span class="color-b">work </span>for  <span class="color-b">you.</span></h1>
                    <p class="intro-subtitle intro-price">
                       <span class="price-a">We are  <span class="color-b">leading only</span> you.</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
 
  <!--/ Services End /-->

  <!--/ Property Star /-->
 @yield('content')
  <!--/ Property End /-->

 

  <!--/ News Star /-->
  <!-- <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest News</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">All News
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="new-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{asset('img/post-2.jpg')}}" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">House</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">House is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{asset('img/post-5.jpg')}}" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{asset('img/post-7.jpg')}}" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Park</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">Park is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{asset('img/post-3.jpg')}}" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="#">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!--/ News End /-->

 

  <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Our Members</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-male"></i>
                  Khaing Myo Kyawe
                </li>
                <li class="item-list-a">
                   <i class="fa fa-male"></i>
                  Aung Kyaw Soe
                </li>
                <li class="item-list-a">
                   <i class="fa fa-male"></i>
                  Arkar Phyoe
                </li>
                <li class="item-list-a">
                   <i class="fa fa-male"></i>
                  Than Zaw Htet
                </li>
                <li class="item-list-a">
                   <i class="fa fa-female"></i>
                  War War Soe
                </li>
                <li class="item-list-a">
                   <i class="fa fa-female"></i>
                  Khaing Thet Wai
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Phone-number</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                   +95 09-976209488
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                   +95 09-768310688
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                  +95 09-951069810
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                   +95 09-252737779
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                   +95 09-978855468
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                   +95 09-40098777
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
         <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Email</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  khingmyo.kmk@gmail.com
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  glowworm0110@gmail.com
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  minlay123mon@gmail.com
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  uptonsimona@gmail.com
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  warwarsoe@gmail.com
                  </li>
                   <li class="item-list-a">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  khaingthetwai@gmail.com
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <!--   <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav> -->
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Crop Service</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
            Designed by <a href="https://bootstrapmade.com/">BFT</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('lib/popper/popper.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('lib/scrollreveal/scrollreveal.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <!-- <script src="{{asset('contactform/contactform.js')}}"></script> -->

  <!-- Template Main Javascript File -->
  <script src="{{asset('js/main.js')}}"></script>
  @yield('script')

</body>
</html>
