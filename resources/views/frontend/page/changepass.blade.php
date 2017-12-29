@extends('frontend.master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đổi mật khẩu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đổi mật khẩu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('changePass',$user->id)}}" method="post" class="beta-form-checkout">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-3"></div>
					@include('admin.errors.notes')
					<div class="col-sm-6">
						<h4>{{$user->email}}</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">New Password*</label>
							<input type="password" name="newpassword" required>
						</div>
						<div class="form-block">
							<label for="phone">Re-New Password*</label>
							<input type="password" name="renewpassword" required>
						</div>
						<div class="form-block">
						<button type="submit" class="btn btn-primary" style="width: 70px">Save</button>
						<button type="reset" class="btn btn-primary" style="color: black;background-color: red;border-color: black;"><a href="{{route('index')}}">Cancle</a> <button>
					</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection