@extends('admin.layouts.admin')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Room
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

                    <form action="{{ url('addrRoom') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label>Room name </label>
                            <input class="form-control" name="room_name" />
                        </div>
                        {{-- @php dd($categoryRoom); @endphp --}}
                        <div class="form-group">
                            <label>Kind of room</label>
                            <select class="form-control" name="idCategory">
                                <label>Status</label>
                                @foreach ($categoryRoom as $cr)
                                    <option value="{{ $cr->id }}"> {{ $cr->name }}</option>
                                @endforeach
                        
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <label>Status</label>
                                <option value="1"> Empty</option>
                                <option value="0"> Reserved</option>

                            </select>
                        </div>



                        <button type="submit" class="btn btn-default">Add </button>
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
