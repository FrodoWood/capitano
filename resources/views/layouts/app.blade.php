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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!--can change to logo-->
                <a class="navbar-brand" href="{{ url('/') }}">
                 <i class="bi bi-house-fill"></i> 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    
                
                       <li class="nav-item"><a class="nav-link" href="{{ url('/women') }}">Women</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('/men') }}">Men </a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>

                       <div class="input-group">
                        <input class="form-control mr-sm-2" type="search" class="form-control rounded" placeholder="Search" style="width:10%" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div> 
                    </ul>
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

                        <!--Should I put dropdown here? It doesn't work when I put code on line 38-48 here-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                        @endguest
                    </ul>
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
<footer class="text-bg-secondary p-3">
<div class="container">
 <div class="row">
    <div class="col">
    <h4>Navigate to other pages</h4>
    <ul class="nav flex-column">
     <li><a style="color:white; text-decoration: none" href="{{ url('/women') }}">Shop Women's Clothing</a></li>
     <li><a style="color:white; text-decoration: none" href="{{ url('/women') }}">Shop Women's Clothing</a></li>
     <li><a style="color:white; text-decoration: none" href="{{ url('/men') }}">Shop Men's Clothing</a></li>                   
     <li><a style="color:white; text-decoration: none" href="{{ url('/contact') }}">Contact us</a></li>       
     <li><a style="color:white; text-decoration: none" href="{{ url('/about') }}">About us</a></li>

    </ul>
 </div>
 <div class="col">
 <h5>  Subscribe to our mail list!</h5>
    <h6>Be the first one to know when new product drops.</h6>
    <h6> Get exclusive discounts.</h6>
    <h6>And many more...</h6>
    
    <input type="email"  name="email" placeholder="Your email" style="border-radius: 10px; height:40px; width:350px;">
    <button class="btn btn-primary" type="button">Subscribe</button>
   
 </div>
 </div>
 </div>

 <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
 <p>© 2022 Capitano Clothing, All rights reserved. </p>

 NOTE: LOGO IN THE MIDDLE

<ul class="list-unstyled d-flex">
 <li class="ms-2"><a href="https://www.instagram.com/capitano.clothing_/" >
        <i class="bi bi-instagram" style="font-size: 2rem;"></i>
    </a>
 </li>
 <li class="ms-2"><a href="https://twitter.com/CapitanoCloth">
    <i class="bi bi-twitter" style="font-size: 2rem;"></i>
    </a>
 </li>
</ul>

</div>

</footer>


@yield('footer-scripts')
</html>
