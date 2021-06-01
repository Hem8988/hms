@extends('layouts.reser')

@section('content')


    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="page-header">
                        Available Rooms <small></small>
                    </h1>
                </div>
            </div>
            {{-- @php
    dd($count);die;
    @endphp --}}
            <div class="row">
                @foreach ($room as $rooms)
                @endforeach
                <div class="col-xl-12 col-md-12">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Totals No Of
                                        Rooms</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $roomCount }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up">{{ $availableroom }}</i>
                                </span>
                                <span class="text-nowrap">Available no of Room</span>

                            </p>
                        </div>
                    </div>
                </div>
                <h1> List of the available Rooms & Reserved Rooms </h1>
                <table class="table table-bordered table-striped  table-hover table-primary">
                    <thead class="thead-dark">
                        <tr class="row100 head">
                            <!-- <th  class="cell100 column1">Select</th> -->
                            <th class="cell100 column1">Id</th>
                            <th class="cell100 column1">Room Name</th>
                            <th class="cell100 column1">Room Type</th>
                            <th class="cell100 column1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room as $rooms)

                            <tr class="row100 body">
                                <td class="cell100 column1">{{ $rooms->id }}</td>
                                <td class="cell100 column1">{{ $rooms->room_name }}</td>
                                <td class="cell100 column1">{{ $rooms->name }}</td>
                                <td class="cell100 column1">
                                    @if ($rooms->status == 0)
                                        Reserved
                                    @else
                                        Empty
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>


@endsection
