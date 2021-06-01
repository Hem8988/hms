@extends('frontend.layouts.index')
@section('content')
    <!--  Welcome -->
    <section class="site-hero overlay" style="background-image: url(home/images/home3.jpg)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade-up">
                    <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To 5 <span
                            class="fa fa-star text-primary"></span> Hotel</span>
                    <h1 class="heading">
                        @if (!empty($info->slogan))
                            {{ $infor->slogan }}
                        @endif
                    </h1>
                    <a href="{{ route('register') }}" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve
                        Now</a>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="{{ asset('loginRegistrationcs/images/form-img.jpg') }}"
                        alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Login</h2>
                        <div class="form-group form-input">
                            <input type="email" name="email" id="email" />
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif


                        <div class="form-group form-input">
                            <input type="password" name="password" id="password" />
                            <label for="password" class="form-label">{{ __('Your Password') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 offset-md-4">
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <a href="{{ route('register') }}" id="registerhem">
                                {{ __('Click here if you want to register') }} </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
