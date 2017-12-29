@extends('frontend.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<div class="space20">&nbsp;</div>
			<h6 class="inner-title">Sản phẩm {{$title->name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{url('index')}}">Home</a> / <span>Sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Danh Sách Sản Phẩm</h4>
						<div class="space20">&nbsp;</div>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($product_type as $npro)
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
							</div>
						<div class="row">{{$product_type->links()}}</div>
					</div> <!-- .beta-products-list -->
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Khác</h4>
						<div class="space20">&nbsp;</div>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($product_other as $npro)
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
							</div>
						<div class="row">{{$product_other->links()}}</div>
					</div>
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
</div> <!-- .container -->
@endsection