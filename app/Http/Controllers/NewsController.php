<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\admin\AddNewsRequest;
use App\News;
use Illuminate\Support\Facades\Storage;
use File;
class NewsController extends Controller
{
    
    public function getList(){
        $news = News::all();
        return view('admin.news.list',['news'=>$news]);
    }
    public function getEdit($id){
        $news = News::find($id);
        return view('admin.news.edit',['news'=>$news]);
    }
    public function postEdit(AddNewsRequest $req,$id){
        $news = News::find($id);
        if (isset($req->image)) {
            $image = File::delete('upload/news/' . $news->image);
            $file = $req->image;
            $nameI=$file->getClientOriginalName();
            $nameImg=str_random(6)."_".$nameI;
            while(file_exists("upload/news".$nameImg)){
                $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/news",$nameImg);
            $news->update([
                'image' => $nameImg
            ]);
            
        }
       $news->update([
            'title'=> $req->title,
            'content'=> $req->content,
       ]);
       return redirect('admin/news/list')->with('success', 'Sửa thành công!');
    }

    public function getAdd(){
        return view('admin.news.add');
    }
    public function postAdd(AddNewsRequest $req){
        $news = new News;
        $news->title = $req->title;
        $file = $req->image;
        $nameI=$file->getClientOriginalName();
        $nameImg=str_random(6)."_".$nameI;
        while(file_exists("upload/news".$nameImg)){
            $nameImg=str_random(6)."_".$nameI;
        }
        $file->move("upload/news",$nameImg);       
        $news->image = $nameImg;        
        $news->content = $req->content;
        $news->save();
        return redirect('admin/news/list')->with('success', 'Thêm thành công!');
    }

    public function getDel($id){
        $news = News::find($id);
        $image = File::delete('upload/news/' . $news->image);
        $news->delete();
        return redirect('admin/news/list')->with('success', 'Xóa thành công!');
    }
 }
