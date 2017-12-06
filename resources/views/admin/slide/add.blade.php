@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       @include('admin.errors.notes')
                        <form action="admin/slide/add" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" />
                            </div>
                            <!-- <div class="form-group">
                                <label>Ordinal</label>
                                <input type="number" class="form-control" name="ordinal"/>
                            </div> -->
                            <button type="submit" class="btn btn-default">Slide Add</button>
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