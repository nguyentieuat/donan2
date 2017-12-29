<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Slide;
use App\Product;
use App\Category;
use App\Comment;
use App\Brand;
use App\Cart;
use App\Customer;
use App\User;
use App\Bills;
use App\BillDetail;
use Session;
use Illuminate\Support\Facades\Auth;
use File;
class PageController extends Controller
{
    public function getIndex(){        
        $slide = Slide::orderBy('ordinal')->get();
        $new_product = Product::where('status',1)->paginate(4);
        $product_p = Product::where('p_price','<>',0)->paginate(8);
        return view('frontend.page.home',compact('slide','new_product','product_p','old'));
    }
    public function getProductType($type){
        if (Product::where('cid',$type)) {
             // $slide = Slide::orderBy('ordinal')->get();
            $product_type = Product::where('cid',$type)->paginate(8);
            $title = Category::where('id',$type)->first();
            $product_other = Product::where('cid','<>',$type)->paginate(4);
            $cate = Category::where('parentId',null)->get();
            return view('frontend.page.product_type',compact('title','product_type','product_other','cate'));
        } else {
            return redirect('index');
        }
    }
    public function getProductDetail(Request $req){
        $product=Product::where('id',$req->id)->first();        
        $product_same=Product::where('cid',$product->cid)->where('id','<>',$product->id)->paginate(4);
        $product_new=Product::where('status',1)->inRandomOrder()->paginate(4);
        $cmt = Comment::where('pid',$product->id)->where('status',1)->get();
        $product_sell=Product::orderBy('sold','desc')->paginate(5);
        return view('frontend.page.product_detail',compact('product','product_same','product_new','product_sell','cmt'));
    }
    public function getAddtoCart(Request $req, $id){
        if (Product::find($id)) {
            $product = Product::find($id);
            $oldCart = Session('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            if ($req->qty && $req->qty != 'Qty') {
                for($i = 1 ; $i<= $req->qty; $i++){
                    $cart->addCart($product, $id);
                }    
            } else {
                $cart->addCart($product, $id);
            }
            $req->session()->put('cart',$cart);
            return redirect()->back();
        } else {
            return redirect('index');
        }
         
    }
    public function getDelCart( $id){
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function reduceByOne( $id){
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }    
    public function addOne($id){
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addOne($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function getCheckout(){
        if (Session('cart')) {
            if (!Auth::check()) {
            return view('frontend.page.logcheckout');
        } else {
            $customer = Customer::where('uid',Auth::user()->id)->first();
            return view('frontend.page.checkout',compact('customer'));
        }
        } else {
            return redirect('index');
        }
    }

    public function getSignup(){
        return view('frontend.page.signup');
    }
    public function postSignup(AddUserRequest $req){
        $user = new User();
        $user->email = $req->email;
        $user->name = $req->name;
        // $user->address = $req->address;
        if (isset($req->avatar)) {
            $file = $req->avatar;
            $nameI=$file->getClientOriginalName();
            $nameImg=str_random(6)."_".$nameI;
            while(file_exists("upload/user".$nameImg)){
                $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/user",$nameImg);
            $user->avatar = $nameImg;
        } else {
            $user->avatar = null;
        }
        $user->phone = $req->phone;
        $user->password = bcrypt($req->pass);
        $user->level = 1;
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success','Đăng kí thành công');
    }
    public function getLogin(){
        return view('frontend.page.login');
    }
    public function postLogin(LoginRequest $req){
        $user=User::where('email',$req->email)->get();
        foreach ($user as $user) {
            if($user->level==1 || $user->level==0 && $user->status==1){
                 $credentials = array('email' => $req->email, 'password'=>$req->password );
                if (Auth::attempt($credentials)) {
                    return redirect()->back()->with('success','Đăng nhập thành công');
                } else{
                    return redirect()->back()->with('err','Đăng nhập thất bại');
                }
            } else{
                return redirect()->back()->with('err','Đăng nhập thất bại');
            }
        }
     
    }
    public function logCheckout(LoginRequest $req){
        dd($req->password);
        $credentials = array('email' => $req->email, 'password'=>$req->password );
        if (Auth::attempt($credentials)) {
            $customer = Customer::where('uid',Auth::user()->id)->first();
            return view('frontend.page.checkout',compact('customer'));
        } else{
            return redirect()->back()->with('err','Đăng nhập thất bại');
        }
        
    }
    public function getUpdate($id){
        $user = User::find($id);
        return view('frontend.page.update',compact('user'));
    }
    public function getChangePass($id){
        $user = User::find($id);
        return view('frontend.page.changepass',compact('user'));
    }
    public function ChangePass(Request $req, $id){
        $this->validate($req,
            
            ['password'   => 'required|min:8|max:16',
            'newpassword' => 'required|min:8|max:16',
            'renewpassword' => 'required|same:newpassword',
            ],[
            'password.required'   => 'Mật khẩu không được bỏ trống',
            'password.min'        => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'password.max'        => 'Mật khẩu chỉ được phép tối đa 16 ký tự',
            'newpassword.required'   => 'Mật khẩu không được bỏ trống',
            'newpassword.min'        => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'newpassword.max'        => 'Mật khẩu chỉ được phép tối đa 16 ký tự',
            'renewpassword.required' => 'Hãy nhập lại mật khẩu',
            'renewpassword.same'     => 'Mật khẩu nhập lại không khớp',
            ]
            );
        $user = User::find($id);
        if (!Auth::attempt(['email' => $user->email, 'password' => $req->password])) {
            return redirect()->back()->with('err','Mật khẩu không chính xác');
        }else {         
        
        $user->update([
                'password' => $req->newpassword
            ]);
        return redirect()->back()->with('success','Cập nhật thành công');
        }           
    }

    public function postUpdate(UpdateUserRequest $req,$id){
        $user = User::find($id);

        if (!Auth::attempt(['email' => $user->email, 'password' => $req->pass])) {
            return redirect()->back()->with('err','Mật khẩu không chính xác');
        }else {
            if (isset($req->avatar)) {
            $product=User::find($id);
            $image = File::delete('upload/user/' . $user->avatar);
            $file = $req->avatar;
            $nameI=$file->getClientOriginalName();
            $nameImg=str_random(6)."_".$nameI;
            while(file_exists("upload/user".$nameImg)){
                $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/user",$nameImg);
            $user->update([
                'avatar' => $nameImg
            ]);
            
        }
        $user->update([
                'email' => $req->email,
                'name' => $req->name,
                'phone' => $req->phone,
            ]);
        return redirect()->back()->with('success','Cập nhật thành công');
        }           
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->back();
    }
    public function getSeach(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%') -> orwhere('u_price',$req->key)->paginate(8);
        $product_p = Product::where('p_price','<>',0)->paginate(4);
        return view('frontend.page.seach',compact('product','product_p'));
    }

    public function postCheckout(Request $req){

        $cart = Session::get('cart');
        $customer = new Customer;

       if (Auth::check()) {
            $customer->uid = Auth::user()->id;
       } else {
            $user = User::where('level',0)->first();
            $customer->uid = $user->id;
       }
       $customer->name = $req->name;
       $customer->email = $req->email;
       $customer->phone = $req->phone;
       $customer->address = $req->address;
       $customer->gender = $req->gender;
       $customer->save();

       $bill = new Bills;
       $bill->cid = $customer->id;
       $bill->total = $cart->totalPrice;
       $bill->payment = $req->payment_method;
       $bill->note = $req->note;
       $bill->status = 0;
       $bill->save();

       foreach ($cart->items as $key => $value) {
       $bill_detail = new BillDetail;
       $bill_detail->oid = $bill->id;
       $bill_detail->pid = $key;
       $bill_detail->qty = $value['qty'];
       $bill_detail->total = ($value['price']/$value['qty']);
       $bill_detail->save();
       }
       Session::forget('cart');    
       return redirect('index')->with('success','Đặt hàng thành công');
    }

    public function getAll(){
        $product = Product::paginate(16);
        return view('frontend.page.all',compact('product'));
    }

    public function DanhMuc($id){
        if (Category::where('parentId',$id)) {
            // $slide = Slide::orderBy('ordinal')->get();
            $parent = Category::where('parentId',$id)->pluck('id')->toArray();
            $product = Product::whereIn('cid', $parent)->paginate(16);
            $title = Category::where('id',$id)->first();
            return view('frontend.page.danhmuc',compact('title','product'));
        } else {
            redirect('index');
        }
        
    }

    public function getContact(){
        return view('frontend.page.contact');
    }

    public function storeComment(Request $req){
        // dd($req->all());
        $data = $req->all();
        $data['status'] = 0;
        Comment::create($data);

        $rate = Comment::where('pid', $data['pid'])->avg('rate');
        $product = Product::find($data['pid']);

        $product->rate = $rate;
        $product->save();
        return redirect()->back();

    }
 }
