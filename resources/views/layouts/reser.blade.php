<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVATION SUNRISE HOTEL</title>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('reservationcss/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('reservationcss/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('reservationcss/assets/css/custom-styles.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- jQuery Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href={{ asset('assets/argon.css?v=1.2.0') }} type="text/css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../index.php"><img src="https://img.icons8.com/dusk/30/000000/home.png" /> Homepage</a>
                    </li>
                    <li>
                        <a href="{{ url('RoomsAvalability') }}"><img
                                src="https://img.icons8.com/emoji/30/000000/hotel-emoji.png" />Avalability</a>
                    </li>
                    <li>
                        <a href="{{ url('home') }}"><img
                                src="https://img.icons8.com/ultraviolet/30/000000/booking.png" />
                            Reservation</a>
                    </li>
                    <li>
                        <a href="{{ url('reservation-Information') }}"><img
                                src="https://img.icons8.com/bubbles/40/000000/information.png" />Reservation
                            Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="https://img.icons8.com/plasticine/30/000000/logout-rounded-down.png" />
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>

            </div>

        </nav>

        @yield('content')

    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->


    <!-- Bootstrap Js -->
    <script src="{{ asset('reservationcss/assets/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Js -->
    <script src="{{ asset('reservationcss/assets/js/jquery.metisMenu.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('reservationcss/assets/js/custom-scripts.js') }}"></script>


</body>

</html>
