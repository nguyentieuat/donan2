<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Listimg;
use Illuminate\Support\Facades\Storage;
use File;
use App\Comment;
class ProductController extends Controller
{
    public function getList(){
    	$product = Product::orderBy('id','DESC')->get();
    	return view('admin.product.list',['product'=>$product]);
    }
    public function getEdit($id){
        $category = Category::all();
        $categoryP = Category::where('parentId',null)->get();
        $product = Product::find($id);
        $brand = Brand::all();
        return view('admin.product.edit', compact('product','categoryP','category','brand'));
    
    }

    public function postEdit(UpdateProductRequest $req,$id){
        $product = Product::find($id);
        if (isset($req->image)) {
            $product=Product::find($id);
            $image = File::delete('upload/product/' . $product->images);
            $file = $req->image;
            $nameI=$file->getClientOriginalName();
            $nameImg=str_random(6)."_".$nameI;
            while(file_exists("upload/product".$nameImg)){
                $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/product",$nameImg);
            $product->update([
                'images' => $nameImg
            ]);
            
        }

        if (isset($req->image_list)) {

            $listimage = Listimg::where('pid',$id)->get();
            foreach ($listimage as $key => $value) {
                $image =  $listimage[$key]['images'];
                $images = File::delete('upload/listimage/' . $image);
                $value->delete();
                }
            // $listimage->delete();
            foreach ($req->image_list as $key => $value) {
                // $path = $request->file('avatar')->store('avatars');

                $file = $value;
                $nameI=$file->getClientOriginalName();
                $nameImg=str_random(6)."_".$nameI;
                while(file_exists("upload/product".$nameImg)){
                    $nameImg=str_random(6)."_".$nameI;
                }
                $file->move("upload/listimage",$nameImg);

                $tb_listimage[$key]['images'] = $nameImg;
                $tb_listimage[$key]['pid'] = $id;
            }
            Listimg::insert($tb_listimage);
        }
       DB::table('tb_product')
            ->where('id', $id)
            ->update([
                'name' => $req->name,
                'cid' => $req->category,
                'bid' => $req->brand,
                'guarentee' => $req->guarentee,
                'description' => $req->description,
                'u_price' => $req->u_price,
                'p_price' => $req->p_price,
                'qty' => $req->qty,
                'status' => $req->status
            ]);
        return redirect('admin/product/list')->with('success', 'Sửa sản phẩm thành công');
    }

    public function getAdd(){
        $categoryP = Category::where('parentId',null)->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.add',['categoryP'=>$categoryP,'category'=>$category,'brand'=>$brand]);
        
    }
    public function postAdd(UpdateProductRequest $req){
        $product = new Product;
        $product->name = $req->name;
        // $product->name_slug = str_slug($req->name,'-');
        $product->cid = $req->category;
        $product->bid = $req->brand;
        $product->u_price = $req->u_price;
        $product->p_price = $req->p_price;        
        $product->size = $req->size;
        $product->main_material = $req->main_material;
        $product->description = $req->description;
        $product->guarentee = $req->guarentee;
        $product->date = $req->date;
        $product->qty = $req->qty;
        $product->status = $req->status;
        $file = $req->image;
        $nameI=$file->getClientOriginalName();
        $nameImg=str_random(6)."_".$nameI;
        while(file_exists("upload/product".$nameImg)){
            $nameImg=str_random(6)."_".$nameI;
        }
        $file->move("upload/product",$nameImg);
        $product->images = $nameImg;   
        $product->view=1;
        $product->sold=1;        
        $product->save();
        $pro_id = Product::all()->last()->id;

        if ($req->image_list != false) {
            foreach ($req->image_list as $key => $value) {
                // $path = $request->file('avatar')->store('avatars');

                $file = $value;
                $nameI=$file->getClientOriginalName();
                $nameImg=str_random(6)."_".$nameI;
                while(file_exists("upload/product".$nameImg)){
                    $nameImg=str_random(6)."_".$nameI;
                }
                $file->move("upload/listimage",$nameImg);

                $tb_listimage[$key]['images'] = $nameImg;
                $tb_listimage[$key]['pid'] = $pro_id;
            }
            Listimg::insert($tb_listimage);
        }

        
        return redirect('admin/product/add')->with('success','Thêm thành công');
        

    }


    public function getDel($id)
        {
            $product=Product::find($id);
            $image = File::delete('upload/product/' . $product->images);        
            $listimage = Listimg::where('pid',$id)->get();
            foreach ($listimage as $key => $value) {
                $image =  $listimage[$key]['images'];
                $images = File::delete('upload/listimage/' . $image);
                }
            $product->delete();    
            return redirect('admin/product/list')->with('success','Xóa thành công');
        }
   
}
