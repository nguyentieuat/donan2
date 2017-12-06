<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\admin\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        // dd(Session::get('cart'));
        $slide = Slide::orderBy('ordinal')->get();
        $new_product = Product::where('status',1)->paginate(4);
        $product_p = Product::where('p_price','<>',0)->paginate(8);
        return view('frontend.page.home',compact('slide','new_product','product_p'));
    }
    public function getProductType($type){
        // $slide = Slide::orderBy('ordinal')->get();
        $product_type = Product::where('cid',$type)->get();
        $title = Category::where('id',$type)->first();
        $product_other = Product::where('cid','<>',$type)->paginate(3);
        $cate = Category::where('parentId','<>',null)->get();
        return view('frontend.page.product_type',compact('title','product_type','product_other','cate'));
    }
    public function getProductDetail(Request $req){
        $product=Product::where('id',$req->id)->first();
        $product_same=Product::where('cid',$product->cid)->where('id','<>',$product->id)->paginate(3);
        $product_new=Product::where('status',1)->get();

        $product_sell=Product::orderBy('sold','desc')->get();

        return view('frontend.page.product_detail',compact('product','product_same','product_new','product_sell'));
    }
    public function getAddtoCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addCart($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
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
    public function getCheckout(){
        return view('frontend.page.checkout');
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
        return redirect()->back()->with('success','Dang ki thanh cong');
    }
    public function getLogin(){
        return view('frontend.page.login');
    }
    public function postLogin(LoginRequest $req){
        $credentials = array('email' => $req->email, 'password'=>$req->password );
        if (Auth::attempt($credentials)) {
            return redirect()->back()->with('success','Dang nhap thanh cong');
        } else{
            return redirect()->back()->with('err','Dang nhap that bai');
        }
        
    }
    public function getUpdate($id){
        $user = User::find($id);
        return view('frontend.page.update',compact('user'));
    }
    public function postUpdate(UpdateUserRequest $req,$id){
        $user = User::find($id);
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
                'address' => $req->address,
                'phone' => $req->phone,
                'password' => $req->pass,
            ]);
        return redirect()->back()->with('success','Cap nhat thanh cong');
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
       $bill->payment = $req->payment;
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
       return redirect()->back()->with('success','Đặt hàng thành công');
    }



    public function getContact(){
        return view('frontend.page.contact');
    }
    public function getShoppingCart(){
        return view('frontend.page.shopping_cart');
    }
 }
