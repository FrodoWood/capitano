<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-white sticky-top navbar-expand-lg border-bottom">
            <div class="container">
               
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="me-5" width="30" src="{{url('images/CapitanoLogo.png')}}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto nav-page-links">
                    
                
                       <li class="nav-item"><a class="nav-link" href="{{ url('/women') }}">Women</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('/men') }}">Men </a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('home') }}">Store</a></li>
                       
                       <div class="ms-5 d-flex">
                           <input class="form-control" type="search" placeholder="Search" style="width:100%" />
                           <button type="button" class="btn btn-outline-success ms-2">Search</button>
                       </div>
                    </ul>


                    
                   
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    
                        <!-- Authentication Links -->
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">Orders</a>
                            </li>
                        @endguest
                        
                        
                    </ul>
                    <a class="navbar-brand " href="{{url('cart')}}"><i class="bi bi-cart-fill ms-5"></i></a>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<br><br>
<!--footer-->
<footer class="text-light pt-5">
<div class="container">
 <div class="row d-flex justify-content-between">
    <div class="col-2 ">
        <img width="100" src="{{url('images/CapitanoLogo.png')}}">
    </div>
    <div class="col-4">
    <h4>Navigate to other pages</h4>
    <ul class="nav flex-column">
     <li><a style="color:white; text-decoration: none" href="{{ url('/women') }}">Shop Women's Clothing</a></li>
     <li><a style="color:white; text-decoration: none" href="{{ url('/men') }}">Shop Men's Clothing</a></li>                   
     <li><a style="color:white; text-decoration: none" href="{{ url('/contact') }}">Contact us</a></li>       
     <li><a style="color:white; text-decoration: none" href="{{ url('/about') }}">About us</a></li>
     

    </ul>
 </div>
 <div class="col-5">
 <h5>  Subscribe to our mail list!</h5>
    <h6>Be the first one to know when new product drops.</h6>
    <h6> Get exclusive discounts.</h6>
    <h6>And many more...</h6>
    <div class="row mt-3">
        <div class="col-8"><input type="email"  name="email" placeholder="Your email" class="form-control"></div>
        <div class="col-4"><button class="btn btn-dark" type="button">Subscribe</button></div>
    </div>
   
 </div>
 </div>
 </div>

 <div class="container mt-5">
     <div class="row d-flex justify-content-center">
         <div class="col-2 d-flex justify-content-evenly">
             <a class="link-light" href="https://www.instagram.com/capitano.clothing_/" >
                <i class="bi bi-instagram" style="font-size: 2rem;"></i>
            </a>
            
            <a class="link-light" href="https://twitter.com/CapitanoCloth">
                <i class="bi bi-twitter" style="font-size: 2rem;"></i>
            </a>
            
            <a class="link-light" href="https://twitter.com/CapitanoCloth">
                <i class="bi bi-youtube" style="font-size: 2rem;"></i>
            </a>
        </div>
     </div>

     <div class="row">
        <div class="col-12 text-center">
            <p class="my-4">© 2022 Capitano Clothing, All rights reserved. </p>
        </div>
     </div>
 </div>

</footer>


@yield('footer-scripts')
</html>
