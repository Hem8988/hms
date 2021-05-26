@extends('layouts.reser')


@section('content')
{{-- @if (!empty($Auth::user()))
    
@else
    
@endif --}}
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Your Reservation
                        Information
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
                            {{-- <th>id</th> --}}
                            <th>title</th>
                            <th>fname</th>
                            <th>lname</th>
                            <th>email</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($information as $r)
                            <tr class="odd gradeX" align="center">
                                {{-- <td>{{ $r->id }}</td> --}}
                                <td>{{ $r->title }}</td>
                                <td>{{ $r->fname }}</td>
                                <td>{{ $r->lname }}</td>
                                <td>{{ $r->email }}</td>
                                <td class="center"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <a href="information/{{ $r->id }}"> View details</a>
                                </td>

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
