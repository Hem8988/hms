@extends('admin.layouts.admin')

@section('content')
<?php
use App\Http\Controllers\RoomCategoryController;
$categories = RoomCategoryController::Allroom();
?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Room
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
                            <th>ID</th>
                            <th>Room name</th>
                            <th>Kind of room</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // foreach ($room as $r) {
                            //     foreach ($categories as $value) {
                            //         if ($value->id == $r->idCategory) {
                            //             echo $value->name;
                            //         }
                            //     }
                            // }
                        @endphp

                        {{-- {{ $value->id }} --}}
                        @foreach ($room as $r)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->room_name }}</td>
                                <td>
                                    @foreach ($categories as $value)
                                        @if ($value->id == $r->idCategory)
                                            {{ $value->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if ($r->Status == 1) {{ 'Empty' }}
                                    @else {{ 'Reserved' }}
                                    @endif
                                </td>

                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="edit/room/{{ $r->id }}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="deleteRoom/{{ $r->id }}"
                                        onclick="return confirm('Are you sure you want to delete?');"> Delete</a></td>

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
