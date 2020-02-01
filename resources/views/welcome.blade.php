<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ecommerce</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bs/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Ecommerce</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="/">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart.show') }}">Cart
              @if (Cart::isNotEmpty())
                  <span class="badge badge-pill badge-secondary">{{ Cart::itemCount() }}</span>
              @endif
            </a>
          </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="/">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart.show') }}">Cart
                    @if (Cart::isNotEmpty())
                        <span class="badge badge-pill badge-secondary">{{ Cart::itemCount() }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Customer Panel
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/customer/product">Product</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/user_profile/{{ Auth::user()->id }}">My Profile</a>
              </div>
            </li>
        @endguest

          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ url('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('register') }}">Register</a>
          </li>
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
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
    </div>
  </nav>
  <div class="container">
      @include('flash::message')
  </div>
  <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
  @yield('content')

  <!-- Footer
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
  </footer> -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('js/bs/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
