@extends('admin.layouts.admin')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Food
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                         @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                             @foreach ($errors->all() as $err) 
                                {{$err}} <br>
                            @endforeach
                        </div>
                        @endif

                        @if (session('annoucement'))
                        <div class="alert alert-success">
                            {{session('annoucement')}}
                        </div>
                        @endif

                        <form action="{{ url('Add/food') }}" method="POST">
                             @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-group">
                                <label>The name of food</label>
                                <input class="form-control" name="food_name" placeholder="Please Enter Food name  Name" />
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <input class="form-control" name="description" placeholder="Please Enter description" />
                            </div>
                            <div class="form-group">
                                <label>
                                    Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter Price" />
                            </div>
                            <div class="form-group">
                                <label>Type of dish</label>
                                <select class="form-control" name="idCategory">
                                    <label>Thể loại</label>
                                    @foreach ($categoryFood as $cf)
                                    <option value selected> Select Category of Food </option>
                                    <option value="{{$cf->id}}"> {{$cf->name}}</option>
                                    @endforeach
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