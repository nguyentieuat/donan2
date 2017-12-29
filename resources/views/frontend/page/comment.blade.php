@if($cmt->count() > 0)
@foreach($cmt as $item)
    <div class="row comment-item">
        <span class="col-xs-3 col-md-2">
            <img src="{{asset('upload/images/' . $item->user->avatar)}}"
               style="max-width: 80px">
        </span>
        <div class="col-xs-9 col-md-10">
            <p>
                <b style="color: blue;margin-right: 20px">{{$item->user->name}}</b>
                <input id="input-3" name="input-3" value="{{$item->rate}}" class="input-3 rating-loading" data-size="xs">
                <span class='rating rate-cmt' rate='{{$item->rate}}'></span>
            </p>
            <p>{{$item->content}}</p>
            <p>Ngày viết : {{$item->created_at}}</p>
        </div>
    </div>
@endforeach
@else
<h6>Chưa có bình luận</h6>
@endif
@if(Auth::check())
<form role='form' method="post"  action="{{ route('store-comment') }}">
    <!-- rating start -->
    {{ csrf_field() }}
    <div class='form-group'>
        <label for='rating'>Đánh giá của bạn:</label>
        <input id="input-id"  data-min="0" data-max="5" data-step="1" type="text" value="5">
        <div id="myrate" class='rating rating-small'></div>
        <input type="hidden" id="rate" name="rate" value="5">
    </div>

    <div class='form-group'>
        <label for='cmt-content'>Nhận xét của bạn :</label>
        <textarea name='content' rows='2' id='cmt-content' class='form-control'></textarea>
    </div>
    <div class='form-group' style='text-align: right'>
        <input type='hidden' name='pid' id='inp-pid' value='{{$product->id}}'>
        <input type='hidden' name='uid' id='inp-uid' value='@if(Auth::check()) {{Auth::user()->id}} @endif'>
        <button type='submit' id='btn-rate' class='btn btn-warning'>Gửi đánh giá</button>
    </div>
</form>
@else
Đăng nhập để đánh giá
@endif

<script>
 
</script>