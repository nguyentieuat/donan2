@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.errors.notes')

                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group">                               
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Please Enter Title" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea cid="demo" class="ckeditor" name="content"></textarea>
                            </div>                                                  
                            <button type="submit" class="btn btn-default">News Add</button>
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