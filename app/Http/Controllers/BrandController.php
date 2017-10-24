<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddBrandRequest;
use Illuminate\Support\Facades\DB;
use App\Brand;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
    private $__brand;

    public function __construct()
    {
        $this->__brand = new Brand();
    }
    public function getList(){
    	$brand = Brand::all();
    	return view('admin.brand.list',['brand'=>$brand]);
    }
    public function getEdit($id){
        $brand = $this->__brand->where('id', $id)->first();
        return view('admin.brand.edit', compact('brand'));
    	
    }
    public function postEdit(AddBrandRequest $req,$id){
        
       
        $this->__brand->where('id', $id)
            ->update([
                'name'     => $req->name
            ]);

        return redirect('admin/brand/list')->with('success', 'Sửa thành công!');
    }

    public function getAdd(){
        return view('admin.brand.add');
    	
    }
    public function postAdd(AddBrandRequest $req){
        $brand = new Brand;
        $this->__brand->name = $req->name;
        $this->__brand->save();

        return redirect('admin/brand/list')->with('success', 'Thêm thành công!');
        
    }

    public function getDel($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('admin/brand/list')->with('success','Xóa thành công');
    }
 }
