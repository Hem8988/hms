<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('home/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/fonts/fontawesome/css/font-awesome.min.css') }}">
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('loginRegistrationcs/css/style.css') }}">
    <style>
        .required {
            color: red;
        }

        
    </style>
</head>

<body>

    @include('frontend.layouts.header')
    <!-- END head -->
    @yield('content')
    @include('frontend.layouts.footer')
    <script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.fancybox.min.js') }}"></script>


    <script src="home/js/aos.js"></script>

    <script src="{{ asset('home/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('home/js/jquery.timepicker.min.js') }}"></script>



    <script src="{{ asset('home/js/main.js') }}"></script>
</body>

</html>
