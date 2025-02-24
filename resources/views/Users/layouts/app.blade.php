@include('Users.layouts.head')
  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
@include('Users.layouts.navbar')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
@yield('content')
      <!-- footer Content -->
@include('Users.layouts.footer')
