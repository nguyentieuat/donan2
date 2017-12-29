@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customer
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.errors.notes')
                        <form action="admin/customer/edit/{{$customer->id}}" method="POST">
                            {{ csrf_field() }}                            
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$customer->name}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$customer->email}}" />
                            </div>
                            
                            <div class="form-group">                           
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" value="{{$customer->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{$customer->address}}" />
                            </div>
                            <div class="form-block">
                            <label for="gender">Giới tính </label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nam" style="width: 10%"><span >Nam</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nu" style="width: 10%"><span>Nữ</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="khac" style="width: 10%"><span>Khác</span>
                                        
                        </div>                            
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="reset" class="btn btn-default"><a href="admin/customer/list">Cancle</a> </button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection