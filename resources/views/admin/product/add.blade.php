@extends('admin.layout.index')

@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
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
                                    <option >Category Parent</option>
                                    @foreach($categoryP as $cateP)
                                    <option value="{{$cateP->id}}">{{$cateP->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category" id="category">
                                    <!-- <option value="">Category</option> -->
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand Name</label>
                                <select class="form-control" name="brand" id="brand">
                                    <!-- <option value="">Category</option> -->
                                    @foreach($brand as $br)
                                    <option value="{{$br->id}}">{{$br->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label>U_Price</label>
                                <input type="number" class="form-control" name="u_price" placeholder="Giá sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>P_Price</label>
                                <input type="number" class="form-control" name="p_price" placeholder="Giá khuyến mại" />
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input class="form-control" name="size" placeholder="Dài x Rộng x Cao" />
                            </div>
                            <div class="form-group">
                                <label>Main Material</label>
                                <input class="form-control" name="main_material" placeholder="Vật liệu chính" />
                            </div>
                            <div class="form-group">
                                <label>Guarentee</label>
                                <input class="form-control" name="guarentee" placeholder="Bảo hành" />
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date"/>
                            </div>                              
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="qty" placeholder="Số lượng" />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name='status' class='form-control'>
                                        <option value='1'>Mới</option>
                                        <option value='2'>Cũ</option>
                                        <option value='3'>Khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cid="demo" class="ckeditor" name="description"></textarea>
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
