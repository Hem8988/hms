@extends('layouts.reser')


@section('content')
    {{-- @php
    dd($user);
    @endphp --}}
    @foreach ($user as $user)
    @endforeach
    <!-- Favicon -->
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="one">
            <div class="header pb-12 d-flex align-items-center"
                style="min-height: 500px; background-image: url({{ asset('profile/images/theme/profile-cover.jpg') }}); background-size: cover; background-position: center top;">
                <!-- Mask -->
                <span class="mask bg-gradient-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <h1 class="display-2 text-white">Hello {{ $user->name }}</h1>
                            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made
                                with your work and manage your projects or assigned tasks</p>
                            <a href="#!" class="btn btn-primary">Edit profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div id="hem">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="btn btn-primary">Edit profile </h3>
                                </div>
                                <div class="col-12 text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h2>User information</h2>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Name</label>
                                                <input type="text" id="input-username" class="form-control"
                                                    placeholder="Username" value="{{ $user->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input type="email" id="input-email" class="form-control"
                                                    placeholder="{{ $user->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Phone Number</label>
                                            <input type="number" id="input-first-name" class="form-control"
                                                value="{{ $user->phone }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div>/
                                    <hr class="my-4" />
                                    <!-- Address -->
                                    <h2 class="heading-small text-muted mb-4">Contact information</h2>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Address</label>
                                                    <input id="input-address" class="form-control"
                                                        placeholder="Home Address" value="{{ $user->address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">City</label>
                                                    <input type="text" id="input-city" class="form-control"
                                                        placeholder="City" value="New York">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Country</label>
                                                    <input type="text" id="input-country" class="form-control"
                                                        placeholder="Country" value="United States">
                                                </div>
                                            </div> --}}
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Postal
                                                    code</label>
                                                <input type="number" id="input-postal-code" class="form-control"
                                                    value="{{ $user->pin }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
