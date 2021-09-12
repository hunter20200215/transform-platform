<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Freighty') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.test = function() {
            function postal_code() {
            var input1 = document.getElementById('pick_up_code1');
            var input2 = document.getElementById('pick_up_code2');
            var input3 = document.getElementById('pick_up_code3');
            var input4 = document.getElementById('delivery_code1');
            var input5 = document.getElementById('delivery_code2');
            var input6 = document.getElementById('delivery_code3');
            var options = {
                types: ['(regions)'],
                componentRestrictions: { country: ['DE'] },
            }
            var autocomplete = new google.maps.places.Autocomplete(input1, options);
            var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
            var autocomplete3 = new google.maps.places.Autocomplete(input3, options);
            var autocomplete4 = new google.maps.places.Autocomplete(input4, options);
            var autocomplete5 = new google.maps.places.Autocomplete(input5, options);
            var autocomplete6 = new google.maps.places.Autocomplete(input6, options);
            }
            window.google.maps.event.addDomListener(window, 'load', postal_code);
        
        }
    </script>

    <!-- for bootstrap -->
    <!-- for Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://mojoaxel.github.io/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <!-- for google auto complete -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M&callback=test"    async defer>  </script>
    <!-- <script src="{{ asset('js/googlemap.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://mojoaxel.github.io/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <script src="{{ asset('js/awesome.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/auth.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" >

    <!-- custom js -->
    <script src="{{ asset('js/index.js') }}" ></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 1.5rem;letter-spacing: 2px;">
                    <!-- <img class="logo-image" src="/img/logo.png" alt="logo_image"> -->
                    <img class="logo-image" src='{{ URL::asset("/img/logo.png") }}' alt="logo_image">
                    {{__('Freighty')}}
                </a>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('new_shipment') }}" id="new_shipment">{{ __('New Shipment') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('active_shipment') }}">{{ __('Active Shipment') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('History') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Draft') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Invoices') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Payments') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Address book') }}</a>
                            </li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Help') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Setting') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    var owl = $('.owl-carousel').owlCarousel({
      margin: 5.1,
      dots: false,
    //   nav: true,
    //   navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
      responsive: {
        0: {
          items: 5
        },
        600: {
          items: 5
        },
        1000: {
          items: 5
        }
      }
    });
    $('#prev_btn').click(function() {
        owl.trigger('prev.owl.carousel');
    });
    $('#next_btn').click(function() {
        owl.trigger('next.owl.carousel');
    });

    
  </script>
</body>
</html>
