@extends('frontend.master')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
	    <div class="banner" >
				<ul>
					@foreach($slide as $sl)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
		            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="upload/slide/{{$sl->image}}" data-src="upload/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('upload/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
									</div>
								</div>

		        </li>
				@endforeach
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="beta-products-list">
			<h4>New Products</h4>
			<div class="beta-products-details">
				<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
				<div class="clearfix"></div>
			</div>

			<div class="row">
				@foreach($new_product as $npro)
				<div class="col-sm-3">
					<div class="single-item">
						@if($npro->p_price!=0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						<div class="single-item-header">
							<a href="{{url('product-detail/'.$npro->id)}}"><img src="upload/product/{{$npro->images}}" style="width: 270px; height: 320px" alt=""></a>
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
							<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
							<a class="beta-btn primary" href="{{url('product-detail/'.$npro->id)}}">Details <i class="fa fa-chevron-right"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				@endforeach
		</div> <!-- .beta-products-list -->

		<div class="space50">&nbsp;</div>

		<div class="beta-products-list">
			<h4>Top Products Sale</h4>
			<div class="beta-products-details">
				<p class="pull-left">Tìm thấy {{count($product_p)}} sản phẩm</p>
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
							<a href="{{url('product-detail/'.$prop->id)}}"><img src="upload/product/{{$prop->images}}" style="width: 270px; height: 320px" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title" style="font-size: 15px;margin-bottom: 5px;height: 40px">{{$prop->name}}</p>
							<p class="single-item-price" style="font-size: 14px;margin-bottom: 5px;">
								<span>{{$prop->u_price}}</span>
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
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


</div> <!-- .main-content -->
</div> <!-- #content -->
@endsection