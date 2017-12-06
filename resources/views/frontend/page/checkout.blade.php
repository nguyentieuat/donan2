@extends('frontend.master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('checkout')}}" method="post" class="beta-form-checkout">
				{{ csrf_field() }}
				<div class="row">
					@include('admin.errors.notes')
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="name">Họ tên*</label>
							@if(Auth::check())
							<input type="text" id="name" name="name" value="{{Auth::user()->name}}" required>
							@else
							<input type="text" id="name" name="name" placeholder="Họ tên" required>
							@endif
						</div>
						<div class="form-block">
							<label for="gender">Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span >Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nu" style="width: 10%"><span>Nữ</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="khac" style="width: 10%"><span>Khác</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							@if(Auth::check())
							<input type="email" id="email" name="email" required value="{{Auth::user()->email}}" >
							@else
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
							@endif
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<!-- @if(Auth::check())
							<input type="text" id="adress" name="address" value="Auth::user()->address" required>
							@else  -->
							<input type="text" id="adress" name="address" placeholder="Street Address" required>
							<!-- @endif -->
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							@if(Auth::check())
							<input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
							@else
							<input type="text" id="phone" name="phone" required>
							@endif
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
                                        @foreach($product_cart as $cart)
										<div class="media">
											<img width="25%" height="90px" src="upload/product/{{$cart['item']['images']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Số Lượng: <input style="width: 40px;height: 25px;text-align: center; margin-top: 15px;" type="number" name="so_luong" value="{{$cart['qty']}}"></span>
												<!-- <span class="color-gray your-order-info">Số Lượng: <input style="width: 40px;height: 25px;text-align: center" type="number" name="so_luong" value="{{$cart['qty']}}"></span> -->
												<span class="color-gray your-order-info" style="margin-top: 10px">Đơn Giá: {{number_format($cart['price'])}}</span>
											</div>
										</div>
										@endforeach
                                    
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ number_format( Session('cart')->totalPrice) }}</div>
									<div class="clearfix"></div>
								</div>
								@endif
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" name="payment">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" name="payment">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button class="beta-btn primary" href="{{route('checkout')}}">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';
				
// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
