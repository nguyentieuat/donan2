@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customer
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $cu)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cu->id}}</td>
                                <td>{{$cu->name}}</td>
                                <td>{{$cu->email}}</td>
                                <td>{{$cu->phone}}</td>
                                <td>{{$cu->address}}</td>
                                <td>{{$cu->gender}}</td>
                                <td class="center"><p><i class="fa fa-trash-o fa-fw"></i><a href="admin/customer/del/{{$cu->id}}"> Del</a></p>
                                <p><i class="fa fa-pencil fa-fw"></i> <a href="admin/customer/edit/{{$cu->id}}">Edit</a></p></td>
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