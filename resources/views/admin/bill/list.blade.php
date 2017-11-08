@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Custermer</th>
                                <th>Total</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $bill)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bill->id}}</td>
                                <td>{{$bill->customer->name}}</td>
                                <td>{{$bill->total}}</td>
                                <td>{{$bill->note}}</td>
                                <td>{{$bill->status}}</td>
                                <td class="center"><i class="glyphicon glyphicon-eye-open"></i><a href="admin/bill/detail/{{$bill->id}}"> Detail</a></td>
                                <td class="center"><i class="glyphicon glyphicon-edit"></i> <a href="admin/bill/edit/{{$bill->id}}">Edit</a></td>
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