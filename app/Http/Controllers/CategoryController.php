<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddCatRequest;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    private $__cat;

    public function __construct()
    {
        $this->__cat = new Category();
    }
    public function getList(){
    	$category = Category::all();
    	return view('admin.category.list',['category'=>$category]);
    }
    public function getEdit($id){
        $cat = $this->__cat->where('id', $id)->first();
        $list = Category::where('parentId',null)->get();
        return view('admin.category.edit', compact('cat', 'list'));
    	
    }
    public function postEdit(AddCatRequest $req,$id){
        
       
        $this->__cat->where('id', $id)
            ->update([
                'name'     => $req->name,
                'parentId' => $req->parentId
            ]);

        return redirect('admin/category/list')->with('success', 'Sửa thành công!');
    }

    public function getAdd(){
        $list = Category::where('parentId',null)->get();
        return view('admin.category.add',compact('list'));
    	
    }
    public function postAdd(AddCatRequest $req){
        $category = new Category;
        $this->__cat->name = $req->name;
        $this->__cat->parentId = $req->parentId;

        $this->__cat->save();

        return redirect('admin/category/list')->with('success', 'Thêm thành công!');
        
    }

    public function getDel($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('success','Xóa thành công');
    }
 }
