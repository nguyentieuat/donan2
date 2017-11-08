@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
         <!-- customer info -->
    <div class='panel panel-info col-xs-12 col-md-4 order-info'>
        <div class='panel-heading'>
            <h3 class='panel-title'>Customer</h3>
        </div>

        <div class='panel-body'>
            <div>
                <span>Name</span>
                <span class='right'>{!! $cus->name !!}</span>
            </div>

            <div>
                <span>Phone</span>
                <span class='right'>{!! $cus->phone !!}</span>
            </div>

            <div>
                <span>Mail</span>
                <span class='right'>{!! $cus->email !!}</span>
            </div>

            <div>
                <span>Gender</span>
                <span class='right'>{!! $cus->s_gender !!}</span>
            </div>
        </div>
    </div>

    <div class='panel panel-info col-xs-12 col-md-7 col-md-offset-1 order-info'>
        <div class='panel-heading'>
            <h3 class='panel-title'>Bill Detail</h3>
        </div>

        <div class='panel-body'>
            <div>
                <span>Created</span>
                <span class='right'>{!! $order->created_at !!}</span>
            </div>

            <div>
                <span>Total</span>
                <span class='right'>{!! $order->total !!} VNĐ</span>
            </div>

            <div>
                <span>Status</span>
                <span class='right'>{!! $order->s_status !!}</span>
            </div>

            <div>
                <span>Note</span>
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
                        <td><img src='{{url('uploads/product/'.explode(',', $item->product->images)[0])}}'></td>
                        <td>{{$item->product->unit_price}} VNĐ</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->total}} VNĐ</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan='5' style='text-align: right'>Số tiền phải thanh toán : </td>
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

@endsection