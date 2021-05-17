@extends('layouts.reser')

@section('content')
    @php
    // $email = Auth::user();
    // dd($reservationInformation);
    // dd($paymentData);
    @endphp
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
                @foreach ($reservationInformation as $alldetails)
                    @foreach ($paymentData as $paymentDatas)


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
                            <td>{{ $alldetails->country }} </td>
                        </tr>
                        <tr>
                            <th>State:</th>
                            <td>{{ $alldetails->state }} </td>
                        </tr>
                        <tr>
                            <th>City:</th>
                            <td>{{ $alldetails->city }} </td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $alldetails->phone }} </td>
                        </tr>
                        <tr>
                            <th>Types of Rooms:</th>
                            <td>{{ $alldetails->troom }} </td>
                        </tr>
                        <tr>
                            <th>Room No:</th>
                            <td>{{ $alldetails->nroom }} </td>
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
                            <td>{{ $paymentDatas->amount }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status:</th>
                            <td>{{ $paymentDatas->payment_done }} </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
    </div>

@endsection
