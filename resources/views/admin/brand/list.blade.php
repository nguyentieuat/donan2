@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Brand
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brand as $br)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $br->id }}</td>
                                <td>{{ $br->name }}</td>                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/brand/edit/{{$br->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/brand/del/{{$br->id}}"> Delete</a></td>
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