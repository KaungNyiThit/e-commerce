<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">  --}}



    <!-- Scripts -->
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        @if (auth()->user()->isAdmin())
                            <ul class="navbar-nav me-auto">
                                <li class="navbar-nav me-auto">
                                    <a href="{{ url("/products/add")}}" class="nav-link text-success">New Product+</a>
                                </li>
                            </ul>  
                         @endif   
                    @endauth

                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i>Cart <span class="badge bg-danger">{{ count((array) session('cart'))}}</span>
                              </button>
                              <ul class="dropdown-menu" style="width: 300px">
                                @if (!session('cart'))
                                    <p class="text-center">No products in your cart!</p>
                                @endif
                            @foreach ((array) session('cart') as $id => $details )

                                  <div class="row " style="margin-bottom: 10px">

                                    <div class="col-12 text-end">
                                        <a href="{{ url( "cart/remove/$id" )}}" class="btn border-none " style="font-size: 1.4rem">&times;</a>
                                    </div>
                                      <div class="col-4">
                                          <img src="/storage/{{ $details['photo'] }}" style="width: 100px;">
                                      </div>
                                      <div class="col-8">
                                          <p>Product :{{$details['product_name']}}</p>
                                           <span class="text-success">$ {{$details['price']}}</span>
                                        
                                           <span id="qty">Quantity {{$details['quantity']}}</span>

                                            
                                           <p>total: {{$details['price'] * $details['quantity']}}</p>
                                      </div>
                                  </div>
                                  <hr>
                            @endforeach
                                  <div class="row">
                                      <div class="col-12 text-center" >
                                          <a href="{{url("/cart")}}" class="btn btn-primary btn-block" style="font-size: 12px">View all</a>
                                      </div>
                                  </div>
                              </ul>
                            
                        </div>

                        

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
    {{-- <script>
        let qtyValue = document.getElementById('qty');

        let stockValue = {{ }}

        if()
    </script> --}}
</body>
</html>
