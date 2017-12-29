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
                    <h2>Order new</h2>
                    <p>Tổng số order mới: {{$count_new}}</p>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Custermer</th>
                                <th>Product</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill_new as $bill)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bill->id}}</td>
                                <td><a href="{{route('detail', $bill->id)}}">{{$bill->customer->name}}</a></td>
                                <td><a href="{{route('detail', $bill->id)}}"> @foreach($bill->billDetail as $b) <p>{{$b->product->name}} @endforeach</p></a></td>
                                <td>{{$bill->customer->address}}</td>
                                <td>{{number_format($bill->total)}}</td>
                                <td>{{$bill->payment}}</td>
                                <td>{{$bill->note}}</td>
                                <td class="center">

                                    <form method="post" action="{{route('update_order', $bill->id)}}">
                                         {{ csrf_field() }} 
                                        <input type="hidden" name="status" value="1">
                                        <input  type="submit" value="accept" style="width: 55px; height: 25px; background-color: #176de8">
                                    </form>
                                    <form method="post" action="{{route('update_order', $bill->id)}}">
                                         {{ csrf_field() }} 
                                        <input type="hidden" name="status" value="2">
                                        <input type="submit" value="deny" style="width: 55px; height: 25px; background-color: red">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$bill_new->links()}}
                </br>
                    <h2>Order accepted</h2>
                    <p>Tổng số order: {{$count_old}}</p>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Custermer</th>
                                <th>Product</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill_accept as $bill)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bill->id}}</td>
                                <td><a href="{{route('detail', $bill->id)}}">{{$bill->customer->name}}</a></td>
                                <td><a href="{{route('detail', $bill->id)}}"> @foreach($bill->billDetail as $b) <p>{{$b->product->name}} @endforeach</p></a></td>                                
                                <td>{{$bill->customer->address}}</td>
                                <td>{{number_format($bill->total)}}</td>
                                <td>{{$bill->payment}}</td>
                                <td>{{$bill->note}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$bill_accept->links()}}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


@endsection