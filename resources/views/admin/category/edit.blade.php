@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>{{$cat->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                      @include('admin.errors.notes')
                        <form action="admin/category/edit/{{$cat->id}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="parentId">
                                    <option>Không có</option>
                                    @foreach($list as $row)
                                    <option value='{!! $row->id !!}'
                                    @if(old('parentId'))
                                        @if(old('parentId') == $row->id)
                                            selected
                                        @endif
                                    @elseif ($cat->parentId == $row->id)
                                        selected
                                    @endif>
                                    {!! $row->name !!}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" value="{{$cat->name}}" />
                            </div>                                                      
                            <button type="submit" class="btn btn-default">Category Edit</button>
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