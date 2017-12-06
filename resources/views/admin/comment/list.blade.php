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
                                <th>Action</th>
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
                                <td class="center">

                                    <form method="post" action="{{route('update_comment', $com->id)}}">
                                         {{ csrf_field() }} 
                                        <input type="hidden" name="status" value="1">

                                        <input  type="submit" value="accept" style="width: 55px; height: 25px; background-color: #176de8">
                                    </form>
                                    <form method="post" action="{{route('update_comment', $com->id)}}">
                                         {{ csrf_field() }} 
                                        <input type="hidden" name="status" value="2">

                                        <input type="submit" value="deny" style="width: 55px; height: 25px; background-color: red">
                                    </form>
                                </td>
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