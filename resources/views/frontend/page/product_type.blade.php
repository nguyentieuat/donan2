@extends('frontend.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$title->name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{url('index)}}">Home</a> / <span>Sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach ($cate as $t)
						<li><a href="{{url('product-type/'.$t->id)}}">{{$t->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Sản phẩm mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product_type)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($product_type as $pro)
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
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('product-detail/'.$pro->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản Phẩm Khác</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product_other)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
						@foreach($product_other as $pro)
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
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('product-detail/'.$pro->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="space40">&nbsp;</div>
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection