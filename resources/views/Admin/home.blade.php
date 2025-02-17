@include('Admin.layouts.head')
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
@include("Admin.layouts.sidebar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
@include('Admin.layouts.navbar')
        <!-- partial -->
@yield('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('Admin.layouts.footer')