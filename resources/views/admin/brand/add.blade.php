@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Brand
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                      <!--   @include('admin.errors.notes') -->

                        <form action="admin/brand/add" method="POST">
                            {{ csrf_field() }}                            
                            <div class="form-group">
                                @if($errors->has('name'))
                                    <div class='alert alert-danger'>{{ $errors->first('name') }}</div>
                                @endif
                                <label>Brand Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                            </div>                                                  
                            <button type="submit" class="btn btn-default">Brand Add</button>
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