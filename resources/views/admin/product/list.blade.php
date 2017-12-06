@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th width="2%">ID</th>
                                <th >Name</th>
                                <th >U_Price</th>
                                <th >Status</th>
                                <th >Quatity</th>
                                <th >View</th>
                                <th >Sold</th>
                                <th width="4%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $pro)
                            <tr class="odd gradeX" align="left">
                                <td>{{$pro->id}}</td>
                                <td><a href="admin/product/edit/{{$pro->id}}"><img width="100px" src="upload/product/{{$pro->images}}"/><p>{{$pro->name}}</p></a></td>
                                <td><p>Unit:{{number_format($pro->u_price)}}</p>
                                    <p>Pro:{{number_format($pro->p_price)}}</p></td>
                                <td>{{$pro->status}}</td>
                                <td>{{$pro->qty}}</td>
                                <td>{{$pro->view}}</td>
                                <td>{{$pro->sold}}</td>
                                <td class="center"><p><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pro->id}}">Edit</a></p> <p><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/del/{{$pro->id}}"> Del</a></p></td>
                                
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