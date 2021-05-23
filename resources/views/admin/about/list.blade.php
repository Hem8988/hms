@extends('admin.layouts.admin')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">About
                        <small>Paradise Resort</small>
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
                            <th>Description content</th>
                            <th>Image</th>
                            <th>Video</th>


                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($about as $inf)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $inf->body }}</td>
                                <td> <img style="max-width: 200px;max-height: 200px;"
                                        src="{{ asset('home/images/' . $inf->image) }}"> </td>
                                <td>{{ $inf->video }}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="Aboutedit">Edit</a></td>
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
