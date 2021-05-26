@extends('layouts.reser')

@section('content')
<?php
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\roomController;
$categories = RoomCategoryController::Allroom();
$data = roomController::getRoomCategory();
?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="page-header">
                        RESERVATION <small></small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            PERSONAL INFORMATION
                        </div>
                        <div class="panel-body">
                            <form name="form">
                                @csrf
                                <div class="form-group">
                                    <label>Title<span class="required">*</span></label>
                                    <select name="title" id="title" class="form-control" required>
                                        <option value selected></option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Miss.">Miss.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Rev .">Rev .</option>
                                        <option value="Rev . Fr">Rev . Fr .</option>
                                    </select>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>First Name<span class="required">*</span></label>
                                    <input name="fname" id="fname" class="form-control" required>
                                    @if ($errors->has('fname'))
                                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lname" id="lname" class="form-control" required>
                                    @if ($errors->has('lname'))
                                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email<span class="required">*</span></label>
                                    <input name="email" id="email" type="email" class="form-control"
                                        value=" @php
                                            $userData = Auth::user()->email;
                                            echo $userData;
                                            // dd($userData);
                                        @endphp" required readonly>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>country<span class="required">*</span></label></label>
                                    <select name="country" id="country" class="form-control" required>
                                        <option value selected>Select country</option>
                                        @foreach ($countries as $countryValue)
                                            <option value="{{ $countryValue->country_id }}">
                                                {{ $countryValue->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>State<span class="required">*</span></label>
                                    <select name="state" id="state" class="form-control" required>
                                    </select>
                                    @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>City<span class="required">*</span></label>
                                    <select name="city" id="city" class="form-control" required>
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <div class=" form-group">
                                    <label>Phone Number<span class="required">*</span></label>
                                    <input name="phone" id="phone" type="text" class="form-control" required>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                RESERVATION INFORMATION
                            </div>
                            <form name="form">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Type Of Room <span class="required">*</span></label>
                                        <select name="troom" id="troom" class="form-control" required>
                                            <option value selected></option>
                                            @foreach ($categories as $categoriesvalue)
                                                <option value="{{ $categoriesvalue->id }}">
                                                    {{ $categoriesvalue->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('troom'))
                                            <span class="text-danger">{{ $errors->first('troom') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>No.of Rooms <span class="required">*</span></label>
                                        <select name="nroom" id="nroom" class="form-control" required>
                                        </select>
                                        @if ($errors->has('nroom'))
                                            <span class="text-danger">{{ $errors->first('nroom') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Bedding Type<span class="required">*</span></label>
                                        <select name="bed" id="bed" class="form-control" required>
                                            <option value selected></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        @if ($errors->has('bed'))
                                            <span class="text-danger">{{ $errors->first('bed') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Meal Plan<span class="required">*</span></label>
                                        <select name="meal" id="meal" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Room only">Room only</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Half Board">Half Board</option>
                                            <option value="Full Board">Full Board</option>
                                        </select>
                                        @if ($errors->has('meal'))
                                            <span class="text-danger">{{ $errors->first('meal') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Check-In<span class="required">*</span></label>
                                        <input name="cin" id="cin" class="form-control" placeholder="Check In Date"
                                            required>
                                        @if ($errors->has('cin'))
                                            <span class="text-danger">{{ $errors->first('cin') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Check-Out<span class="required">*</span></label>
                                        <input name="cout" id="cout" class="form-control" placeholder="check out Date"
                                            required>
                                        @if ($errors->has('cout'))
                                            <span class="text-danger">{{ $errors->first('cout') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" id="butsave" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->



    <script>
        // datepicker 
        $(document).ready(function() {
            var minDate = new Date();

            $("#cin").datepicker({
                showAnim: 'drop',
                numberOfMonth: 1,
                minDate: minDate,
                dateFormat: 'yy-mm-dd',
                onClose: function(selectedDate) {
                    $("#cout").datepicker("option", "minDate", selectedDate);
                }
            });

            $("#cout").datepicker({
                showAnim: 'drop',
                numberOfMonth: 1,
                minDate: minDate,
                dateFormat: 'yy-mm-dd',
                onClose: function(selectedDate) {
                    $("#cin").datepicker("option", "maxDate", selectedDate);
                }
            });

            // Dynamic country and state scritpping

            $('#country').on('change', function() {
                var idCountry = this.value;
                $("#state").html('');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    url: "{{ url('/get-state') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state').html(
                            '<option value selected>Select State</option>'
                        );
                        $.each(result.states, function(key, value) {
                            $("#state").append('<option value="' + value
                                .state_id + '">' + value.state_name +
                                '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function() {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    url: "{{ url('get-city') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city').html(
                            '<option value selected>Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city").append('<option value="' + value
                                .city_id + '">' + value.city_name +
                                '</option>');
                        });
                    }
                });
            });

        });


        // select room 
        $('#troom').on('change', function() {
            var idcategory = this.value;
            // console.log(idcategory);
            $("#nroom").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                url: "{{ url('/get-room') }}",
                type: "POST",
                data: {
                    id: idcategory,
                },
                dataType: 'json',
                success: function(result) {
                    $('#nroom').html(
                        '<option value selected>Select room name</option>'
                    );
                    $.each(result.rooms, function(key, value) {
                        $("#nroom").append('<option value="' + value
                            .id + '">' + value.room_name +
                            '</option>');
                    });
                }
            });
        });


        // submit dat in database
        $('#butsave').on('click', function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var country = $('#country').val();
            var state = $('#state').val();
            var city = $('#city').val();
            var phone = $('#phone').val();
            var troom = $('#troom').val();
            var bed = $('#bed').val();
            var nroom = $('#nroom').val();
            var meal = $('#meal').val();
            var cin = $('#cin').val();
            var cout = $('#cout').val();
            if (title != "" && fname != "" && lname != "" && email != "" &&
                country != "" && city != "" && state != "" &&
                troom != "" && bed != "" && nroom != "" && meal != "" && cin != "" && cout != "") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    url: "/reservation",
                    type: "POST",
                    data: {
                        title: title,
                        fname: fname,
                        lname: lname,
                        email: email,
                        country: country,
                        state: state,
                        city: city,
                        phone: phone,
                        troom: troom,
                        bed: bed,
                        nroom: nroom,
                        meal: meal,
                        cin: cin,
                        cout: cout
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            swal({
                                title: "success!",
                                text: "Your Reservation is Done plese  make a payment!",
                                type: "success",
                                icon: "success",
                                timer: 80000
                            });
                            setTimeout(function() {
                                window.location.href =
                                    "{{ url('amount') }}"; // redirecting to payment
                            }, 3000);
                        } else if (dataResult.statusCode == 201) {
                            location.reload();
                            // swal({
                            //     title: "error!",
                            //     text: "Reservation not done!",
                            //     type: "error",
                            //     icon: "error",
                            //     timer: 80000
                            // });
                        }
                    }
                })
            } else {

                swal({
                    title: "error!",
                    text: "All field are required",
                    type: "error",
                    icon: "error",
                    timer: 80000
                });
            }
        });

    </script>
@endsection
