<!DOCTYPE html>
<html lang="en">

<head>
  <title>Afdalcomp- @section('title','home')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href=" {{ asset('css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/animate.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/magnific-popup.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/aos.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/ionicons.min.css') }}">

  <link rel="stylesheet" href=" {{ asset('css/flaticon.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/icomoon.css') }}">
  <link rel="stylesheet" href=" {{ asset('css/style.css') }}">

  <link rel="stylesheet" href=" {{ asset('userProfile') }}">

  {{-- logo font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oldenburg&display=swap" rel="stylesheet">

  {{-- font icons --}}
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
  <style>
    #home-search {
      background: rgba(255, 255, 255, 0.76) !important;
      border-radius: 25px 0 0 25px;
      font-weight: 700;
      color: #243665 !important;
      border-color: #243665 !important;
    }

    input::-webkit-input-placeholder {
      color: #243665 !important;

    }

    input:-moz-placeholder {
      color: #243665 !important;

    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="col-md-4 d-flex align-items-center py-4">
      <a class="navbar-brand" href="/" style="font-family: 'Oldenburg', cursive;"><span
          style="font-size:38px">A</span><span>fdalcomp</span></a>
    </div>
    <div class="container d-flex align-items-center">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse " id="ftco-nav">
        <ul class="navbar-nav mr-auto float-right">
          <li class="nav-item active"><a href="/" class="nav-link pl-0">Home</a></li>

          <li class="nav-item  submenu dropdown">

            <a href="{{ route('allCategories' )}}" class="nav-link ">Companies</a>
            @isset($categories)

            <ul class="dropdown-menu">



              @foreach ($categories as $category )
              <li class="nav-item">
                <a class="nav-link text-dark justify-content-center px-2"
                  href="{{ route('category',$category->id )}}">{{ $category->name }}</a>
              </li>
              @endforeach

            </ul>
            @endisset
          </li>
          <li class="nav-item"><a href="{{ route('services' )}}" class="nav-link">Services</a></li>
          <li class="nav-item "><a href="{{  route('about' ) }}" class="nav-link" style="margin-right:200px;">About</a>
          </li>
          @guest
          @if (Route::has('login'))


          <li class="nav-item ml-5">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('users.index') }}" role="button"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('users.index') }}">
                {{ __('Profile') }}
              </a>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->





  <section class="home-slider owl-carousel">
    {{-- @foreach ($owner as $shop) --}}
    @for ($i = 1; $i <= 4; $i++) <div class="slider-item"
      style="background-image:url('/storage/public_site/{{ $i }}.jpg') ; background-position: center; background-size: cover; ">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate align-self-center d-flex flex-column-reverse align-items-center">

            {{-- Search part --}}
            <form action="{{ route('search') }}" method="get"
              class=" w-100 searchform order-lg-last border  ">
              <div class="form-group d-flex w-100">
                <input type="text" class="form-control pl-3  text-danger" id="home-search" placeholder="Search"
                  name="search" required>
                <button type="submit" placeholder="" class="form-control search"><span
                    class="ion-ios-search"></span></button>
              </div>
            </form>
            {{-- End Searh part --}}
            <p><a href="{{ route('allCategories') }}" class=" btn btn-primary px-4 py-1 rounded-pill mt-3">Explore!</a>
            </p>
            <h5 class="subheading text-truncate w-50"></h5>
          </div>
        </div>
      </div>
      </div>
      @endfor


  </section>


  <section class="ftco-section ftco-no-pb">
    <div class="container px-0 ">
      <div class="row no-gutters justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-4">Categories</h2>
          <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary
            regelialia. It is a paradisematic country</p>
          <p></p>
        </div>
      </div>
      <div class="row no-gutters">
        @foreach ($category as $category)
        <div class="col-md-3">
          <div class="project img ftco-animate d-flex justify-content-center align-items-center"
            style="background-image: url({{asset($category->image)}});  background-position: center; background-size: cover;">
            <div class="overlay"></div>
            <a href="{{ route('category',$category->id) }}"
              class="btn-site d-flex align-items-center justify-content-center"><span
                class="icon-subdirectory_arrow_right"></span></a>
            <div class="text text-center p-4">
              <h3><a href="{{ route('category',$category->id) }}">{{$category->name}}</a></h3>

            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>


  <section class="ftco-intro ftco-no-pb img"
    style="background-color:#243665 !important; opacity:unset !important; margin-top:7em">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-10 text-center heading-section heading-section-white ftco-animate">
          <h2 class="mb-0">You Always Get the Best Guidance</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter" id="section-counter">
    <div class="container">
      <div class="row d-md-flex align-items-center justify-content-center">
        <div class="wrapper">
          <div class="row d-md-flex align-items-center">
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate ">
              <div class="block-18">
                <div class="icon"><span class="flaticon-doctor"></span></div>
                <div class="text">
                  <strong class="number" data-number="{{ $owner_counter }}">0</strong>
                  <span>Companies</span>
                </div>
              </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="icon"><span class="flaticon-doctor"></span></div>
                <div class="text">
                  <strong class="number" data-number="{{ $users_counter }}">0</strong>
                  <span>Users</span>
                </div>
              </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="icon"><span class="flaticon-doctor"></span></div>
                <div class="text">
                  <strong class="number" data-number="{{ $users_counter }}">0</strong>
                  <span>Reviews</span>
                </div>
              </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="icon"><span class="flaticon-doctor"></span></div>
                <div class="text">
                  <strong class="number" data-number="5">0</strong>
                  <span>Years of Experience</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-8 text-center heading-section ftco-animate">
          <h2 class="mb-4">Our Services</h2>
          <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary
            regelialia. It is a paradisematic country</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-4 d-flex">
          <div class="services-2 noborder-left text-center ftco-animate">
            <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                class="flaticon-analysis"></span></div>
            <div class="text media-body">
              <h3>Business Analysis</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 d-flex">
          <div class="services-2 text-center ftco-animate">
            <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                class="flaticon-business"></span></div>
            <div class="text media-body">
              <h3>Business Consulting</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 d-flex">
          <div class="services-2 text-center ftco-animate">
            <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                class="flaticon-insurance"></span></div>
            <div class="text media-body">
              <h3>Business Insurance</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 d-flex">
          <div class="services-2 noborder-left noborder-bottom text-center ftco-animate">
            <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-money"></span>
            </div>
            <div class="text media-body">
              <h3>Global Investigation</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 d-flex">
          <div class="services-2 text-center noborder-bottom ftco-animate">
            <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                class="flaticon-rating"></span>
            </div>
            <div class="text media-body">
              <h3>Audit &amp; Evaluation</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 d-flex">
          <div class="services-2 text-center noborder-bottom ftco-animate">
            <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                class="flaticon-search-engine"></span></div>
            <div class="text media-body">
              <h3>Marketing Strategy</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-8 text-center heading-section ftco-animate">
          <h2 class="mb-4"><span>Top Reviewed Companies</span> </h2>
          <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary
            regelialia. It is a paradisematic country</p>
        </div>
      </div>
      <div class="row w-100 d-flex ">

        @foreach ($companies as $shop)
        <div class="col-md-6 col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20 d-flex align-items-end"
              style="background-image: url('{{asset($shop->logo)}}');">
            </a>
            <div class="text bg-white p-4">
              <h3 class="heading"><a href="#">{{$shop->company_name}}</a></h3>
              <p>{{ $shop->owner_name}}</p>
              <div class="d-flex align-items-center mt-4">
                <p class="mb-0"><a href="{{ route('company',$shop->id) }}" class="btn btn-primary">Discover More <span
                      class="ion-ios-arrow-round-forward"></span></a></p>
                <p class="ml-auto mb-0">
                <p class="mr-2 mt-3">{{ $shop->address }}</p>
                <p class="mr-2 mt-3"></p>
                </p>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
  </section>




  <footer class="ftco-footer  ftco-section">
    <div class="container">
      <div class="row mb-5" style="justify-content:space-between">
        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5">
            <div>
              <a class="navbar-brand" href="/" style="font-family: 'Oldenburg', cursive;"><span
                  style="font-size:38px">A</span><span>fdalcomp</span></a>
            </div>
          </div>
        </div>
 
        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">
              <li><a href="/"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
              <li><a href="{{ 'about' }}"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
              <li><a href="{{ 'services' }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
              <li><a href="{{ route('allCategories' )}}"><span
                    class="ion-ios-arrow-round-forward mr-2"></span>Companies</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2">Our Contact Info</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Amman, Jordan</span></li>
                <li><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></li>
                <li><span class="icon icon-envelope"> </span><span class="text ">Afdalcomp@gmail.com</span> </li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-lg-2">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a
                  href="https://www.facebook.com/people/%D8%BA%D8%B5%D9%88%D9%86-%D8%A7%D9%84%D8%B1%D8%AD%D8%A7%D8%AD%D9%84%D8%A9/100008018806086/"
                  target="_blank"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/gswnlrhhl/" target="_blank"><span
                    class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      {{--
    </div> --}}

    <div class="row">
      <div class="col-md-12 text-center">

        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> by <a
            href="https://google.com" target="_blank">Kafou Team</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/9bef045b1e.js" crossorigin="anonymous"></script>

  <script src=" {{ asset('js/jquery.min.js') }}"></script>
  <script src=" {{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src=" {{ asset('js/popper.min.js') }}"></script>
  <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
  <script src=" {{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src=" {{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src=" {{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src=" {{ asset('js/owl.carousel.min.js') }}"></script>
  <script src=" {{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src=" {{ asset('js/aos.js') }}"></script>
  <script src=" {{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src=" {{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src=" {{ asset('js/google-map.js') }}"></script>
  <script src=" {{ asset('js/main.js') }}"></script>
</body>

</html>