@extends('admin.layouts.admin')

@section('content')
    @foreach ($reservation as $r)
    @endforeach
    @foreach ($paymentData as $pay)
    @endforeach
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="page-header">
                        Reservation information <small></small>
                    </h1>
                </div>
            </div>
            <table class="table table-bordered table-striped  table-hover table-primary" style="width:70%">
                <tr>
                    <th style="width:20%">id</th>
                    <td>{{ $r->id }}</td>
                </tr>
                <tr>
                    <th style="width:20%">title</th>
                    <td>{{ $r->title }}</td>
                </tr>
                <tr>
                    <th style="width:20%">fname</th>
                    <td>{{ $r->fname }}</td>
                </tr>
                <tr>
                    <th style="width:20%">lname</th>
                    <td>{{ $r->lname }}</td>
                </tr>
                <tr>
                    <th style="width:20%">email</th>
                    <td>{{ $r->email }}</td>
                </tr>
                <tr>
                    <th style="width:20%">country</th>
                    <td>{{ $r->country_name }}</td>

                </tr>
                <tr>
                    <th style="width:20%">state</th>
                    <td>{{ $r->state_name }}</td>
                </tr>
                <tr>
                    <th style="width:20%">city</th>
                    <td>{{ $r->city_name }}</td>

                </tr>

                <tr>
                    <th sstyle="width:20%">phone</th>
                    <td>{{ $r->phone }}</td>

                </tr>
                <tr>
                    <th style="width:20%">Type of Room</th>
                    <td>{{ $r->name }}</td>

                </tr>
                <tr>
                    <th style="width:20%">Bed</th>
                    <td> {{ $r->bed }}</td>

                </tr>
                <tr>
                    <th style="width:20%">No of Room</th>
                    <td>{{ $r->room_name }}</td>
                </tr>

                <tr>
                    <th style="width:20%">Meal</th>
                    <td>{{ $r->meal }}</td>
                </tr>
                <tr>
                    <th style="width:20%">Check in</th>
                    <td>{{ $r->cin }}</td>

                </tr>
                <tr>
                    <th style="width:20%">Check out</th>
                    <td>{{ $r->cout }}</td>
                </tr>
                <tr>
                    <th style="width:20%">Status</th>
                    <td>
                        @if ($r->status == 1)

                            Booking confirmed

                        @else

                            Booking Cancelled
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:20%">Amount</th>
                    <td>{{ $pay->amount }}</td>
                </tr>
                <tr>
                    <th style="width:20%">payment Status</th>
                    <td>
                        @if ($pay->payment_done == 1)

                            Payment Done

                        @else

                            Payment Pending

                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width:20%">Edit</th>
                    <td> <a class="btn btn-primary" href="Edit&&detail/{{ $r->id }}">Edit</a></td>
                </tr>
                <tr>
                    <th style="width:20%">Delete</th>
                    <td><a class="btn btn-danger" href="delete&&detail/{{ $r->id }}">Delete</a></td>
                </tr>
            </table>
        </div>
    </div>




@endsection
