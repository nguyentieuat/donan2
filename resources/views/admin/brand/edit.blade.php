@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Brand
                            <small>{{$brand->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                      @include('admin.errors.notes')
                        <form action="admin/brand/edit/{{$brand->id}}" method="POST">
                            {{ csrf_field() }}                            
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input class="form-control" name="name" value="{{$brand->name}}" />
                            </div>                                                      
                            <button type="submit" class="btn btn-default">Brand Edit</button>
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