<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

</head>

<body>

    <div id="wrapper">
 <!-- Page Content -->
         <!-- customer info -->
    <div class='panel panel-info col-xs-12 col-md-4 order-info1'>
        <div class='panel-heading1'>
            <h3 class='panel-title1'>Customer</h3>
        </div>

        <div class='panel-body1'>
            <div>
                <span>Name:</span>
                <span class='right'>{!! $cus->name !!}</span>
            </div>

            <div>
                <span>Phone:</span>
                <span class='right1'>{!! $cus->phone !!}</span>
            </div>

            <div>
                <span>Mail:</span>
                <span class='right1'>{!! $cus->email !!}</span>
            </div>

            <div>
                <span>Gender:</span>
                <span class='right1'>{!! $cus->gender !!}</span>
            </div>

            <div>
                <span>Mail:</span>
                <span class='right1'>{!! $cus->address !!}</span>
            </div>
        </div>
    </div>

    <div class='panel panel-info col-xs-12 col-md-7 col-md-offset-1 order-info'>
        <div class='panel-heading'>
            <h3 class='panel-title'>Bill Detail</h3>
        </div>

        <div class='panel-body'>
            <div>
                <span>Created:</span>
                <span class='right'>{!! $order->created_at !!}</span>
            </div>

            <div>
                <span>Total:</span>
                <span class='right'>{!! $order->total !!} VNĐ</span>
            </div>

            <div>
                <span>Status:</span>
                <span class='right'>{!! $order->s_status !!}</span>
            </div>

            <div>
                <span>Note:</span>
                <span class='right'>{!! $order->note !!}</span>
            </div>
        </div>
    </div>

    <div id='detail-info' class='panel panel-info' style='clear:both;'>
        <div class='panel-heading'>
            <h3 class='panel-title'>Product</h3>
        </div>

        <div class='panel-body table-responsive'>
            <table class='table table-hover table-striped'>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                </thead>

                <tbody>

                @foreach($detail as $item)
                    <tr>
                        <td>{{$item->product->id}}</td>
                        <td>{{$item->product->name}}</td>
                        <td><img width="250px" src='{{url('upload/product/'.explode(',', $item->product->images)[0])}}'></td>
                        <td>@if(($item->product->p_price)!=0)
                            {{$item->product->p_price}} @else {{$item->product->u_price}} @endif VNĐ</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->total}} VNĐ</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan='5' style='text-align: right'>Số tiền phải thanh toán: </td>
                    <td>{{$total}} VNĐ</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <a href='{!! url('admin/bill/list') !!}' class='btn btn-warning'>Quay lại</a>
    </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    @yield('script')
</body>

</html>
