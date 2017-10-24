@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.errors.notes')
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}                            
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" class="form-control" name="avatar"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" value="{{$user->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" />
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="0" checked="" type="radio">Quản trị
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="1" type="radio">Khách
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <label class="radio-inline">
                                    <input name="status" value="0" checked="" type="radio">Active
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1" type="radio">Unactive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection