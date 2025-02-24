<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="{{ route('User.home') }}"><h2>Sixteen <em>Clothing</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
        @auth
      
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('User.home') }}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products') }}">Our Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('User.About') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('User.Contact') }}">Contact Us</a>
            </li>
           
            <li class="nav-item">
              <a href="{{ route('User.profile') }}" class="nav-link">
                
                {{ Auth::user()->name }}
                
              </a>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
              <button type="submit" class="nav-link btn btn-link" >Log out</button>
            </form>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Log in</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            
          </ul>
          @endauth
          
        </div>
        @endif
      </div>
    </nav>
  </header>