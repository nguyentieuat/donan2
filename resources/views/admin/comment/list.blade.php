@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Product</th>
                                <th>User</th>
                                <th>Content</th>
                                <th>Rate</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comment as $com)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $com->id }}</td>
                                <td>{{ $com->product->name }}</td>
                                <td>{{ $com->user->name}}</td>
                                <td>{{ $com->content }}</td>
                                <td>{{ $com->rate }}</td>
                                <td>{{ $com->status }}</td>            
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/del/{{$com->id}}"> Delete</a></td>
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