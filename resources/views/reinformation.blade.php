@extends('layouts.reser')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="page-header">
                        Your Reservation information <small></small>
                    </h1>
                </div>
            </div>
            <table class="table table-bordered table-striped  table-hover table-primary">
                @foreach ($information as $alldetails)
                    @foreach ($paymentData as $paymentDatas)
                        @if (!empty($alldetails->id))
                            <tr>
                                <th>Name:</th>
                                <td>{{ $alldetails->fname }} {{ $alldetails->lname }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $alldetails->email }}</td>
                            </tr>
                            <tr>
                                <th>Country:</th>
                                <td>{{ $alldetails->country_name }} </td>
                            </tr>
                            <tr>
                                <th>State:</th>
                                <td>{{ $alldetails->state_name }} </td>
                            </tr>
                            <tr>
                                <th>City:</th>
                                <td>{{ $alldetails->city_name }} </td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $alldetails->phone }} </td>
                            </tr>
                            <tr>
                                <th>Types of Rooms:</th>
                                <td>{{ $alldetails->name }} </td>
                            </tr>
                            <tr>
                                <th>Room No:</th>
                                <td>{{ $alldetails->room_name }} </td>
                            </tr>
                            <tr>
                                <th>Bedding Types:</th>
                                <td>{{ $alldetails->bed }} </td>
                            </tr>
                            <tr>
                                <th>Meal Planed:</th>
                                <td>{{ $alldetails->meal }} </td>
                            </tr>
                            <tr>
                                <th>Check in:</th>
                                <td>{{ $alldetails->cin }} </td>
                            </tr>
                            <tr>
                                <th>Check out:</th>
                                <td>{{ $alldetails->cout }} </td>
                            </tr>
                            <tr>
                                <th>Payment Amout:</th>
                                <td>
                                    @if ($paymentDatas->amount != null)


                                        {{ $paymentDatas->amount }}

                                    @else

                                        Payment amount is


                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th>Payment Status:</th>
                                <td>
                                    @if ($paymentDatas->payment_done == 1)

                                        Payment Done

                                    @else

                                        Payment Pending
                                        <br>
                                        <br>
                                        <a href="{{ url('/amount') }}"> click here to make payment </a>

                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>RESERVATION STATUS</th>
                                <td>
                                    @if ($alldetails->status == 1)

                                        Your Room ha been booking successfully

                                        <br>
                                        <br>
                                        <button type="button" id="cancel"> click here to canceled your booking </button>

                                    @else

                                        Your room ha been been canceled successfully

                                        <br>
                                        <br>
                                        <a href="{{ url('/home') }}"> click here for Reservation </a>

                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th>Payment Amout:</th>
                                <td>No data are available</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </table>
            <!-------------------------------------- Modal1 for Cancel reservation ----------------------------------------------->
            @if (!empty($alldetails->id))
                <div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cancel Reservation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <form>
                                        @csrf
                                        <label>Email*</label>
                                        <input type="hidden" id="nroomsend" name="task_id"
                                            value="{{ $alldetails->nroom }}">
                                        <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Enter the to confirmed">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="canceledSave" class="btn btn-primary"
                                    data-id="{{ $alldetails->id }}">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--------------------------------------------------- End modal-------------------------------------------->
        </div>
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <script>
        $(document).ready(function() {
            $('#cancel').click(function() {
                $('#ajaxModel').modal('show');
            });
            //insert data to controoler 
            $(document).on("click", "#canceledSave", function(e) {
                e.preventDefault();
                var email = $('#email').val();
                var id = $(this).data('id');
                var nroomsend = $('#nroomsend').val();
                e.preventDefault()
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this member again!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
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
                                url: "/reservation-Cancellation",
                                method: "POST",
                                data: {
                                    nroom: nroomsend,
                                    id: id,
                                    email: email,
                                },
                                cache: false,
                                success: function(dataResult) {
                                    var dataResult = JSON.parse(dataResult);
                                    if (dataResult.statusCode == 200) {
                                        swal({
                                            title: "success!",
                                            text: "Your Reservation is Canceled!",
                                            type: "success",
                                            icon: "success",
                                            timer: 80000
                                        });
                                        location.reload();
                                    } else {

                                    }
                                }
                            })
                        } else {
                            swal("Cancelled", "Your Reservation is not canceled :)", "error");
                        }
                    });
            });
        });

    </script>


@endsection
