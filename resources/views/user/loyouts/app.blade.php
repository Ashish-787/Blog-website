<html lang="en">
<head>
    <title>Colorlib Villa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

       <!-- Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">

        <!-- Theme Style -->
        <link rel="stylesheet" href="{{ asset('css/user_css/style.css') }}">
</head>
  <body>
    <!-- start header -->
         @include('user.loyouts.header'); 
    <!-- END header -->

           @yield('content')
    

    <!-- footer  -->
    
          @include('user.loyouts.footer');
    
    <!-- footer -->
     <!-- JS Files -->
     <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script> -->
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/Main/main.js') }}"></script>
  </body>
</html>