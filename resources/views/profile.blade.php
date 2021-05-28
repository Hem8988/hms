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
                            {{-- <a href="edit/profile/{{ $user->id }}" class="btn btn-primary">Edit profile</a> --}}
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
                                    <h3 class="btn btn-primary" id="edit">Edit profile </h3>
                                </div>
                                <div class="col-12 text-right">
                                    <a id="password" class="btn btn-sm btn-primary">Settings</a>
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

                            <!---------------- Model for edit profilr--------------------------------------------->
                            @if (!empty($user->id))
                                <div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <form>
                                                        @csrf
                                                        <label>Name</label>
                                                        <input name="name" id="name" type="name" class="form-control"
                                                            value="{{ $user->name }}">
                                                        @if ($errors->has('name'))
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            value="{{ $user->email }}">
                                                        @if ($errors->has('email')) <span
                                                                class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif <label>Phone</label>
                                                        <input type="number" name="phone" id="phone" class="form-control"
                                                            value="{{ $user->phone }}">
                                                        @if ($errors->has('phone'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                        <label>Address</label>
                                                        <input type="text" name="addres" id="address" class="form-control"
                                                            value="{{ $user->address }}">
                                                        @if ($errors->has('address'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('address') }}</span>
                                                        @endif
                                                        <label>Postal code</label>
                                                        <input type="number" name="pin" id="pin" class="form-control"
                                                            value="{{ $user->pin }}">
                                                        @if ($errors->has('pin'))
                                                            <span class="text-danger">{{ $errors->first('pin') }}</span>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" id="editsave" class="btn btn-primary"
                                                    data-id="{{ $user->id }}">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="passwordModel" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">changes password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <form>
                                                        @csrf
                                                        <label>Old password</label>
                                                        <input type="password" name="old_password" id="old_password"
                                                            class="form-control" placeholder=" Enter your old password">
                                                        @if ($errors->has('old_password'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('old_password') }}</span>
                                                        @endif
                                                        <label>New Name</label>
                                                        <input name="password" id="new_password" name="password"
                                                            type="password" class="form-control"
                                                            placeholder="Enter your new password">
                                                        @if ($errors->has('password'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                        <label>Password_confirmation</label>
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation" class="form-control"
                                                            placeholder="Enter confirmation password">
                                                        @if ($errors->has('password_confirmation'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" id="editpassword" class="btn btn-primary"
                                                    data-id="{{ $user->id }}">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#edit').click(function() {
                $('#ajaxModel').modal('show');
            });
            //insert data to controoler 
            $(document).on("click", "#editsave", function(e) {
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var pin = $('#pin').val();
                var id = $(this).data('id');
                // console.log(id, pin, address, phone, email, name);
                e.preventDefault()
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this member again!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Edit it!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                },
                                url: "edit/profile/{{ $user->id }}",
                                method: "POST",
                                data: {
                                    id: id,
                                    email: email,
                                    name: name,
                                    phone: phone,
                                    address: address,
                                    pin: pin,
                                },
                                cache: false,
                                success: function(dataResult) {
                                    console.log(dataResult);
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode == 200) {
                                        swal({
                                            title: "success!",
                                            text: "Your Profile is successfully updated!",
                                            type: "success",
                                            icon: "success",
                                            timer: 80000
                                        });
                                        location.reload(
                                            setTimeout(function() {
                                                location = ''
                                            }, 20000)
                                        );
                                    } else {

                                    }
                                }
                            })
                        } else {
                            swal("Cancelled", "Your Profile can not be updated", "error");
                        }
                    });
            });


            // change password
            $('#password').click(function() {
                $('#passwordModel').modal('show');
            });

            $(document).on("click", "#editpassword", function(e) {
                e.preventDefault();
                var old_password = $('#old_password').val();
                var password = $('#new_password').val();
                var password_confirmation = $('#password_confirmation').val();
                var id = $(this).data('id');
                console.log(id, old_password, password, password_confirmation);
                e.preventDefault()
                if (old_password != '' && password != '' && password_confirmation != '') {
                    swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this member again!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Edit it!",
                            cancelButtonText: "No, cancel!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')

                                    },
                                    url: "edit/password/{{ $user->id }}",
                                    method: "POST",
                                    data: {
                                        old_password: old_password,
                                        password: password,
                                        id: id,
                                        password_confirmation: password_confirmation,

                                    },
                                    cache: false,
                                    success: function(dataResult) {
                                        console.log(dataResult);
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode == 200) {
                                            swal({
                                                title: "success!",
                                                text: "Your Profile is successfully updated!",
                                                type: "success",
                                                icon: "success",
                                                timer: 80000
                                            });
                                            setTimeout(function() {
                                                location.reload();
                                            }, 60000);

                                        } else if (dataResult.statusCode == 201) {
                                            swal({
                                                title: "error!",
                                                text: "Make sure old password is correct",
                                                type: "error",
                                                icon: "error",
                                                timer: 80000
                                            });
                                            setTimeout(function() {
                                                location.reload();
                                            }, 60000);


                                        }
                                    }
                                })
                            } else {
                                swal("Cancelled", "Your Profile can not be updated", "error");
                            }
                        });
                } else {
                    swal({
                        title: "Error!",
                        text: "All field  fields are required!",
                        type: "error",
                        icon: "error",
                        timer: 80000
                    });

                }
            });
        });

    </script>


@endsection
