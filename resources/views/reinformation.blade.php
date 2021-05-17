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
                        @else
                            <tr>
                                <th>Payment Amout:</th>
                                <td>No data are available</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
    </div>

@endsection
