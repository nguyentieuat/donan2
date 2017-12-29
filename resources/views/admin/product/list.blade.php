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
                        <p>Tổng số sản phẩm: {{count($product)}}</p>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th >ID</th>
                                <th >Name</th>
                                <th >U_Price</th>
                                <th >Status</th>
                                <th >View/Sold</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td><a href="admin/product/edit/{{$pro->id}}"><img width="200px" src="upload/product/{{$pro->images}}"/><p>{{$pro->name}}</p></a></td>
                                <td><p>Unit:{{number_format($pro->u_price)}}</p>
                                    <p>Pro:{{number_format($pro->p_price)}}</p></td>
                                <td><p>@if($pro->status=1) Mới @elseif($pro->status=2) Cũ @elseif($pro->status=3) Khác @endif </p>
                                    <p>@if($pro->qty==0) Hết hàng @elseif($pro->qty!=0) Còn hàng @endif </p> ({{$pro->qty}})
                                </td>
                                <td><p>Lượt xem: {{$pro->view}}</p>
                                    <p>Lượt mua: {{$pro->sold}}</p>
                                </td>
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