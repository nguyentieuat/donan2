<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Slide;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use File;
class PageController extends Controller
{
    public function getIndex(){
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
        return view('frontend.page.product_detail',compact('product'));
    }
    public function getShoppingCart(){
        return view('frontend.page.shopping_cart');
    }
    public function getContact(){
        return view('frontend.page.contact');
    }
 }
