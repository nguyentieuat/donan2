@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr align="center">
                                <th width="10%">ID</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th width="10%">Ordinal</th>
                                <th width="10%">Swap</th>                               
                                <th width="10%">Edit link</th>
                                <th width="10%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $sl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sl->id}}</td>
                                <td><a href=""><img width="250px" src="upload/slide/{{$sl->image}}"/></a></td>
                                <td>{{$sl->link}}</td>
                                <td>{{$sl->ordinal}}</td>
                                <td>
                                    <form action="{{ url('admin/slide/swapSlide') }}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="stt" value="{!! $sl->ordinal !!}" >
                                        <input type="text" name="swap" size="1" 
                                               style="text-align: center;padding:5px;border-radius:5px;border: 1px solid #ccc;">
                                        <input type="submit" name="submit" value="Đổi" class="btn btn-primary">
                                    </form>
                                </td>                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$sl->id}}">Edit link</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/del/{{$sl->id}}"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection