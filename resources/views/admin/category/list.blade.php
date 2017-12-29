@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
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
                                <th>Category Parent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cate)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $cate->id }}</td>
                                <td>{{ $cate->name }}</td>
                                @if ($cate->parentId)

                                    <td>{{ $cate->child->name }}</td>
                                @else
                                    <td>{{ $cate->parentId }}</td>
                                @endif
                                <td class="center"><p><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$cate->id}}">Edit</a></p>
                                    <p><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/del/{{$cate->id}}"> Delete</a></p></td>
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