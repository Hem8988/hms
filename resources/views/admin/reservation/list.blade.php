@extends('admin.layouts.admin')

@section('content')
    @php
    // dd($reservation);
    @endphp
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reservation
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if (session('annoucement'))
                    <div class="alert alert-success">
                        {{ session('annoucement') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>id</th>
                            <th>title</th>
                            <th>fname</th>
                            <th>lname</th>
                            <th>email</th>
                            <th>View Details</th>
                            {{-- <th>country</th>
                            <th>state</th>
                            <th>city</th>
                            <th>phone</th>
                            <th>Type of Room </th>
                            <th>Bed</th>
                            <th>No of Room</th>
                            <th>Meal</th>
                            <th>Check in</th>
                            <th>Check out</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservation as $r)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->title }}</td>
                                <td>{{ $r->fname }}</td>
                                <td>{{ $r->lname }}</td>
                                <td>{{ $r->email }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="viewDdetails/{{ $r->id }}"> View details</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
