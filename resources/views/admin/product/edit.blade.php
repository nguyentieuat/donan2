@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.errors.notes')
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="" id="parent">
                                    <option >{{$product->category->child->name}}</option>
                                    @foreach($categoryP as $cateP)
                                    <option value="{{$cateP->id}}">{{$cateP->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="{{$product->cid}}">{{$product->category->name}}</option>
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand Name</label>
                                <select class="form-control" name="brand" id="brand">
                                    <option value="{{$product->bid}}">{{$product->brand->name}}</option>
                                    @foreach($brand as $br)
                                    <option value="{{$br->id}}">{{$br->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <div><input type="text" class="form-control" name="name" value="{{$product->name}}" /></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label>U_Price</label>
                                <input type="number" class="form-control" name="u_price" value="{{$product->u_price}}" />
                            </div>
                            <div class="form-group">
                                <label>P_Price</label>
                                <input type="number" class="form-control" name="p_price" value="{{$product->p_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input class="form-control" name="size" value="{{$product->size}}" />
                            </div>
                            <div class="form-group">
                                <label>Main Material</label>
                                <input class="form-control" name="main_material" value="{{$product->main_material}}" />
                            </div>
                            <div class="form-group">
                                <label>Guarentee</label>
                                <input class="form-control" name="guarentee" value="{{$product->guarentee}}" />
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date" value="{{$product->date}}"/>
                            </div>                              
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="qty" value="{{$product->qty}}" />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="number" class="form-control" name="status" value="{{$product->status}}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cid="demo" class="ckeditor" name="description">{{$product->description}}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Image List</label>
                                <input type="file" class="form-control" name="image_list[]" multiple/>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.errors.notes')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th width="2%">ID</th>
                                <th >User</th>
                                <th >Content</th>
                                <th >Rate</th>
                                <th >Status</th>
                                <th >Create at</th>
                                <th width="4%">Del</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->comment as $cm)
                            <tr class="odd gradeX" align="left">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}</td>
                                <td>{{$cm->content}}</td>                                
                                <td>{{$cm->rate}}</td>
                                <td>{{$cm->status}}</td>
                                <td>{{$cm->create_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/del/{{$cm->id}}/{{$cm->pid}}"> Del</a>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection

@section('script')
<script >
    $(document).ready(function(){
        $('#parent').change(function(){
            var parentId = $(this).val();
            $.get("admin/ajax/category/"+parentId,function(data){
                $("#category").html(data);
            });
        });
    });
</script>
@endsection
