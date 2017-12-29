@extends('frontend.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng kí</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Home</a> / <span>Đăng kí</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{route('signup')}}" method="post" class="beta-form-checkout" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-sm-3"></div>
				@include('admin.errors.notes')
				<div class="col-sm-6">
					<h4>Đăng kí</h4>
					<div class="space20">&nbsp;</div>

					
					<div class="form-block">
						<label for="email">Email address*</label>
						<input type="email" name="email" required>
					</div>

					<div class="form-block">
						<label for="name">Fullname*</label>
						<input type="text" name="name" required>
					</div>
					<div class="form-block">
						<label for="avatar">Avatar</label>
						<input type='file' id="imgInp" name="avatar" />
  						<img id="blah" src="#" width="80px" />
					</div>

					<!-- <div class="form-block">
						<label for="adress">Address*</label>
						<input type="text" name="adress" required>
					</div> -->

					
					<div class="form-block">
						<label for="phone">Phone*</label>
						<input type="text" name="phone" required>
					</div>
					<div class="form-block">
						<label for="password">Password*</label>
						<input type="password" name="pass" required>
					</div>
					<div class="form-block">
						<label for="repassword">Re password*</label>
						<input type="password" name="repass" required>
					</div>
					<div class="form-block">
						{!! Recaptcha::render() !!}
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Register</button>
						<button type="reset" class="btn btn-primary" style="color: black;background-color: white;border-color: black;">Reset</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
			

		</form>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection
@section('script')
<script type="text/javascript">
	function readURL(input) {

		if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		    	var th = document.getElementById('blah');
		    	th.src = reader.result;
		    }

    		reader.readAsDataURL(input.files[0]);
  		}
  	}
$("#imgInp").change(function() {
  readURL(this);
});
</script>
@endsection
