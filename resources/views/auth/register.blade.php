@extends('frontend.layouts.index')
@section('content')
    <!--  Welcome -->
    <section class="site-hero overlay" style="background-image: url(home/images/hero_4.jpg)"
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
                    <form method="POST" id="booking-form" action="{{ route('register') }}">
                        @csrf
                        <h2>Registration </h2>
                        <div class="form-group form-input">
                            <input type="text" name="name" id="name" />
                            <label for="name" class="form-label">{{ __('Your Name') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <div class="form-group form-input">
                            <input type="email" name="email" id="email" />
                            <label for="email" class="form-label">{{ __('Your Email') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <div class="form-group form-input">
                            <input type="number" name="phone" id="phone" />
                            <label for="phone" class="form-label">{{ __('Your Phone Number') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                        <div class="form-group form-input">
                            <input type="address" name="address" id="address" />
                            <label for="address" class="form-label">{{ __('Your addressr') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                        <div class="form-group form-input">
                            <input type="number" name="pin" id="pin" />
                            <label for="pin" class="form-label">{{ __('Your postal code') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('pin'))
                            <span class="text-danger">{{ $errors->first('pin') }}</span>
                        @endif
                        {{-- <div class="form-group form-input">
                            <input type="file" name="profile" id="profile" />
                            <label for="profile" class="form-label"><span class="required">*</span></label>
                        </div> --}}
                        <div class="form-group">
                            <label>Image </label>
                            <input type="file" class="form-control" name="profile" />
                        </div>
                        @if ($errors->has('profile'))
                            <span class="text-danger">{{ $errors->first('profile') }}</span>
                        @endif
                        <div class="form-group form-input">
                            <input type="password" name="password" id="password" />
                            <label for="password" class="form-label">{{ __('Your Password') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <div class="form-group form-input">
                            <input type="password" name="password_confirmation" id="password_confirmation" />
                            <label for="password" class="form-label">{{ __('Confirm Password') }}<span
                                    class="required">*</span></label>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                        <div class="form-submit">
                            <input type="submit" value="Register" class="submit" id="submit" name="submit" />
                            <a href="{{ route('login') }}"> click here if you are already Register </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
