<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Slide;
use Illuminate\Support\Facades\Auth;
use File;
class SlideController extends Controller
{
    // private $__slide;

    // public function __construct()
    // {
    //     $this->__brand = new Brand();
    // }
    public function getList(){
    	$slide = Slide::all();
    	return view('admin.slide.list',['slide'=>$slide]);
    }
    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
    	
    }
    public function postEdit(Request $req,$id){
        
        $slide = Slide::find($id)->where('id', $id)
            ->update([                
                'link'     => $req->link
            ]);
        $tg = Slide::where('ordinal',$req->stt)->first();
        // var_dump($tg->id);
        Slide::where('ordinal',$req->ordinal)->update(['ordinal'=>$req->stt]);
        Slide::where('id',$tg->id)->update(['ordinal'=>$req->ordinal]);
        return redirect('admin/slide/list')->with('success', 'Sửa thành công!');
    }

    public function getAdd(){
        return view('admin.slide.add');
    	
    }
    public function postAdd(Request $req){
        $this->validate($req,['image' => 'required'],
            [
                'image.required' => 'Ảnh không được để trống',               
            ]);
        $stt = Slide::count();
        $slide = new Slide;
        if (isset($req->link)) {
            $slide->link = $req->link;
        } else {
            $slide->link = '#';
        }

        if (isset($req->image)) {
            $file = $req->image;
                $nameI=$file->getClientOriginalName();
                $nameImg=str_random(6)."_".$nameI;
                while(file_exists("upload/slide".$nameImg)){
                $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/slide",$nameImg);
            $slide->image = $nameImg;
        } else{
            $slide->image = null;
        }
          
        $slide->ordinal = ++$stt;         
        $slide->save();

        return redirect('admin/slide/list')->with('success', 'Thêm thành công!');
        
    }

    public function getDel($id){
        $slide = Slide::find($id);
        $image = File::delete('upload/slide/' . $slide->image);
        $slide->delete();
        return redirect('admin/slide/list')->with('success','Xóa thành công');
    }
    public function swapSlide(Request $r)
    {
        $this->validate($r,['swap' => 'required|exists:tb_slide,ordinal'],
            [
                'swap.required' => 'Bạn Chưa Nhập Thứ Tự.',
                'swap.exists' => 'Bạn Phải Nhập Đúng Thứ Tự cần Đổi.',
            ]);
        $tg = Slide::where('ordinal',$r->stt)->first();
        // var_dump($tg->id);
        Slide::where('ordinal',$r->swap)->update(['ordinal'=>$r->stt]);
        Slide::where('id',$tg->id)->update(['ordinal'=>$r->swap]);
        return redirect()->back()->with('swap','Đổi Thành Công.');
    }
 }
