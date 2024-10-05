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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Playfair+Display:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-lg">
            <div class="container">
               
                <a class="navbar-brand" href="{{ url('/') }}">
                   
                    <img class="me-2 pb-2" width="30" src="{{url('images/CapitanoLogo.png')}}">
                    <span class="me-5 logoText">Capitano</span>
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
                      
                       
                       <div class="ms-5 d-flex">
                           <form method="GET" action="{{route('searchProduct')}}" class="form-inline my-2 my-lg-0 d-flex">
                            @csrf
                               <input name="searchQuery" id="searchQuery" class=" form-control rounded-5" type="search" placeholder="Search"/>
                               <button type="submit" class="searchBtn btn ms-2 border-0 rounded-5 "><i class="bi bi-search"></i></button>
                           </form>
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
                                
                                @if (Auth::user()->role == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin') }}">Admin Dashboard</a>
                                </li>
                                @endif
                                
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
                    
                    <a class="navbar-brand " href="{{url('cart')}}"><i class="bi bi-bag ms-5"></i></a>
                    {{-- <span class="cart-amount-nav text-dark items-amount-pill">{{$cartAmount}}</span> --}}
                    
                </div>
            </div>
        </nav>

        <main class="pb-4">
            @yield('content')
        </main>
    </div>
    
</body>
<br><br>
<!--footer-->
<footer class="pt-5 border-top">
<div class="container">
 <div class="row d-flex justify-content-between g-4">

    <div class="col-12 col-md-3 px-md-0 px-5">
        <div class="row">
            <div class="col-6">
                <img width="100" src="{{url('images/CapitanoLogo.png')}}">
            </div>
        </div>
        <div class="row">
        <span class="me-5 logoText">Capitano</span>
        </div>
        
    </div>

    <div class="col-12 col-md-4 px-md-0 px-5">
        <h4>Navigate to other pages</h4>
        <ul class="nav flex-column">
            <li class="pb-2"><a class="text-decoration-none text-dark" href="{{ url('/women') }}">Shop Women's Clothing</a></li>
            <li class="pb-2"><a class="text-decoration-none text-dark" href="{{ url('/men') }}">Shop Men's Clothing</a></li>                   
            <li class="pb-2"><a class="text-decoration-none text-dark" href="{{ url('/contact') }}">Contact us</a></li>       
            <li class="pb-2"><a class="text-decoration-none text-dark" href="{{ url('/about') }}">About us</a></li>
        </ul>
    </div>

    <div class="col-12 col-md-5 px-md-0 px-5">
        <h5>Subscribe to our mail list!</h5>
        <h6>Be the first one to know when new product drops.</h6>
        <h6> Get exclusive discounts.</h6>
        <h6>And many more...</h6>
        <div class="row mt-3">
            <div class="col-8"><input type="email"  name="email" placeholder="Your email" class="form-control rounded-0"></div>
            <div class="col-4"><button class="btn btn-dark rounded-0" type="button">Subscribe</button></div>
        </div>
    </div>

 </div>
</div>

 <div class="container mt-5">
     <div class="row d-flex justify-content-center">
         <div class="col-4 col-sm-4 col-lg-2 d-flex justify-content-evenly">
             <a class="link-dark" href="https://www.instagram.com/capitano.clothing_/" >
                <i class="bi bi-instagram" style="font-size: 2rem;"></i>
            </a>
            
            <a class="link-dark" href="https://twitter.com/CapitanoCloth">
                <i class="bi bi-twitter" style="font-size: 2rem;"></i>
            </a>
            
            <a class="link-dark" href="https://twitter.com/CapitanoCloth">
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

<script type="module">
    // $(function(){
    //     $(document).scroll(function(){
    //         var $navbar = $("fixed-top");
    //         $navbar.toggleClass('navColour', $(this).scrollTop() > $navbar.height());
    //     });
    // });

    $(document).ready(function(){
        $(document).scroll(function(){
           if($(window).scrollTop() > 30){
                $('.navbar').addClass('navColour');
            }else{
                $('.navbar').removeClass('navColour');
            }
        })
    })
</script>

@yield('footer-scripts')
</html>
