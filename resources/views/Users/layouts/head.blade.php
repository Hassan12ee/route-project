
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="{{asset("User/vendor")}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   
    @livewireStyles
       


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset("User/assets")}}/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset("User/assets")}}/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="{{asset("User/assets")}}/css/owl.css">
  
  </head>
