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
                                <th>Title</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $n)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $n->id }}</td>
                                <td>{{ $n->title }}</td> 
                                <td><img width="200px" src="upload/news/{{$n->image}}"></td>                               
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$n->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/del/{{$n->id}}"> Delete</a></td>
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