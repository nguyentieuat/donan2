@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!-- @include('admin.errors.notes') -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}                            
                            <div class="form-group">
                                @if($errors->has('name'))
                            <div class='alert alert-danger'>{{ $errors->first('name') }}</div>
                                @endif
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Name" />
                            </div>
                            
                            <div class="form-group">
                                @if($errors->has('email'))
                            <div class='alert alert-danger'>{{ $errors->first('email') }}</div>
                                @endif
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                            </div>
                            
                            <div class="form-group">
                                @if($errors->has('phone'))
                            <div class='alert alert-danger'>{{ $errors->first('phone') }}</div>
                                @endif
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Please Enter Phone" />
                            </div>
                            <div class="form-group">
                                @if($errors->has('pass'))
                            <div class='alert alert-danger'>{{ $errors->first('pass') }}</div>
                                @endif
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                @if($errors->has('repass'))
                            <div class='alert alert-danger'>{{ $errors->first('repass') }}</div>
                                @endif
                                <label>Re-Password</label>
                                <input type="password" class="form-control" name="repass" placeholder="Please Enter Re-Password"/>
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
                            <button type="submit" class="btn btn-default">User Add</button>
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