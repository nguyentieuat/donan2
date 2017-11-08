<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Http\Requests\admin\AddUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Brand;
use App\Listimg;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function getList(){
    	$user = User::orderBy('id','DESC')->get();
    	return view('admin.user.list',['user'=>$user]);
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    
    }

    public function postEdit(UpdateUserRequest $req,$id){
        $user = User::find($id);
        if (isset($req->avatar)) {
            $avatar=File::delete('upload/user/'.$user->avatar);
            $file = $req->avatar;
            $nameI=$file->getClientOriginalName();
            $nameImg=str_random(6)."_".$nameI;
            while(file_exists("upload/user".$nameImg)){
                $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/user",$nameImg);
            $user->avatar = $nameImg;
        }
        if (isset($req->password)) {
            $user->password=bcrypt($req->password);;
        }
        $user->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'status'=>$req->status,
            'level'=>$req->level
        ]);
        
        return redirect('admin/user/list')->with('success', 'Sửa user thành công');
    }

    public function getAdd(){
        
        return view('admin.user.add');
        
    }
    public function postAdd(AddUserRequest $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->password = bcrypt($req->password);;
        $user->status = $req->status;
        $user->level = $req->level;        
        if (isset($req->avatar)) {
             $file = $req->avatar;
            $nameI=$file->getClientOriginalName();
            $nameImg=str_random(6)."_".$nameI;
            while(file_exists("upload/user".$nameImg)){
            $nameImg=str_random(6)."_".$nameI;
            }
            $file->move("upload/user",$nameImg);
            $user->avatar = $nameImg;  
         } else{
            $user->avatar = "";
         } 

        $user->save();
        return redirect('admin/user/add')->with('success','Thêm thành công');
        

    }


    public function getDel($id)
        {
            $user=User::find($id);
            $image = File::delete('upload/user/' . $user->avatar);        
           
            $user->delete();    
            return redirect('admin/user/list')->with('success','Xóa thành công');
        }

    public function getLoginAdmin()
    {
        return view('admin.login');
    }
    public function postLoginAdmin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;;
        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            return redirect('admin/user/list');
        }else{
            return redirect('admin/login')->with('err','Dang nhap that bai');
        }
    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
