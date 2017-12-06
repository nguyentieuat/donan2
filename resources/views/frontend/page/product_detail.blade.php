@extends('frontend.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Product {{$product->name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('index')}}">Home</a> / <span>Product Detail</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">						
						<img src="upload/product/{{$product->images}}" style="width: 320px; height: 270px" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title" style="font-size: 15px;margin-bottom: 5px;height: 40px">{{$product->name}}</p><div class="clearfix"></div>
							<p class="single-item-price" style="font-size: 14px;margin-bottom: 5px;">
								@if($product->p_price==0)
											<span class="flash-sale">{{number_format($product->u_price)}}</span>
											@else
											<span class="flash-del">{{number_format($product->u_price)}}</span>
											<span class="flash-sale">{{number_format($product->p_price)}}</span>
											@endif
							</p>
						</div>

						<!-- <div class="clearfix"></div> -->
						<!-- <div class="space20">&nbsp;</div> -->

						<!-- <div class="single-item-desc">
							<p>{{$product->description}}</p>
						</div>
						<div class="space20">&nbsp;</div> -->
						 <div class="rateit" data-rateit-readonly="true" data-rateit-value="4.0" data-rateit-step="0.1"></div>
        <p>{{number_format(4,1)}} Star rating | 5 Reviews</p>
						<p style="margin-top: 5px;  margin-bottom: 5px;"><span >Kích Thước:</span> {{$product->size}}</p>
						<p style="margin-top: 5px;  margin-bottom: 5px;"><span >Vật Liệu:</span> {{$product->main_material}}</p>
						<p style="margin-top: 5px;  margin-bottom: 5px;"><span>Bảo Hành:</span> {{$product->guarentee}}</p>
						<p style="margin-top: 5px;  margin-bottom: 5px;"><span>Xuất xứ:</span> {{$product->brand->name}}</p>
						<p style="margin-top: 5px;  margin-bottom: 5px;"><span>Trạng thái:</span> @if($product->qty==0) Hết hàng @else Còn Hàng @endif</p>
						<p><span>Options:</span>
							<!-- <select class="wc-select" name="size">
								<option>Size</option>
								<option value="XS">XS</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
							</select>
							<select class="wc-select" name="color">
								<option>Color</option>
								<option value="Red">Red</option>
								<option value="Green">Green</option>
								<option value="Yellow">Yellow</option>
								<option value="Black">Black</option>
								<option value="White">White</option>
							</select> -->
							<select class="wc-select" name="color" >
								<option>Qty</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<a class="add-to-cart" href="{{route('addtocart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</p>
					<!-- 	<div class="single-item-options">
							<select class="wc-select" name="size">
								<option>Size</option>
								<option value="XS">XS</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
							</select>
							<select class="wc-select" name="color">
								<option>Color</option>
								<option value="Red">Red</option>
								<option value="Green">Green</option>
								<option value="Yellow">Yellow</option>
								<option value="Black">Black</option>
								<option value="White">White</option>
							</select>
							<select class="wc-select" name="color" >
								<option>Qty</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div> -->
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Description</a></li>
						<li><a href="#tab-reviews">Reviews (0)</a></li>
					</ul>

					<div class="panel" id="tab-description">
						{!! $product->description !!}
					</div>
					<div class="panel" id="tab-reviews">
						<p>No Reviews</p>
						 
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Related Products</h4>

					<div class="row">
						@foreach($product_same as $pro)
						<div class="col-sm-4">
							<div class="single-item">
								@if($pro->p_price!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
								<div class="single-item-header">
									<a href="{{url('product-detail/'.$pro->id)}}"><img src="upload/product/{{$pro->images}}" style="width: 270px; height: 320px" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title" style="font-size: 15px;margin-bottom: 5px;height: 40px">{{$pro->name}}</p>
									<p class="single-item-price" style="font-size: 14px;margin-bottom: 5px;">
										@if($pro->p_price==0)
											<span class="flash-sale">{{number_format($pro->u_price)}}</span>
											@else
											<span class="flash-del">{{number_format($pro->u_price)}}</span>
											<span class="flash-sale">{{number_format($pro->p_price)}}</span>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="{{route('addtocart',$pro->id)}}"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($product_sell as $pro)
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{url('product-detail/'.$pro->id)}}"><img src="upload/product/{{$pro->images}}" style="width: 58px; height: 56px" alt=""></a>
								<div class="media-body">
									<p class="single-item-title" style="font-size: 12px;margin-bottom: 5px;height: 20px">{{$pro->name}}</p>
									<p class="single-item-price" style="font-size: 11px;margin-top:20px;">
										@if($pro->p_price==0)
											<span class="flash-sale">{{number_format($pro->u_price)}}</span>
											@else
											<span class="flash-del">{{number_format($pro->u_price)}}</span>
											<span class="flash-sale">{{number_format($pro->p_price)}}</span>
										@endif
									</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($product_new as $pro)
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{url('product-detail/'.$pro->id)}}"><img src="upload/product/{{$pro->images}}" style="width: 58px; height: 56px" alt=""></a>
								<div class="media-body">
									<p class="single-item-title" style="font-size: 12px;margin-bottom: 5px;height: 20px">{{$pro->name}}</p>
									<p class="single-item-price" style="font-size: 11px;margin-top:20px;">
										@if($pro->p_price==0)
											<span class="flash-sale">{{number_format($pro->u_price)}}</span>
											@else
											<span class="flash-del">{{number_format($pro->u_price)}}</span>
											<span class="flash-sale">{{number_format($pro->p_price)}}</span>
										@endif
									</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection