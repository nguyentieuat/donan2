@extends('frontend.master')
@section('content')
<!--slider-->
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="beta-products-list">
			<h4>Sản Phẩm Tìm Kiếm</h4>
			<div class="beta-products-details">
				<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
				<div class="clearfix"></div>
			</div>

			<div class="row">
				@foreach($product as $npro)
				<div class="col-sm-3">
					<div class="single-item">
						@if($npro->p_price!=0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						<div class="single-item-header">
							<a href="{{url('product-detail/'.$npro->id)}}"><img src="upload/product/{{$npro->images}}" style="width: 320px; height: 270px" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title" style="font-size: 15px;margin-bottom: 5px;height: 40px">{{$npro->name}}</p>
							<p class="single-item-price" style="font-size: 14px;margin-bottom: 5px;">
								@if($npro->p_price==0)
								<span class="flash-sale">{{number_format($npro->u_price)}}</span>
								@else
								<span class="flash-del">{{number_format($npro->u_price)}}</span>
								<span class="flash-sale">{{number_format($npro->p_price)}}</span>
								@endif
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{{route('addtocart',$npro->id)}}"><i class="fa fa-shopping-cart"></i></a>
							<a class="beta-btn primary" href="{{url('product-detail/'.$npro->id)}}">Details <i class="fa fa-chevron-right"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				@endforeach
		</div> <!-- .beta-products-list -->

		<div class="space50">&nbsp;</div>

		<div class="beta-products-list">
			<h4>Sản Phẩm Khuyến Mại</h4>
			<div class="beta-products-details">
				<!-- <p class="pull-left">Tìm thấy {{count($product_p)}} sản phẩm</p> -->
				<div class="clearfix"></div>
			</div>
			<div class="row">
				@foreach($product_p as $prop)
				<div class="col-sm-3">
					<div class="single-item">
						@if($prop->p_price!=0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						<div class="single-item-header">
							<a href="{{url('product-detail/'.$prop->id)}}"><img src="upload/product/{{$prop->images}}" style="width: 320px; height: 270px" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title" style="font-size: 15px;margin-bottom: 5px;height: 40px">{{$prop->name}}</p>
							<p class="single-item-price" style="font-size: 14px;margin-bottom: 5px;">
								<span>{{$prop->u_price}}</span>
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{{route('addtocart',$prop->id)}}"><i class="fa fa-shopping-cart"></i></a>
							<a class="beta-btn primary" href="{{url('product-detail/'.$prop->id)}}">Details <i class="fa fa-chevron-right"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				@endforeach				
			</div>
		</div> <!-- .beta-products-list -->
	</div>
</div> <!-- end section with sidebar and main content -->

</div>
</div> <!-- .main-content -->
</div> <!-- #content -->
@endsection