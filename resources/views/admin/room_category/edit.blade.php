@extends('admin.layouts.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Room
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="EditRoom/{{ $room__categories->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label>Room type name </label>
                            <input class="form-control" name="name" value="{{ $room__categories->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Image </label>
                            <input type="file" class="form-control" name="image" value="{{ $room__categories->image }}" />
                        </div>

                        <div class="form-group">
                            <label>Price </label>
                            <input class="form-control" name="price" value="{{ $room__categories->price }}" />
                        </div>

                        <div class="form-group">
                            <label>Describe </label>
                            <input class="form-control" name="description" value="{{ $room__categories->description }}" />
                        </div>
                        {{-- @endforeach --}}


                        <button type="submit" class="btn btn-default">Edit </button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
