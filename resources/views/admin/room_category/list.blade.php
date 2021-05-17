@extends('admin.layouts.admin')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Room
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- @php 
                    dd(AUTH::user()); @endphp --}}
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>ROOM Type </th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room__categories as $r)
                        @php
                            // dd($r);
                        @endphp
                            <tr class="odd gradeX" align="center">
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->name }}</td>
                            <td><img src="{{ asset('images/' . $r->image) }} "  width="150" height="150"></td>
                                <td>{{ $r->price }}</td>
                                <td>{{ $r->description }}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="Edit/{{ $r->id }}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="delete/{{ $r->id }}"
                                        onclick="return confirm('Are you sure you want to delete? ');"> Delete</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        {{-- <!-- /.container-fluid --> --}}
    </div>
    <!-- /#page-wrapper -->

@endsection
