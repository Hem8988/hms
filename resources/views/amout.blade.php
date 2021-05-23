<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Payment</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(198, 198, 216);
            font-size: 0.8rem
        }

        .card {
            max-width: 1000px;
            margin: 2vh
        }

        .card-top {
            padding: 0.7rem 5rem
        }

        .card-top a {
            float: left;
            margin-top: 0.7rem
        }

        #logo {
            font-family: 'Dancing Script';
            font-weight: bold;
            font-size: 1.6rem
        }

        .card-body {
            padding: 0 5rem 5rem 5rem;
            background-image: url("https://i.imgur.com/4bg1e6u.jpg");
            background-size: cover;
            background-repeat: no-repeat
        }

        @media(max-width:768px) {
            .card-body {
                padding: 0 1rem 1rem 1rem;
                background-image: url("https://i.imgur.com/4bg1e6u.jpg");
                background-size: cover;
                background-repeat: no-repeat
            }

            .card-top {
                padding: 0.7rem 1rem
            }
        }

        .row {
            margin: 0
        }

        .upper {
            padding: 1rem 0;
            justify-content: space-evenly
        }

        #three {
            border-radius: 1rem;
            width: 22px;
            height: 22px;
            margin-right: 3px;
            border: 1px solid blue;
            text-align: center;
            display: inline-block
        }

        #payment {
            margin: 0;
            color: blue
        }

        .icons {
            margin-left: auto
        }

        form span {
            color: rgb(179, 179, 179)
        }

        form {
            padding: 2vh 0
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input:focus::-webkit-input-placeholder {
            color: transparent
        }

        .header {
            font-size: 1.5rem
        }

        .left {
            background-color: #ffffff;
            padding: 2vh
        }

        .left img {
            width: 2rem
        }

        .left .col-4 {
            padding-left: 0
        }

        .right .item {
            padding: 0.3rem 0
        }

        .right {
            background-color: #ffffff;
            padding: 2vh
        }

        .col-8 {
            padding: 0 1vh
        }

        .lower {
            line-height: 2
        }

        .btn {
            background-color: rgb(23, 4, 189);
            border-color: rgb(23, 4, 189);
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin: 4vh 0 1.5vh 0;
            padding: 1.5vh;
            border-radius: 0
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none
        }

        .btn:hover {
            color: white
        }

        a {
            color: black
        }

        a:hover {
            color: black;
            text-decoration: none
        }

        input[type=checkbox] {
            width: unset;
            margin-bottom: unset
        }

        #cvv {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center
        }

        #cvv:hover {}

    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="card">
        <div class="card-top border-bottom text-center"> <a href="#"> Back to Booking</a> <span id="logo">Pardeshi
                Resort</span> </div>
        <div class="card-body">
            <div class="row upper">
                {{-- <span><i class="fa fa-check-circle-o"></i> Shopping bag</span> --}}
                <span><i class="fa fa-check-circle-o"></i> Order details</span> <span id="payment"><span
                        id="three">3</span>Payment</span>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="left border">
                        <div class="row"> <span class="header">Payment</span>
                            <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img
                                    src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img
                                    src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                        </div>
                        @foreach ($userData as $userDatas)
                            @foreach ($paymentData as $paymentDatas)
                            @endforeach
                        @endforeach
                        <div>
                            <form method="post" action="{{ url('payments') }}">
                                @csrf
                                <div>
                                    <label for="exampleInputEmail1">Enter email</label>
                                    <input type="text" name="email" value="
                                        @if ($userDatas->id == $paymentDatas->rId) {{ $userDatas->email }} @endif" readonly>
                                    <input type="hidden" name="rId" value="
                                        @if ($userDatas->id == $paymentDatas->rId) {{ $paymentDatas->rId }} @endif" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <input type="text" name="amount" id="exampleInputPassword1" value="@if ($userDatas->id == $paymentDatas->rId) {{ $paymentDatas->amount }} @endif" readonly>
                                </div>
                                @if (!Session::has('data'))
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right border">
                        <div class="header">Order Summary</div>
                        <p>2 items</p>
                        <div class="row item">
                            <div class="col-4 align-self-center"><img class="img-fluid"
                                    src="https://i.imgur.com/79M6pU0.png"></div>
                            <div class="col-8">
                                <div class="row"><b>$ 26.99</b></div>
                                <div class="row text-muted">Be Legandary Lipstick-Nude rose</div>
                                <div class="row">Qty:1</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row lower">
                            <div class="col text-left">Subtotal</div>
                            <div class="col text-right">$ 46.98</div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><b>Total to pay</b></div>
                            <div class="col text-right"><b>$ 46.98</b></div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>

                            @if (Session::has('data'))

                                <div class="container tex-center mx-auto">
                                    <form action="/pay" method="POST" class="text-center mx-auto
                                        mt-5">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZOR_KEY') }}"
                                            data-amount="{{ Session::get('data.amount') }}" data-currency="INR"
                                            data-order_id="{{ Session::get('data.order_id') }}"
                                            data-buttontext="Pay with Razorpay" data-name="Hotel"
                                            data-description="Test transaction" data-theme.color="#F37254">
                                        </script>
                                        <input type="hidden" custom="Hidden Element" name="hidden">
                                    </form>

                                </div>
                            @else
                        </div>
                        @endif
                        <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                    </div>
                </div>
            </div>
        </div>
        <div> </div>
    </div>
</body>

</html>
