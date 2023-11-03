<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link href="{{ asset('css/style.css?v=' . date('YmdHis')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" crossorigin="" />

    @yield('styles')

    <title>@yield('title')</title>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center header-scrolled">
        <div class="container container_header container_header_big_display align-items-center justify-content-between">

          <div class="d-flex logo">
                <a href="/"></a>
                <div class="f-flex logo_title">
                        <h1>Shell Licensee</h1>
                        <h2>Royal Oil </p>
                </div>
          </div>
          <nav id="navbar" class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link scrollto" @if(Request::is('search/*') || Request::is('search') || Request::is('products') || Request::is('products/*') || Request::is('faq')) href="{{ route('home') }}" @else href="#home" @endif data-scroll="home">Home</a></li>
                    <li><a class="nav-link scrollto" @if(Request::is('search/*') || Request::is('search') || Request::is('products') || Request::is('products/*') || Request::is('faq')) href="{{ route('home') }}#shop" @else href="#shop" @endif data-scroll="shop">Our Shop</a></li>
                    <li><a class="nav-link scrollto" @if(Request::is('search/*') || Request::is('search') || Request::is('products') || Request::is('products/*') || Request::is('faq')) href="{{ route('home') }}#about" @else href="#about" @endif data-scroll="about">About</a></li>
                    <li><a class="nav-link scrollto" @if(Request::is('search/*') || Request::is('search') || Request::is('products') || Request::is('products/*') || Request::is('faq')) href="{{ route('home') }}#contact_us" @else href="#contact_us" @endif data-scroll="contact_us">Contact Us</a></li>
                </ul>
            </div>
          </nav>
          <div class="search">
            <form action="{{ route('search') }}" method="GET">
                @method('GET')
                <div class="container_search">
                    <input type="text" maxlength= "12" name="search"  placeholder="Search" class="searchbar">
                    <input type="image" src={{ asset('img/search.png') }} alt="Submit feedback" class="button">
                    {{-- <img src="{{ asset('img/search.png') }}" alt="Magnifying Glass" > --}}
                </div>
            </form>
          </div>
        </div>
        <div class="container container_header container_header_small_display align-items-center justify-content-around">

            <div class="d-flex logo">
                  <a href="/"></a>
                  <div class="f-flex logo_title">
                          <h1>Shell Licensee</h1>
                          <h2>Royal Oil </p>
                  </div>
            </div>
            <nav id="navbar" class="navbar navbar-expand-md navbar-light col-6">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item"><a class="nav-link scrollto" href="#home" data-scroll="home">Home</a></li>
                      <li class="nav-item"><a class="nav-link scrollto" href="#shop" data-scroll="shop">Our Shop</a></li>
                      <li class="nav-item"><a class="nav-link scrollto" href="#about" data-scroll="about">About</a></li>
                      <li class="nav-item"><a class="nav-link scrollto" href="#contact_us" data-scroll="contact_us">Contact Us</a></li>
                  </ul>

                 <div class="search col-3">
                    <form action="{{ route('search') }}" method="GET">
                        @method('GET')
                        <div class="container_search">
                            <input type="text" maxlength= "12" name="search"  placeholder="Search" class="searchbar">
                            <input type="image" src={{ asset('img/search.png') }} alt="Submit feedback" class="button">
                            {{-- <img src="{{ asset('img/search.png') }}" alt="Magnifying Glass" > --}}
                        </div>
                    </form>
                 </div>
              </div>
            </nav>
          </div>
      </header>
    @yield('content')

<footer class="footer">
    <div class="footer_container">
        <div class="footer_grid">
            <div class="footer_grid_item">
                <div id="map" style="width: 300px; height: 300px; margin: 0px 30px; box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.25), -1px -1px 4px 0px rgba(0, 0, 0, 0.25); border-radius: 10px;"></div>
            </div>
            <div class="footer_grid_item">
                <div class="d-flex flex-column">
                    <div class="information_title">
                        <h2>Contact Information</h2>
                    </div>
                    <div class="information_address">
                        <h2>Address</h2>
                        <p>{{ app()->getLocale() == 'am' ? $contacts[0]->address_am : (app()->getLocale() == 'en' ? $contacts[0]->address : $contacts[0]->address_ru)}}</p>
                    </div>
                    <div class="information_phone">
                        <h2>Phone</h2>
                        <a href="tel:347-00-00-00">{{ $contacts[0]->phone }}</a>
                    </div>
                    <div class="information_email">
                        <h2>E-Mail</h2>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=smth@gmail.com" target="_blank">{{ $contacts[0]->email }}</a>
                    </div>
                </div>
            </div>
            <div class="footer_grid_item">
                <div class="d-flex flex-column">
                    <div class="stay_in_touch">
                        <h2>Stay in Touch</h2>
                        <div class="d-flex flex-row social_links">
                            <a href="{{ $contacts[0]->fb_link }}" target="_blank"><img src="{{ asset('img/fb.png') }}" alt="fb"></a>
                            <a href="{{ $contacts[0]->insta_link }}" target="_blank"><img src="{{ asset('img/instagram.png') }}" alt="instagram"></a>
                            <a href="{{ $contacts[0]->ld_link }}" target="_blank"><img src="{{ asset('img/linkdin.png') }}" alt="linkdin"></a>
                            <a href="{{ $contacts[0]->tw_link }}" target="_blank"><img src="{{ asset('img/twitter.png') }}" alt="twitter"></a>
                        </div>
                    </div>
                    <div class="stay_in_touch">
                        <h2>Support</h2>
                        <div class="d-flex flex-column">
                            <a href="{{ asset('pdf/policy.pdf') }}" target="_blank">Privacy and Policy</a>
                            <a href="{{ asset('pdf/Terms_of_Use.pdf') }}" target="_blank">Terms of Use</a>
                            <a href="{{ asset('pdf/cookies.pdf') }}" target="_blank">Cookies</a>
                            <a href="{{ asset('pdf/Legal_Safety_and_Trademark.pdf') }}" target="_blank">Legal, Safety and Trademark info</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="footer_grid_item">
                <div class="d-flex flex-column">
                    <div class="about_footer">
                        <h2>About</h2>
                        <div class="d-flex flex-column">
                            <a href="#">Site Map</a>
                            <a href="{{ route('faqPage') }}">FAQ</a>
                        </div>
                    </div>
                    <div class="languages">
                        <h2>Languages</h2>
                        <div class="d-flex flex-column">
                            <a href="{{ app()->getLocale() == 'en' ? 'javascript:void(0)' : asset('locale/en') }}" class="lang" value="en"><img src="{{ asset('img/united-kingdom.png') }}" alt="uk"> English</a>
                            <a href="{{ app()->getLocale() == 'ru' ? 'javascript:void(0)' : asset('locale/ru') }}" class="lang" value="ru"><img src="{{ asset('img/russia.png') }}" alt="russia"> Russia</a>
                            <a href="{{ app()->getLocale() == 'am' ? 'javascript:void(0)' : asset('locale/am') }}" class="lang" value="am"><img src="{{ asset('img/armenia.png') }}" alt="armenia"> Armenia</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('leaflet/leaflet.js') }}" crossorigin=""></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
