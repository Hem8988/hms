@extends('admin.layouts.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Event
                        <small>Add</small>
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

                    @if (session('annoucement'))
                        <div class="alert alert-success">
                            {{ session('annoucement') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.event.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label>Event Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Event Name" />
                        </div>
                        <div class="form-group">
                            <label>content</label>
                            <input class="form-control" name="body" placeholder="Please Enter Body" />
                        </div>
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" class="form-control" name="image" placeholder="Please Enter Image" />
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
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
